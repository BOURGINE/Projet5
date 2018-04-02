<?php $title = 'Administration'; ?>

<?php ob_start(); ?>


    <!-- ************************************************************************************
               Il devrait afficher toutes les entités:Post - les commentaires - les users
    ****************************************************************************************-->
<div>

    <div>
        <h1> BACKOFFICE</h1>
        <a href="index.php"><button>ACCEUIL</button></a>
        <a href="index.php?action=deconnexion"><button>DECONNEXION</button></a>
    </div>


    <!-- ****************************************
                COMPETENCES (ALL)
    ******************************************-->
    <div class="section_articles"">
        <h3>COMPETENCES</h3>
        <!-- Billets -->
        <?php if(empty($competences)):?>
            <p> il n'y a aucune compétence dans la base de données</p>
        <?php else:?>

            <?php if($competences === false):?>
                <p> Une erreur vient de se produire</p>
            <?php else:?>
                <table>
                    <tr>
                        <th > LOGO </th>
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
                    <?php endforeach; ?>
                </table>

            <?php endif;?>
        <?php endif;?>
        <h3> <a href="index.php?action=competence&order=formCreate" style="color: darkred"> Ajouter une nouvelle compétences</a></h3>
    </div>


    <!-- ****************************************
                2- MON PARCOUR
       ******************************************-->
    <div class="section_articles">
        <h3>PARCOURS</h3>

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


    <!-- ****************************************
            3 - Realisation
     ******************************************-->

    <div class="section_articles">
        <h3>REALISATIONS</h3>
        <!-- Billets -->
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
                            <td> <a href="index.php?action=realisation&order=update&id=<?= $realisation->getId()?>"> MODIFIER</a> </td>
                            <td> <a href="index.php?action=realisation&order=delete&id=<?= $realisation->getId()?>"> SUPPRIMER</a> </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            <?php endif;?>
        <?php endif;?>
        <h4> <a href="index.php?action=realisation&order=formCreate" style="color: darkred"> Ajouter une nouvelle REALISATION </a></h4>
    </div>


    <!-- ****************************************
             MENU CERTIFICAT
     ******************************************-->

    <div class="section_articles">
        <h3> MENU </h3>
        <!-- Billets -->
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
                            <td> <a href="index.php?action=menu&order=update&id=<?= $menu->getId();?>"> MODIFIER</a> </td>
                            <td> <a href="index.php?action=menu&order=delete&id=<?= $menu->getId();?>"> SUPPRIMER</a> </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            <?php endif;?>
        <?php endif;?>
        <h4> <a href="index.php?action=menu&order=formCreate" style="color: darkred"> Ajouter MENU </a></h4>
    </div>

    <!-- ****************************************
                 CERTIFICAT
     ******************************************-->

    <div class="section_articles">
        <h3> CERTIFICATS</h3>
        <!-- Billets -->
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
                            <td> <?= $certificat->getTitle()?>  </td>
                            <td> <?= $certificat->getCat()?>  </td>
                            <td> <a href="index.php?action=certificat&order=update&id=<?= $certificat->getId()?>"> MODIFIER</a> </td>
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
        <h3> COMPTES ADMIN</h3>
        <!-- Billets -->
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

<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/Frontend/template.php'); ?>