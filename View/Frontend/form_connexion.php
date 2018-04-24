
<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

<!--**********************************************
                SPACE CONNEXION
**************************************************-->
<div class="page_form">
    <form  id= "pageConnexion" method="POST" action="index.php?action=code4liokoConnexion">
        <h2> CONNEXION </h2>

        <label for="pseudo">Votre Pseudo:</label>
        <input type="text" name="pseudo" id="pseudo"/>
        <br/> <br/>

        <label for="pass"> Votre Mot de Passe: </label>
        <input type="password" name="pass" id="pseudo" />
        <br/> <br/>

        <input  id="button" type="submit" value="Connexion" style="text-align:center" />
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

