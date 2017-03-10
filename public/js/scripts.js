$(document).ready(function()
{
	$("input").focus();
	var inp;
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

	// Replace any digits in base URL with 1 to get first page
	var r2 = new RegExp("[\\d]+");
	url = url.replace(r2, 1);

	pageRequest(url, 1);
}

function pageRequest(url, pn)
{
	console.log(pn);
	console.log(url);
	var parameters = {
		"url": url
	};
	$.getJSON("scrape.php", parameters)
	.done(function(data, textStatus, jqXHR)
	{
		console.log("done");
		if (data["isNextAvailable"] === 1 && pn < 5)
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