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
        preg_match("/colleges-([\\s\\S]*?)(?:-|$)/",$url, $matched_city);
        $city = $matched_city[1];
        $mysqli -> query(
        	"CREATE TABLE `" . $city . "`
        	(
        		`name` VARCHAR(150) NOT NULL,
        		`location` VARCHAR(150) NOT NULL,
        		`facilities` VARCHAR(1000) NOT NULL DEFAULT 'None',
        		`reviews` VARCHAR(100) NOT NULL
        	)
        	ENGINE = InnoDB;"
        );
        preg_match_all("/class=\"clg-tpl-parent\"([\\s\\S]*?)Add to Compare/", $contents, $regexed);
        $colleges = $regexed[1];
        foreach($colleges as $college)
        {
        	// Match college name
            preg_match("/<h2 class=\"tuple-clg-heading\"><a href[\\s\\S]*?>([\\s\\S]*?)</", $college, $name);
			// Match college location
            preg_match("/<p>\\| ([\\s\\S]*?)<\\/p><\\/h2>/", $college, $location);
            // Match college reviews
            preg_match("/<span><b>([\\d]+)<\\/b>[\\s\\S]*?Reviews/", $college, $reviews);
            // Match college facilities
            preg_match_all("/<ul class=\"facility-icons\">[\\s\\S]*?<\\/ul>/", $college, $regexed_facilities);

            $facilities = "";
            if (!empty($regexed_facilities[0]))
            {
	            preg_match_all("/<h3>([\\s\\S]*?)<\\/h3>/", $regexed_facilities[0][0], $matched_facilities);
	            // concatenate facilities into string
	            $facilities = $matched_facilities[1][0];
	            for ($i = 1; $i < sizeof($matched_facilities[1]); $i++)
	            {
	            	$facility = $matched_facilities[1][$i];
	            	$facilities = $facilities. ", " . $facility;
	            }
            }
            $name = $name[1];
			$location = $location[1];
            if (!empty($reviews))
            {
            	$reviews = $reviews[1];
            }
            else
            {
            	$reviews = 0;
            }
            $qu = "INSERT INTO `" . $city . "` (name, location, facilities, reviews) VALUES ('". $name . "', '" . $location . "', '" . $facilities . "', '" . $reviews . "')";
            $mysqli -> query($qu);
        }
        $ar = ["isNextAvailable" => preg_match("/<li class=\"next/", $contents)];
        print(json_encode($ar, JSON_PRETTY_PRINT));
    }
?>
