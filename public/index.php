<?php

    // configuration
    require("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
    	render("landing.php", ["title" => "Home"]);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
   	{
   		$link = $_POST["link"];
   		if (empty($link))
        {
            apologize("You must enter a link.");
        }
        else
        {
        	// Start Scraping
        }
   	}
?>
