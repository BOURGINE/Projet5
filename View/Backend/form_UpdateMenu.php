<?php $title = 'Modifier Menu'; ?>

<?php ob_start(); ?>

<div class="page_form">
    <h1> Modifier Un MENU</h1>

    <p> <a href="index.php?action=code4liokoConnexion"> RETOUR à ADMINISTRATION </a></p>

    <form  action="index.php?action=menu&&order=update" method="POST" id="form_CreateCompetence">

        <input type="hidden" name="id" value="<?=$menu->getId();?>">
        <p>
            <label for="title"> Titre </label>
            <input type="text" id="title" name="title" value="<?=$menu->getTitle();?>">
        </p>

        <p>
            <input type="submit" value="modifier le menu">
        </p>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/Frontend/template.php'); ?>

