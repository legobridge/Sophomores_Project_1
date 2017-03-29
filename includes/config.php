<?php

    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
    require("helpers.php");

    $mysqli = new mysqli("localhost", "jharvard", "crimson", "scrapesha");

?>
