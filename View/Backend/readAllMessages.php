<?php $title = 'MESSAGES REÇUS'; ?>

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

// GESTION DE PAGINATION

$pagination='';

if($this->last_page != 1)
{
    if($this->num_page > 1)
    {
        $previous = $this->num_page-1;
        $pagination = '<a href="index.php?action=messages&p='.$previous.'"> Précédent</a> &nbsp; &nbsp;';

        for ($i = $this->num_page - $this->num_max_before_after; $i<$this->num_page; $i++){
            if($i>0)
            {
                $pagination .='<a href="index.php?action=messages&p='.$i.'">'.$i.'</a> &nbsp;';
            }
        }

    }

    $pagination .='<span class="active">'.$this->num_page.'</span> &nbsp;';

    for ($i = $this->num_page +1; $i <= $this->last_page ; $i++){

        $pagination .='<a href="index.php?action=messages&p='.$i.'">'.$i.'</a>';

        if($i >= $this->num_page + $this->num_max_before_after)
        {
            break;
        }
    }

    // Si je ne suis pas sur la dernière page,
    if($this->num_page!= $this->last_page)
    {
        $next = $this->num_page + 1;
        $pagination .='<a href="index.php?action=messages&p='.$next.'"> Suivant </a>';
    }
}

?>

<!-- ************************************************************************************
              CONTENU
****************************************************************************************-->
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

            <a href="index.php?action=deconnexion"> <div class="button">DECONNEXION</div> </a>

            <a href="index.php?action=code4liokoFormUpdate&id=<?=$_SESSION['id']?>"> <div class="button">Modifier mon profil </div></a>
        </div>

    </div>
</div>


<!-- ****************************************
                CORPS BODY
******************************************-->

<div style="padding-left: 15px; padding-right: 15px">

    <!-- ****************************************
               MESSAGES REÇUS
    ******************************************-->
    <div class="section_articles">

        <!-- Titre VISIBLE -->
        <div>
            <?php if(empty($messages)):?>
                <p> il n'y a aucun message</p>
            <?php else:?>

                <div class="section_articles"> <h3 style="text-align: center"> MESSAGES REÇUS</h3></div>

                <?php if($messages === false):?>
                    <p> Une erreur vient de se produire</p>
                <?php else:?>

                        <?php foreach ($messages as $message):?>
                        <table id="entete_message">
                            <tr>
                                <td> <?= $message->getDate();?> </td>
                                <td> AUTEUR: <?=$message->getNom();?> </td>
                                <td> SUJET: <?= $message->getSubject();?> </td>
                                <td> STATUT: <?= $message->getStatut();?> </td>
                                <td>
                                    <form  action="index.php?action=messageRead" method="POST">
                                        <input type="hidden" name="id" value="<?=$message->getId()?>">
                                        <input type="hidden" name="statut" value="lu"/>
                                        <input  class="button" type="submit" value="LIRE" />
                                    </form>
                                </td>
                                <td> <a href="index.php?action=messagesDelete&id=<?= $message->getId();?>"> SUPPRIMER</a> </td>
                            </tr>

                        </table>
                        <?php endforeach;?>

                <?php endif;?>
            <?php endif;?>
        </div>

    </div>

</div>

<?php echo '<div id="pagination" style="text-align: center">'.$pagination.'</div>'?>

<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/Frontend/template.php'); ?>