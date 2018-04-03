<?php $title = 'Modifier Certificat'; ?>

<?php ob_start(); ?>

<div>
    <h1> Modifier Certificat</h1>

    <p> <a href="index.php?action=code4liokoConnexion"> RETOUR à ADMINIST </a></p>

    <form  action="index.php?action=certificat&order=update" method="POST" id="form_CreateCompetence" enctype="multipart/form-data" >

        <input type="hidden" id="id" name="id" value="<?=$certificat->getId();?>">
        <p>
            <label for="img"> Image </label>
            <input type="file" id="tel" name="img" value="<?=$certificat->getImg();?>">
        </p>

        <p>
            <label for="title"> Titre </label>
            <input type="text" id="title" name="title" value="<?=$certificat->getTitle();?>">
        </p>


        <select name="cat">

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
            <input type="submit" value="Modifier">
        </p>
    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/FrontEnd/template.php'); ?>

