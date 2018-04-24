<?php $title = 'Créer un compte Admin'; ?>

<?php ob_start(); ?>

<div class="page_form">
    <h1> CREER UN COMPTE ADMIN</h1>

    <p> <a href="index.php?action=code4liokoConnexion"> RETOUR à ADMINISTRATION </a></p>

    <form  action="index.php?action=code4liokoCreateUser" method="POST" id="form_CreateUser" >


        <p>
            <label for="pseudo"> Pseudo </label>
            <input type="text" id="title" name="pseudo">
        </p>

        <p>
            <label for="pass"> Mot de passe </label>
            <input type="password" id="title" name="pass">
        </p>

        <p>
            <label for="confirmPass">  Confirmez votre Mot de passe </label>
            <input type="password" id="title" name="confirmPass">
        </p>
        <input type="hidden" name="role" value="1">
        <p>
            <input type="submit" value="CREER UN ADMIN">
        </p>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/Frontend/template.php'); ?>

