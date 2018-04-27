<?php $title = 'Modifier Realisation'; ?>

<?php ob_start(); ?>

<div class="page_form">
    <h1> Modifier Réalisation</h1>

    <p> <a href="index.php?action=code4liokoConnexion"> RETOUR à ADMINISTRATION </a></p>

    <form  action="index.php?action=realisation&order=update" method="POST" id="form_UpdateRealisation" enctype="multipart/form-data" >

        <input type="hidden" id="id" name="id" value="<?=$realisation->getId();?>">
        <p>
            <label for="img"> Image </label> <span class="error"></span>
            <input type="file" id="img" name="img" value="<?=$realisation->getImg();?>">
        </p>

        <p>
            <label for="title"> Titre </label> <span class="error"></span>
            <input type="text" id="title" name="title" value="<?=$realisation->getTitle();?>">
        </p>

        <p>
            <label for="content"> Contenu </label> <span class="error"></span>
            <textarea name="content" id="content_o" form="form_UpdateRealisation" cols="100" rows="10" class="tinymce"> <?=$realisation->getContent();?></textarea>
        </p>

        <p>
            <label for="link_view"> Lien vue</label> <span class="error"></span>
            <input type="url" id="link_view" name="link_view" value="<?=$realisation->getLinkView();?>">
        </p>

        <p>
            <label for="link_git"> Lien github</label> <span class="error"></span>
            <input type="url" id="link_git" name="link_git" value="<?=$realisation->getLinkGit();?>">
        </p>
        <p>
            <input type="submit" value="Modifier Realisation">
        </p>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/Frontend/template.php'); ?>

