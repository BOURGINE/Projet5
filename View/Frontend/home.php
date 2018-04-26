<?php $title = 'Bourgine B. FAGADE'; ?>

<?php ob_start(); ?>
<!--**************************
	 	HEADER
***************************-->

<?php
include('../Projet5/View/Frontend/header.php');
?>

<!--*************************************
	 		PRESENTATION
**************************************-->
<!-- Banner / Presentation -->
<section id="banner">
    <header>
        <h2><strong>Hello!</strong> Bienvenue sur mon site </h2>
        <p>
            Je souhaite une bonne expérience utilisateur. N'hésitez pas à me faire un retour. A bientôt.
        </p>
    </header>
</section>

<!--***********************************
	 	COMPETENCES
*************************************-->
<!-- Compétences -->
<section class="reel" id="competences">

    <aside id="features" class="container special">
        <header>
            <h2> COMPETENCES </h2>
        </header>
    </aside>

    <aside id="competence_boby">
        <!--BLOCK FRONT-END-->
        <div class="competence_enfant">
            <div class="ordinateur">
                <p><img src="Public/images/frontend.jpg" alt="frontend" style="text-align: center; width: 100%;"></p>
            </div>
            <div class="titre_h1"><h3>FRONTEND</h3></div>

            <div class="bloc_list">
                <?php if(empty($frontCompetences)):?>
                    <p> il n'y a aucune competences  </p>

                    <?php else:?>
                        <?php if($frontCompetences === false):?>
                            <p> Une erreur vient de se produire</p>

                        <?php else:?>

                            <?php foreach ($frontCompetences as $competence):?>
                            <!-- POUR CHAQUE COMPETENCES Front-->
                            <div class="section_liste">
                                <div class="div_icone">
                                    <img src="Public/images/<?= $competence->getImg();?>" alt=" bourgine fagade competences"/><!-- Image en php ici-->
                                </div>
                                <div class="div_texte">
                                    <p><strong> <?= $competence->getTitle();?> </strong></p>
                                    <p> <?= $competence->getContent();?></p>
                                   <a href="<?= $competence->getLink();?>"> <div class="button">Certificats</div> </a>
                                </div>
                            </div>
                            <?php endforeach; ?>

                        <?php endif;?>
                    <?php endif;?>
            </div>
        </div>  <!--Fin bloc liste-->

        <!--BLOCK BACKEND-->
        <div class="competence_enfant">
            <div class="ordinateur">
                <p><img src="Public/images/backend.jpg" alt="backend" style="text-align: center; width: 100%;"></p>
            </div>
            <div class="titre_h1"><h3>BACKEND</h3></div>

            <div class="bloc_list">

                <!-- POUR CHAQUE COMPETENCES de type back-->
                <div id="bloc_list">
                    <?php if(empty($backCompetences)):?>
                        <p> il n'y a aucune competences  </p>

                    <?php else:?>
                        <?php if($backCompetences === false):?>
                            <p> Une erreur vient de se produire</p>

                        <?php else:?>

                            <?php foreach ($backCompetences as $competence):?>
                                <!-- POUR CHAQUE COMPETENCES Front-->
                                <div class="section_liste">
                                    <div class="div_icone">
                                        <img src="Public/images/<?= $competence->getImg();?>" alt=" bourgine fagade competences"/><!-- Image en php-->
                                    </div>
                                    <div class="div_texte">
                                        <p><strong> <?= $competence->getTitle();?> </strong></p>
                                        <p> <?= $competence->getContent();?></p>
                                        <a href="<?= $competence->getLink();?>"> <div class="button">Certificats</div> </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        <?php endif;?>
                    <?php endif;?>
                </div>
            </div>
        </div>  <!--Fin bloc liste-->
    </aside>
    <!--Fin nos_services-->
</section>
<!--*************************************
	     PARCOURS
*****************************************-->
        <!-- Parcours -->
<div class="reel" id="parcours">

    <section id="features" class="container special">
        <header>
            <h2> PARCOURS </h2>
        </header>
        <div class="row">

            <!-- POUR CHAQUE COMPETENCES de type back-->
            <?php if(empty($parcours)):?>
                <p> il n'y a aucune Parcours  </p>

            <?php else:?>
                <?php if($parcours === false):?>
                    <p> Une erreur vient de se produire</p>

                <?php else:?>

                    <?php foreach ($parcours as $parcour):?>
                         <article class="4u 12u(mobile) special">

                             <div class="image featured">
                                 <a href="<?= $parcour->getLink();?>">
                                     <img  class="parcours" src="Public/images/<?= $parcour->getImg();?>" alt="parcours"/>
                                     <!-- img en php/ manque la direction vers le dossier de l'image-->
                                 </a>
                             </div>
                             <header>
                                 <h3><?= $parcour->getTitle();?></h3> <!-- title en php -->
                             </header>
                             <p><?= $parcour->getContent();?></p>
                         </article>

                    <?php endforeach; ?>

                <?php endif;?>
            <?php endif;?>

        </div>
    </section>

</div>


<!--***********************************
	 		REALISATION
*************************************-->
        <!-- Carousel / Portefolio -->
<section class="carousel" id="portefolio">
    <header>
        <h2> PORTEFOLIO </h2>
    </header>

    <div class="reel">


        <?php if(empty($realisations)):?>
            <p> il n'y a aucune Parcours  </p>

        <?php else:?>
        <?php if($realisations === false):?>
            <p> Une erreur vient de se produire</p>

        <?php else:?>

        <?php foreach ($realisations as $realisation):?>

                    <article>
                        <a href="<?= $realisation->getLinkView();?>" class="image_realisation" >
                            <img class="image" src="Public/images/<?= $realisation->getImg();?>" alt="bourgine fagade réalisations" style="width:100%"/>
                        </a>
                        <div class="session_content">
                            <header>
                                <h3><?= $realisation->getTitle();?></h3>
                            </header>
                            <p class="realisationContent"> <?= $realisation->getContent();?> </p>
                            <a href="<?= $realisation->getLinkView();?>"><div class="button">Vue</div></a> <a href="<?= $realisation->getLinkGit();?>"><div class="button">Github</div></a>
                        </div>
                    </article>


         <?php endforeach; ?>

         <?php endif;?>
        <?php endif;?>

    </div>
</section>

<!--*************************************

        CERTIFICAT DE REUSSITE

*****************************************-->
        <!-- Certificat -->
<section id="certificat" class="reel">

    <!-- MENU NAVIGATION -->
    <aside id="certificat_menu">
        <h2>CERTIFICATS DE REUSSITE</h2>
        <br>
        <nav id="nav2">
            <?php if(empty($menus)):?>
                <p> il n'y a aucune catégorie</p>
            <?php else:?>

                <?php if($menus === false):?>
                    <p> Une erreur vient de se produire</p>

                <?php else:?>
                    <ul>
                        <li class="category_item" id="all">
                            <a href="#certificat">ALLL</a>
                        </li>
                        <?php foreach ($menus as $menu):?>
                            <li class="category_item" id="<?=$menu->getTitle();?>">
                                <a href="#certificat"> <?=$menu->getTitle();?> </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                <?php endif;?>
            <?php endif;?>
        </nav>
    </aside> <!-- Fin nos_projet1 -->

    <!-- Nos_projets2 -->
    <aside id="certificat_enfant">

        <div class="block_container">
        <?php if(empty($certificats)):?>
            <p> il n'y a aucun certificat</p>
        <?php else:?>

            <?php if($certificats === false):?>
                <p> Une erreur vient de se produire</p>
            <?php else:?>

                    <?php foreach ($certificats as $certificat):?>
                        <!-- Pj1  NB: ici il faudra gérer la class block_container ou element en CSS-->
                            <!-- Pj1  NB: ici l'image avait comme class image-->
                            <img src="Public/images/<?=$certificat->getImg()?>" alt="certificat" class="element_item <?=$certificat->getCat()?>"/>
                <?php endforeach; ?>

            <?php endif;?>
        <?php endif;?>
        </div> <!-- Fin block containers -->
    </aside>

</section>


<!--*************************************

	 			CONTACT

*****************************************-->
<!-- Footer -->
<div id="footer">

    <div class="container">

        <div class="row">

            <!-- projets github -->
            <section class="4u 12u(mobile)">
                <header>
                    <h2 class="icon fa-file circled"><span class="label">Posts</span></h2>
                </header>
                <ul class="divided">
                    <li>
                        <article class="post stub">
                            <header>
                                <h3><a href="#">Télécharger mon CV</a></h3>
                            </header>
                        </article>
                    </li>
                </ul>
            </section>

            <!-- Form de contact -->
            <section>

                <header>
                    <h2 class="icon fa-building"><span class="label">Posts</span></h2>
                </header>

                <div>
                    <p> <strong style="color: white;">FAGADE Bourgine Bérenger</strong> <br> 11 A Rue Léon Blum 68100 Mulhouse<br>Tel 06 52 26 64 37
                    </p>
                </div>
            </section>


        </div>
        <hr />

        <!-- BAS DE PAGE-->
        <div class="row">
            <div class="12u">
                <!-- RESEAUX SOCIAUX -->
                <section class="contact">
                    <ul class="icons">
                        <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                        <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                        <li><a href="#" class="icon fa-github"><span class="label">Instagram</span></a></li>
                    </ul>
                </section>
                <!-- Copyright -->
                <div class="copyright">
                    <p class="menu" style="text-align: center;">
                        &copy; 2018. Tout droit réservé.  Bourgine Bérenger FAGADE
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/Frontend/template.php'); ?>
