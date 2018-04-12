<?php $title = 'Modifier Competences'; ?>

<?php ob_start(); ?>

<div>
    <h1> Modifier competences</h1>

    <p> <a href="index.php?action=code4liokoConnexion"> RETOUR à ADMINIST </a></p>

    <form  action="index.php?action=competence&order=updateCompetence" method="POST" id="form_CreateCompetence" enctype="multipart/form-data" >

        <input type="hidden" id="id" name="id" value="<?=$competence->getId();?>">
        <p>
            <label for="img"> Image </label>
            <input type="file" id="tel" name="img" value="<?=$competence->getImg();?>">
        </p>

        <p>
            <label for="title"> Titre </label>
            <input type="text" id="title" name="title" value="<?=$competence->getTitle();?>">
        </p>

        <p>
            <label for="content"> Contenu </label>
            <textarea name="content" form="form_CreateCompetence" cols="100" rows="10" class="tinymce"> <?=$competence->getContent();?></textarea>
        </p>

        <p>
            <label for="link"> Lien (vers certificats)</label>
            <input type="url" id="title" name="link" value="<?=$competence->getLink();?>">
        </p>

        <label for="categorie"> Catégorie (1 pour Front et 2 pour Back)</label>
        <input type="number" min="1" max="2" name="categorie"  value="<?=$competence->getCategorie();?>">

        <p>
            <input type="submit" value="Ajouter une Competence">
        </p>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/FrontEnd/template.php'); ?>

