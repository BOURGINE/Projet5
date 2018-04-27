<?php $title = 'Modifier Competence'; ?>

<?php ob_start(); ?>

<div class="page_form">
    <h1> Modifier Competence</h1>

    <p> <a href="index.php?action=code4liokoConnexion"> RETOUR à ADMINIST </a></p>

    <form  action="index.php?action=competence&order=updateCompetence" method="POST" id="form_CreateCompetence" enctype="multipart/form-data" >

        <input type="hidden" id="id" name="id" value="<?=$competence->getId();?>">
        <p>
            <label for="img"> Image </label> <span class="error"></span>
            <input type="file" id="img" name="img" value="<?=$competence->getImg();?>">
        </p>

        <p>
            <label for="title"> Titre </label> <span class="error"></span>
            <input type="text" id="title" name="title" value="<?=$competence->getTitle();?>">
        </p>

        <p>
            <label for="content"> Contenu (Pas obligatoire. Sauf pour conformité) </label> <span class="error"></span>
            <textarea name="content" id="content" form="form_CreateCompetence" cols="100" rows="10" class="tinymce"> <?=$competence->getContent();?></textarea>
        </p>

        <p>
            <label for="link"> Lien (vers certificats)</label> <span class="error"></span>
            <input type="url" id="link" name="link" value="<?=$competence->getLink();?>">
        </p>

        <label for="categorie"> Catégorie (1 pour Front et 2 pour Back)</label> <span class="error"></span>
        <input type="number" id="categorie" min="1" max="2" name="categorie"  value="<?=$competence->getCategorie();?>">

        <p>
            <input type="submit" value="Ajouter une Competence">
        </p>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/Frontend/template.php'); ?>

