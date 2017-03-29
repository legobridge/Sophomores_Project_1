<!DOCTYPE html>

<html>

    <head>
        <meta charset = "utf-8">
	    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
	    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
	    <!-- Bootstrap -->
	    <link href = "../public/css/bootstrap.min.css" rel = "stylesheet">
	    <!-- Stylesheet -->
	    <link href = "../public/css/styles.css" rel = "stylesheet">

	    <!-- jQuery -->
	    <script src = "../public/js/jquery.min.js"></script>
	    <!-- Bootstrap JS -->
	    <script src = "../public/js/bootstrap.min.js"></script>
        <!-- Custom Scripts -->
        <script src = "../public/js/scripts.js"></script>

        <?php if (isset($title)): ?>
            <title> Scrapesha : <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title> Scrapesha </title>
        <?php endif ?>

    </head>

    <body>

        <div class = "container">

            <div id = "top">
                <a href="/"><img id = "logo" alt = "Scrapesha" src = "../public/img/scrapesha_logo.png"/></a>
            <div id="middle">
