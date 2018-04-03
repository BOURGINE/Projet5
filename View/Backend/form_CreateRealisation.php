<?php $title = 'Ajouter un Realisation'; ?>

<?php ob_start(); ?>

<div>
    <h1> Ajouter une REALISATION</h1>

    <p> <a href="index.php?action=code4liokoConnexion"> RETOUR à ADMINISTRATION </a></p>

    <form  action="index.php?action=realisation&order=createRealisation" method="POST" id="form_CreateRealisation" enctype="multipart/form-data">


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
            <textarea name="content" form="form_CreateRealisation" cols="100" rows="10" class="tinymce"> </textarea>
        </p>

        <p>
            <label for="link_view"> Lien vers le site</label>
            <input type="url" id="title" name="link_view">
        </p>

        <p>
            <label for="link_git"> Lien vers github</label>
            <input type="url" id="title" name="link_git">
        </p>

        <p>
            <input type="submit" value="Ajouter une realisation">
        </p>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/FrontEnd/template.php'); ?>

