<?php $title = 'Message'; ?>

<?php ob_start(); ?>
<!-- ****************************************
                  ENTETE
      ******************************************-->

<div>
    <img src="Public/images/back.jpg" alt="Bourgine FAGADE" width="100%" height="auto">
</div>


<div>

    <?php if(isset($message)):?>
        <p> <?=$message?></p>
    <?php elseif (isset($message2)):?>
         <p> <?=$message2?></p>
    <?php endif;?>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/Frontend/template.php'); ?>
