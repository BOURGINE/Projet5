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
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Opengraph pour Facebook -->
    <meta property="og:title" content="Bourgine B. FAGADE"/>
    <meta property="og:type" content="portfolio"/>
    <meta property="og:url" content="http://p5.bourgine-fagade.com"/>
    <meta property="og:image" content="Public/images/auteur.jpg"/>
    <meta property="og:description" content=" portfolio Bourgine Bérenger FAGADE"/>
    <!-- Opengraph pour Twitter -->
    <meta name="twitter:card" content="Bourgine B. FAGADE"/>
    <meta name="twitter:site" content="portfolio"/>
    <meta name="twitter:title" content="http://p5.bourgine-fagade.com"/>
    <meta name="twitter:description" content="portfolio Bourgine Bérenger FAGADE"/>
    <meta name="twitter:image" content="Public/images/auteur.jpg"/>

    <link rel="shortcut icon" type="image/x-icon" href="Public/images/icone.png" />
    <link rel="stylesheet" href="Public/css/style.css" />
    <link rel="stylesheet" href="Public/css/main.css" />
    <!--[if lte IE 8]> <link rel="stylesheet" href="Public/css/ie8.css" /><![endif]-->
    <title> <?= $title ?></title>

</head>

<body class="homepage">

        <div id="page-wrapper">
            <?= $content ?>
        </div>

<!-- Scripts -->
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea.tinymce' });</script>

<script src="Public/js/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="Public/js/filter.js"></script>
<script src="Public/js/formulaire.js"></script>

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