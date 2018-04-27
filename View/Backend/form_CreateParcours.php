<?php $title = 'Ajouter un Parcours'; ?>

<?php ob_start(); ?>

<div class="page_form">
    <h1> Ajouter un Parcours</h1>

    <p> <a href="index.php?action=code4liokoConnexion"> RETOUR à ADMINISTRATION </a></p>

    <form  action="index.php?action=parcour&&order=createParcour" method="POST" id="form_CreateCompetence" enctype="multipart/form-data">


        <p>
            <label for="img"> Image </label> <span class="error"></span>
            <input type="file" id="img" name="img">
        </p>

        <p>
            <label for="title"> Titre </label> <span class="error"></span>
            <input type="text" id="title" name="title">
        </p>

        <p>
            <label for="content"> Contenu (Pas obligatoire. Sauf pour conformité) </label>
            <textarea name="content" form="form_CreateCompetence" cols="100" rows="10" class="tinymce"> </textarea>
        </p>

        <p>
            <label for="link"> Lien (vers école)</label> <span class="error"></span>
            <input type="url" id="link" name="link">
        </p>

        <p>
            <input type="submit" value="Ajouter un parcours">
        </p>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/Frontend/template.php'); ?>

