<?php $title = 'Ajouter Competences'; ?>

<?php ob_start(); ?>

<div>
    <h1> Ajouter un article</h1>

    <p> <a href="index.php?action=code4liokoConnexion"> RETOUR à ADMINISTRATION </a></p>

    <form  action="index.php?action=competence&&order=createCompetence" method="POST" id="form_CreateCompetence" enctype="multipart/form-data">


        <p>
            <label for="img"> Image </label>
            <input type="file" id="tel" name="img">
        </p>

        <p>
            <label for="title"> Titre </label>
            <input type="text" id="title" name="title">
        </p>

        <p>
            <label for="content"> Contenu </label>
            <textarea name="content" form="form_CreateCompetence" cols="100" rows="10" class="tinymce"> </textarea>
        </p>

        <p>
            <label for="link"> Lien (vers certificats)</label>
            <input type="url" id="title" name="link">
        </p>

        <label for="categorie"> Catégorie (1 pour Front et 2 pour Back)</label>
        <input type="number" min="1" max="2" name="categorie" >

        <p>
            <input type="submit" value="Ajouter une Competence">
        </p>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/FrontEnd/template.php'); ?>

