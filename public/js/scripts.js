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
		}
	})
	.fail(function (jqXHR, textStatus, error) 
	{
    	console.log("Post error: " + error);
    });
}