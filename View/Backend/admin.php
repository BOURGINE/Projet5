<?php $title = 'Administration'; ?>

<?php ob_start(); ?>

<!-- ************************************************************************************
              CONTENU
****************************************************************************************-->
    <!-- ****************************************
                   ENTETE
       ******************************************-->
<div style="height: 275px; width: 100%;">

    <div style="height: 200px; width: 100%;">
        <img src="Public/images/back.jpg" alt="Bourgine FAGADE" width="100%" height="100%">
    </div>

    <!-- ************** ESPACE MEMBRE *****************-->
    <div id="bande_profil" style="height: 70px; width: 100%;">


        <div style="border: 2px blue solid; height: 100%; width: 75%; display: flex;">

            <!-- ** IMAGE de PROFIL *-->
            <?php if(isset($_SESSION['img']['name'])):?>

            <div class="div_icone">
                <img src="Public/images/<?=$_SESSION['img']['name']?>" alt="" width="100%" height="100%"/>
            </div>
                <p> je suis ici</p>

            <?php else:?>
            <div class="div_icone">
                <img src="Public/images/backend.jpg" alt="Bourgine FAGADE" width="100%" height="100%">
                <p> je suis else</p>
            </div>

            <?php endif;?>

            <!-- ** PSEUDO *-->
            <?= 'HELLO '.$_SESSION['pseudo'].' !'?>


        </div>

        <!-- ************** MENU DE NAVIGATION *****************-->
        <div style="border: 2px red solid; height: 100%; width: 25%;">
            <a href="index.php"> <div class="button">ACCUEIL</div> </a>

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
                COMPETENCES (ALL)
    ******************************************-->
    <div class="section_articles">

        <!-- Titre -->
        <div class="entete_session" id="entete_competence">
            <a href="#corps_competence"> <h3>COMPETENCES</h3> </a>
        </div>

        <!-- Corps -->
        <div class="corps_session" id="corps_competence">
            <?php if(empty($competences)):?>
                <p> il n'y a aucune compétence dans la base de données</p>
            <?php else:?>

            <?php if($competences === false):?>
                <p> Une erreur vient de se produire</p>
            <?php else:?>
                <table>

                    <tr>
                        <th colspan="6"> <a href="#fermer"> Fermer </a> </th>
                    </tr>
                    <tr>
                        <th> LOGO </th>
                        <th> Titre  </th>
                        <th> Description  </th>
                        <th> Categorie </th>
                        <th colspan="2"> ACTIONS </th>
                    </tr>

                    <?php foreach ($competences as $competence):?>
                    <tr>
                        <td> <?= $competence->getImg();?> </td>
                        <td> <?= $competence->getTitle();?> </td>
                        <td><?= $competence->getContent();?> </td>
                        <td><?= $competence->getCategorie();?> </td>
                        <td> <a href="index.php?action=competence&order=formUpdate&id=<?= $competence->getId();?>"> MODIFIER</a>  </td>
                        <td> <a href="index.php?action=competence&order=delete&id=<?= $competence->getId();?>"> SUPPRIMER</a> </td>
                    </tr>
                    <?php endforeach;?>
                </table>

            <?php endif;?>
            <?php endif;?>
            <h3> <a href="index.php?action=competence&order=formCreate" style="color: darkred">
                    Ajouter une nouvelle compétences
                </a>
            </h3>

        </div>

    </div>


    <!-- ****************************************
                2- MON PARCOUR
       ******************************************-->
    <div class="section_articles">

        <!-- Titre -->
        <div class="entete_session" id="entete_parcours">
            <a href="#corps_parcours"> <h3>PARCOURS</h3> </a>
        </div>

        <!-- Corps -->
        <div class="corps_session" id="corps_parcours">
            <?php if(empty($parcours)):?>
                <p> il n'y a aucun contact</p>
            <?php else:?>
                <?php if($parcours === false):?>
                    <p> Une erreur vient de se produire</p>

                <?php else:?>

                    <table>
                        <tr>
                            <th> Titre</th>
                            <th> Content </th>
                            <th> Liens</th>
                            <th colspan="2"> ACTION </th>
                        </tr>

                        <?php foreach ($parcours as $parcour):?>
                            <tr>
                                <td> <?= $parcour->getTitle()?>  </td>
                                <td> <?= $parcour->getContent()?> </td>
                                <td> <?= $parcour->getLink()?></td>
                                <td> <a href="index.php?action=parcour&order=formUpdate&id=<?= $parcour->getId()?>"> MODIFIER</a>  </td>
                                <td> <a href="index.php?action=parcour&order=delete&id=<?= $parcour->getId()?>"> SUPPRIMER</a> </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                <?php endif;?>
            <?php endif;?>
        <h3> <a href="index.php?action=parcour&order=formCreate" style="color: darkred"> Ajouter un nouveau Parcours</a></h3>
        </div>
    </div>

    <!-- ****************************************
            3 - Realisation
     ******************************************-->
    <div class="section_articles">

        <!-- Titre -->
        <div class="entete_session" id="entete_realisation">
            <a href="#corps_realisation"> <h3>REALISATIONS</h3> </a>
        </div>

        <!-- Billets -->
        <div class="corps_session" id="corps_realisation">
            <?php if(empty($realisations)):?>
                <p> il n'y a aucun membre</p>
            <?php else:?>
                <?php if($realisations === false):?>
                    <p> Une erreur vient de se produire</p>
                <?php else:?>

                    <table>
                        <tr>
                            <th> Titre </th>
                            <th> Content</th>
                            <th> Lien vue</th>
                            <th> Lien github</th>
                            <th colspan="2"> ACTIONS </th>
                        </tr>

                        <?php foreach ($realisations as $realisation):?>
                            <tr>
                                <td> <?= $realisation->getTitle()?>  </td>
                                <td> <?= $realisation->getContent()?></td>
                                <td> <?= $realisation->getLinkView()?></td>
                                <td> <?= $realisation->getLinkGit()?></td>
                                <td> <a href="index.php?action=realisation&order=formUpdate&id=<?= $realisation->getId()?>"> MODIFIER</a> </td>
                                <td> <a href="index.php?action=realisation&order=delete&id=<?= $realisation->getId()?>"> SUPPRIMER</a> </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif;?>
            <?php endif;?>
            <h4> <a href="index.php?action=realisation&order=formCreate" style="color: darkred"> Ajouter une nouvelle REALISATION
                </a>
            </h4>
        </div>
    </div>


    <!-- ****************************************
             MENU (de certificat)
     ******************************************-->
    <div class="section_articles">

        <!-- Titre -->
        <div class="entete_session" id="entete_menu">
            <a href="#corps_menu">  <h3> MENU </h3> </a>
        </div>

        <!-- Corps -->
        <div class="corps_session" id="corps_menu">
            <?php if(empty($menus)):?>
                <p> il n'y a aucun menu</p>
            <?php else:?>

                <?php if($menus === false):?>
                    <p> Une erreur vient de se produire</p>
                <?php else:?>

                    <table>
                        <tr>
                            <th> Titre </th>
                            <th colspan="2"> ACTIONS </th>
                        </tr>

                        <?php foreach ($menus as $menu):?>
                            <tr>
                                <td> <?= $menu->getTitle();?>  </td>
                                <td> <a href="index.php?action=menu&order=formUpdate&id=<?= $menu->getId();?>"> MODIFIER</a> </td>
                                <td> <a href="index.php?action=menu&order=delete&id=<?= $menu->getId();?>"> SUPPRIMER</a> </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                <?php endif;?>
            <?php endif;?>
            <h4> <a href="index.php?action=menu&order=formCreate" style="color: darkred"> Ajouter MENU </a></h4>
        </div>
    </div>

    <!-- ****************************************
                 CERTIFICAT
     ******************************************-->
    <div class="section_articles">

        <!-- Titre -->
        <div class="entete_session" id="entete_certificat">
            <a href="#corps_certificat"> <h3> CERTIFICATS</h3></a>
        </div>

        <!-- Corps -->
        <div class="corps_session" id="corps_certificat">
            <?php if(empty($certificats)):?>
                <p> il n'y a aucun certificat</p>
            <?php else:?>

                <?php if($certificats === false):?>
                    <p> Une erreur vient de se produire</p>
                <?php else:?>

                    <table>
                        <tr>
                            <th> Titre </th>
                            <th> Categorie </th>
                            <th colspan="2"> ACTIONS </th>
                        </tr>

                        <?php foreach ($certificats as $certificat):?>
                            <tr>
                                <td> <?= $certificat->getTitle()?> </td>
                                <td> <?= $certificat->getCat()?> </td>
                                <td> <a href="index.php?action=certificat&order=formUpdate&id=<?= $certificat->getId()?>"> MODIFIER</a> </td>
                                <td> <a href="index.php?action=certificat&order=delete&id=<?= $certificat->getId()?>"> SUPPRIMER</a> </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                <?php endif;?>
            <?php endif;?>
            <h4> <a href="index.php?action=certificat&order=formCreate" style="color: darkred"> Ajouter CERTIFICATS </a></h4>
        </div>

    </div>

    <!-- ****************************************
               3 - les utilisateurs
    ******************************************-->
    <div class="section_articles">

        <!-- Titre -->
        <div class="entete_session" id="entete_utilisateur">
            <a href="#corps_utilisateur"> <h3> COMPTES ADMIN</h3></a>
        </div>

        <!-- Corps -->
         <div class="corps_session" id="corps_utilisateur">
            <?php if(empty($users)):?>
                <p> il n'y a aucun membre</p>
            <?php else:?>

                <?php if($users === false):?>
                    <p> Une erreur vient de se produire</p>
                <?php else:?>

                    <table>
                        <tr>
                            <th> Pseudo</th>
                            <th> ACTIONS </th>
                        </tr>

                        <?php foreach ($users as $user):?>
                            <tr>
                                <td> <?= $user->getPseudo()?></td>
                                <td> <a href="index.php?action=code4liokoDelete&id=<?= $user->getId()?>"> SUPPRIMER</a> </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                <?php endif;?>
            <?php endif;?>
            <h4> <a href="index.php?action=code4liokoFormCreate" style="color: darkred"> Créer un nouveau Compte </a></h4>
         </div>
    </div>



    <!-- ****************************************
       MESSAGES (FORMULAIRE DE CONTACT)
******************************************-->
    <div class="section_articles">

        <!-- Corps -->

        <div>

            <?php if($message_non_lu == 0):?>
                <p> il n'y a aucun nouveau message</p>
            <?php else:?>

            <?= $message_non_lu ?> <span> Message(s) non lu(s)</span>

            <?php endif;?>
            <h4> <a href="index.php?action=messages&p=" style="color: darkred"> LIRE LES MESSAGES </a></h4>
        </div>
    </div>


</div>



<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/Frontend/template.php'); ?>