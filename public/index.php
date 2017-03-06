<?php

    // configuration
    require("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
    	render("landing.php", ["title" => "Home"]);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
   	{
   		
   	}
?>
