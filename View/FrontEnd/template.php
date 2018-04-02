<?php
if (isset($_SESSION['pseudo']))
{
    //Affiche les infos de la session
    $info1 = '';
}

?>


<!DOCTYPE HTML>

<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="Public/css/style.css" />
    <link rel="stylesheet" href="Public/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="Public/css/ie8.css" /><![endif]-->
    <title> <?= $title ?></title>
</head>

<body class="homepage">

        <div id="page-wrapper">
            <?= $content ?>
        </div>

<!-- Scripts -->
<script src="Public/js/jquery.min.js"></script>
<script src="Public/js/jquery.dropotron.min.js"></script>
<script src="Public/js/jquery.scrolly.min.js"></script>
<script src="Public/js/jquery.onvisible.min.js"></script>
<script src="Public/js/skel.min.js"></script>
<script src="Public/js/util.js"></script>
<!--[if lte IE 8]><script src="Public/js/ie/respond.min.js"></script><![endif]-->
<script src="Public/js/main.js"></script>
<!--[if lte IE 8]><script src="Public/js/ie/html5shiv.js"></script><![endif]-->
</body>
</html>