<?php

    // configuration
    require("../includes/config.php");
    
    $url = $_GET["url"];
    if (empty($url))
    {
        $ar = ["isNextAvailable" => -1];
        print(json_encode($ar, JSON_PRETTY_PRINT));
    }
    else
    {
        sleep(1);
         
        // Part of code for new style URL's
        //
        // $q = strpos($url, "?");
        // if ($q !== FALSE)
        // {
        //     $queries = strstr($url, "?");
        //     $url = substr($url, 0, $q);
        //     urlencode(htmlspecialchars($queries));
        //     $url = $url . $queries;
        // }

        $contents = file_get_contents(htmlspecialchars($url));
        preg_match_all("/class=\"clg-tpl-parent\"([\\s\\S]*?)Add to Compare/", $contents, $regexed);
        $colleges = $regexed[1];
        foreach($colleges as $college)
        {
            /*preg_match("//", $college, $preg_name);
            preg_match("//", $college, $preg_location);
            preg_match("/<span><b>([\\d]+)</b>*Reviews/", $college, $preg_reviews);
            preg_match_all("//", $college, $preg_faciliies);*/
        }
        $ar = ["isNextAvailable" => preg_match("/<li class=\\\"next/", $contents)];
        print(json_encode($ar, JSON_PRETTY_PRINT));
    }
?>
