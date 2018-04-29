<?php $title = 'Lecture des messages'; ?>

<?php ob_start(); ?>
<!-- ****************************************
                  ENTETE
     ******************************************-->

<div>
    <img src="Public/images/back.jpg" alt="Bourgine FAGADE" width="100%" height="auto">
</div>

<div id="block_message_admin">

    <a href="index.php?action=code4liokoConnexion">
        <img src="Public/images/croix.png" alt="Bourgine FAGADE" width="50px" height="50px">
    </a>

    <p> <?=$message?></p>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/Frontend/template.php'); ?>
