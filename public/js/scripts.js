$(document).ready(function()
{
	$("input").focus();
	var inp;
	$("#tf").keyup(function(event)
	{
	    if(event.keyCode == 13)
	    {
	        $("button").click();
	    }
	});
	$("button").click(function()
	{
		$("#results").hide();
		$("table").find("tbody").empty();
        $("#loading").show("fast");
        inp = $("input").val();
        makeRequests(inp);
    });
});

function makeRequests(url)
{
	// Remove all queries to obtain base URL
	var r1 = new RegExp("\\?[\\s\\S]*");
	var url = url.replace(r1, "");

	var r2 = new RegExp("[\\d]+");
	if (r2.test(url))
	{
		// Replace any digits in base URL with 1 to get first page
		url = url.replace(r2, 1);
	}
	else
	{
		// If no digits found, add 1 at the end
		url += "-1";
	}
	pageRequest(url, 1);
}

function pageRequest(url, pn)
{
	var parameters = {
		"url": url
	};
	$.getJSON("scrape.php", parameters)
	.done(function(data, textStatus, jqXHR)
	{
		if (data["isNextAvailable"] === 1)
		{
			pn++;
			var r2 = new RegExp("[\\d]+");
			url = url.replace(r2, pn);


			// Part of code for new style URL's
			//
			// var r3 = new RegExp("\\?(pn=[\\d]+)?&?");
			// url = url.replace(r3, "?pn=" + pn + "&");


			// If next page is available, go to it
			pageRequest(url, pn);
		}
		else
		{
			$("#loading").hide();
			var l = Object.getOwnPropertyNames(data).length;
			for (var i = 0; i < l - 1; i++)
			{
				var id = data[i][0];
				var name = data[i][1];
				var location = data[i][2];
				var facilities = data[i][3];
				var reviews = data[i][4];
				
				var exp = "<tr><td>" + id + "</td><td>" + name + "</td><td>" + location + "</td><td>" + facilities + "</td><td>" + reviews + "</td></tr>";
				$("table").find("tbody").append(exp);
			}
			$("#results").show();
		}
	})
	.fail(function (jqXHR, textStatus, error) 
	{
    	console.log("Post error: " + error);
    });
}