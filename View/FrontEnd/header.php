<?php
if (isset($_SESSION['pseudo']))
{
    //Affiche les infos de la session
    $info1 = '<li><a href="index.php?action=accesAdmin">BACKOFFICE</a></li>';
}
else
{
    $info1 = '';
}

?>

<div id="header">
    <!-- Inner -->
    <div class="inner">
        <header>
            <h1><a href="index.php" id="logo">Bourgine FAGADE</a></h1>
            <hr />
            <p>Developpeur, Intrégrateur d'application web</p>
        </header>
    </div>

    <!-- Nav -->
    <nav id="nav">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="#competences">Compétences</a></li>
            <li><a href="#parcours">Parcours</a></li>
            <li><a href="#portefolio">Portefolio</a></li>
            <li><a href="#nos_projets">Certificats</a></li>
            <?= $info1;?>
        </ul>
    </nav>
</div>