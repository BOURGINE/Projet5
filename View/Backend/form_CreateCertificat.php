<?php $title = 'Ajouter Certificat'; ?>

<?php ob_start(); ?>

<div class="page_form">
    <h1> Ajouter un Certificat</h1>

    <p> <a href="index.php?action=code4liokoConnexion"> RETOUR à ADMINISTRATION </a></p>

    <form  action="index.php?action=certificat&order=createCertificat" method="POST" id="form_CreateCertificat" enctype="multipart/form-data">


        <p>
            <label for="img"> Image </label> <span class="error"></span>
            <input type="file" id="img" name="img"/>
        </p>

        <p>
            <label for="title"> Titre </label> <span class="error"></span>
            <input type="text" id="title" name="title">
        </p>

        <label for="cat"> Catégorie </label> <span class="error"></span>
        <select name="cat" id="cat">

            <?php if(empty($menus)):?>
                <option value=""> il n'y a aucune catégorie définis</option>

            <?php else:?>
                <?php if($menus === false):?>
                    <option value="erreur">Une erreur est survenue</option>

                <?php else:?>

                    <?php foreach ($menus as $menu):?>
                        <option value="<?=$menu->getTitle()?>"> <?=$menu->getTitle()?> </option>

                    <?php endforeach; ?>

                <?php endif;?>
            <?php endif;?>

        </select>

        <p>
            <input type="submit" value="Ajouter une Competence">
        </p>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/Frontend/template.php'); ?>

