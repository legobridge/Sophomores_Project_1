<!DOCTYPE html>

<html>

    <head>
        <meta charset = "utf-8">
	    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
	    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
	    <!-- Bootstrap -->
	    <link href="/css/bootstrap.min.css" rel="stylesheet">
	    <!-- Stylesheet -->
	    <link href="/css/styles.css" rel="stylesheet">

	    <!-- jQuery -->
	    <script src="/js/jquery.min.js"></script>
	    <!-- Bootstrap JS -->
	    <script src="/js/bootstrap.min.js"></script>

        <?php if (isset($title)): ?>
            <title> Scrapesha : <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title> Scrapesha </title>
        <?php endif ?>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <a href="/"><img alt="Scrapesha" src="/img/scrapesha_logo.png"/></a>
            <div id="middle">
