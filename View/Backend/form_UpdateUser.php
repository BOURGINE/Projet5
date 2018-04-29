<?php $title = 'Modifier/Compléter Profil'; ?>

<?php ob_start(); ?>

<div class="page_form">
    <h1> Modifier/Compléter votre profil</h1>

    <p> <a href="index.php?action=code4liokoConnexion"> RETOUR à ADMINISTRATION </a></p>

    <form  action="index.php?action=code4liokoUpdate" method="POST" id="form_UpdateProfil" enctype="multipart/form-data" >

        <input type="hidden" id="id" name="id" value="<?=$user->getId();?>">
        <p>
            <label for="img"> Image de profil </label> <span class="error"></span>
            <input type="file" id="img" name="img" value="<?=$user->getImg();?>">
        </p>

        <p>
            <label for="pseudo"> Pseudo </label> <span class="error"></span>
            <input type="text" id="pseudo" name="pseudo" value="<?=$user->getPseudo();?>">
        </p>

        <p>
            <input type="submit" value="Modifier Profil">
        </p>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/Frontend/template.php'); ?>

