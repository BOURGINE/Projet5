<?php $title = 'Modifier Realisation'; ?>

<?php ob_start(); ?>

<div>
    <h1> Modifier Parcours</h1>

    <p> <a href="index.php?action=accesAdmin"> RETOUR à ADMINIST </a></p>

    <form  action="index.php?action=realisation&order=update" method="POST" id="form_UpdateRealisation" enctype="multipart/form-data" >

        <input type="hidden" id="id" name="id" value="<?=$realisation->getId();?>">
        <p>
            <label for="img"> Image </label>
            <input type="file" id="tel" name="img" value="<?=$realisation->getImg();?>">
        </p>

        <p>
            <label for="title"> Titre </label>
            <input type="text" id="title" name="title" value="<?=$realisation->getTitle();?>">
        </p>

        <p>
            <label for="content"> Contenu </label>
            <textarea name="content" form="form_UpdateRealisation" cols="100" rows="10" class="tinymce"> <?=$realisation->getContent();?></textarea>
        </p>

        <p>
            <label for="link"> Lien (école)</label>
            <input type="url" id="title" name="link" value="<?=$realisation->getLink1();?>">
        </p>

        <p>
            <label for="link"> Lien (école)</label>
            <input type="url" id="title" name="link" value="<?=$realisation->getLink2();?>">
        </p>
        <p>
            <input type="submit" value="Modifier Parcours">
        </p>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/FrontEnd/template.php'); ?>

