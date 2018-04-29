<?php $title = 'Modifier Parcours'; ?>

<?php ob_start(); ?>

<div class="page_form">
    <h1> Modifier Parcours</h1>

    <p> <a href="index.php?action=code4liokoConnexion"> RETOUR à ADMINISTRATION </a></p>

    <form  action="index.php?action=parcour&order=update" method="POST" id="form_CreateCompetence" enctype="multipart/form-data" >

        <input type="hidden" id="id" name="id" value="<?=$parcour->getId();?>">
        <p>
            <label for="img"> Image </label>
            <input type="file" id="img" name="img" value="<?=$parcour->getImg();?>">
        </p>

        <p>
            <label for="title"> Titre </label>
            <input type="text" id="title" name="title" value="<?=$parcour->getTitle();?>">
        </p>

        <p>
            <label for="content"> Contenu </label>
            <textarea name="content"  id="content" form="form_CreateCompetence" cols="100" rows="10" class="tinymce"> <?=$parcour->getContent();?></textarea>
        </p>

        <p>
            <label for="link"> Lien (école)</label>
            <input type="url" id="link" name="link" value="<?=$parcour->getLink();?>">
        </p>

        <p>
            <input type="submit" value="Modifier Parcours">
        </p>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/Frontend/template.php'); ?>

