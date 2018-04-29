<?php $title = 'Lire message'; ?>

<?php ob_start();

// Boutton back office
if (isset($_SESSION['id']))
{
    //Affiche les infos de la session
    $info1 = '<a href="index.php?action=code4liokoConnexion"> <div class="button">BACK-OFFICE</div> </a>';
}
else
{ // Si pas de session demande l'inscription ou la connexion
    $info1='';
}


?>

<!-- ****************************************
                  ENTETE
      ******************************************-->
<div style="height: 275px; width: 100%; border: 5px red solid">

    <div style="height: 200px; width: 100%;">
        <img src="Public/images/back.jpg" alt="Bourgine FAGADE" width="100%" height="100%">
    </div>

    <div id="bande_profil" style="height: 70px; width: 100%;">


        <div style="border: 2px red solid; height: 100%; width: 50%;">
            <a href="index.php"> <div class="button">ACCUEIL</div> </a>

            <?= $info1 ?>

            <a href="index.php?action=messages&p="> <div class="button">MAIL BOX</div> </a>

            <a href="index.php?action=deconnexion"> <div class="button">DECONNEXION</div> </a>

            <a href="index.php?action=code4liokoFormUpdate&id=<?=$_SESSION['id']?>"> <div class="button">Modifier mon profil </div></a>
        </div>

    </div>
</div>
<!-- ******************************
                MESSAGES
      ******************************-->
<div class="page_form" style="padding-left:20%; padding-right:20%;">

    <form>

        <input type="hidden" id="id" name="id" value="<?=$message->getId();?>">
        <p>
            <input type="text" id="nom" name="nom"  disabled="disabled" value="<?=$message->getNom();?>">
            <input type="text" id="mail" name="mail" disabled="disabled" value="<?=$message->getMail();?>">
            <input type="text" id="date_creation" name="date_creation" disabled="disabled" value="<?=$message->getDate();?>">
            <input type="text" id="subject" name="subject" disabled="disabled" value="<?=$message->getSubject();?>">
        </p>

        <p>
            <label for="content"> Message </label> <span class="error"></span>
            <textarea name="content" id="content" cols="100" rows="10" disabled="disabled" > <?=$message->getContent();?></textarea>
        </p>

    </form>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/Frontend/template.php'); ?>
