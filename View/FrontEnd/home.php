<?php $title = 'Accueil'; ?>

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
            Je souhaite une bonne expérience utilisateur. N'hésitez pas à me faire une retour. A bientôt.
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
            <h2> COMPTENCES </h2>
        </header>
    </aside>

    <aside id="competence_boby">
        <!--BLOCK FRONT-END-->
        <div class="competence_enfant" style="border: 2px black solid;">
            <div class="ordinateur" style="border: 2px green solid;">
                <p><img src="Public/images/frontend.jpg" alt="ordinateur" style="text-align: center; width: 100%;"></p>
            </div>

            <div id="bloc_list" style="border: 2px yellow solid;">
                <?php if(empty($frontCompetences)):?>
                    <p> il n'y a aucune competences  </p>

                    <?php else:?>
                        <?php if($frontCompetences === false):?>
                            <p> Une erreur vient de se produire</p>

                        <?php else:?>

                            <?php foreach ($frontCompetences as $competence):?>
                            <!-- POUR CHAQUE COMPETENCES Front-->
                            <div class="section_liste" style="border: 2px red solid;">
                                <div class="div_icone">
                                    <img src="Public/images/<?= $competence->getImg();?>"/><!-- Image en php ici-->
                                </div>
                                <div class="div_texte" style="border: 2px indigo solid;">
                                    <p><strong> <?= $competence->getTitle();?> </strong></p>
                                    <p> <?= $competence->getContent();?></p>
                                    <a href="<?= $competence->getLink();?>"><button>Certificats</button></a>
                                </div>
                            </div>
                            <?php endforeach; ?>

                        <?php endif;?>
                    <?php endif;?>
            </div>
        </div>  <!--Fin bloc liste-->

        <!--BLOCK BACKEND-->
        <div class="competence_enfant" style="border: 2px blue solid;">
            <div class="ordinateur">
                <p><img src="Public/images/backend.jpg" alt="ordinateur" style="text-align: center; width: 100%;"></p>
            </div>

            <div id="bloc_list" style="border: 2px yellow solid;">

                <!-- POUR CHAQUE COMPETENCES de type back-->
                <div id="bloc_list" style="border: 2px yellow solid;">
                    <?php if(empty($backCompetences)):?>
                        <p> il n'y a aucune competences  </p>

                    <?php else:?>
                        <?php if($backCompetences === false):?>
                            <p> Une erreur vient de se produire</p>

                        <?php else:?>

                            <?php foreach ($backCompetences as $competence):?>
                                <!-- POUR CHAQUE COMPETENCES Front-->
                                <div class="section_liste" style="border: 2px red solid;">
                                    <div class="div_icone">
                                        <img src="Public/images/<?= $competence->getImg();?>"/><!-- Image en php-->
                                    </div>
                                    <div class="div_texte" style="border: 2px indigo solid;">
                                        <p><strong> <?= $competence->getTitle();?> </strong></p>
                                        <p> <?= $competence->getContent();?></p>
                                        <a href="<?= $competence->getLink();?>"><button>Certificats</button></a>
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
            <h2> Parcours </h2>
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
                                 <img  class="parcours" src="Public/images/<?= $parcour->getImg();?>"/> <!-- img en php/ manque la direction vers le dossier de l'image-->
                             </div>
                             <header>
                                 <h3><?= $parcour->getTitle();?></h3> <!-- title en php -->
                             </header>
                             <p><?= $parcour->getContent();?></p>
                             <a href="<?= $parcour->getLink();?>"><button>Voir</button></a>
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
    <header style="text-align: center;">
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
            <a href="<?= $realisation->getLinkView();?>" class="image featured">
                <img src="Public/images/<?= $realisation->getImg();?>" alt="réalisations"/>
            </a>
            <header>
                <h3><?= $realisation->getTitle();?></h3>
            </header>
            <p> <?= $realisation->getContent();?></p>
            <a href="<?= $realisation->getLinkView();?>"><button>Vue</button></a> <a href="<?= $realisation->getLinkGit();?>"><button>Github</button></a>
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
<section id="nos_projets" class="reel">


    <!-- MENU NAVIGATION -->
    <aside id="nos_projets1">
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
                        <li>
                            <a href="index.php?action=certificat&order=readAll#nos_projets1"> ALL</a>
                        </li>
                        <?php foreach ($menus as $menu):?>
                            <li>
                                <a href="index.php?action=certificat&order=readCat&cat=<?=$menu->getTitle();?>#nos_projets1"> <?=$menu->getTitle();?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                <?php endif;?>
            <?php endif;?>
        </nav>
    </aside> <!-- Fin nos_projet1 -->

    <!-- Nos_projets2 -->
    <aside id="nos_projets2">

        <?php if(empty($certificats)):?>
            <p> il n'y a aucun certificat</p>
        <?php else:?>

            <?php if($certificats === false):?>
                <p> Une erreur vient de se produire</p>
            <?php else:?>

                    <?php foreach ($certificats as $certificat):?>
                    <div id="#">
                        <!-- Pj1 -->
                        <div class="element">
                            <img src="Public/images/<?=$certificat->getImg();?>" alt="logo vision_360" class="image">
                            <div class="texte_element">
                                <a href="#popup"><i class="fa fa-eye fa-2x eye"></i></a>
                                <p class="text_p2">  <?=$certificat->getTitle();?> </p>
                            </div>
                        </div>

                        <!-- Popup à activer avec :target -->
                        <div id="popup">
                            <p id="croix"><a href="#fermer"><img src="img/croix.png" alt="fermeture"></a></p>
                            <br>
                            <div id="element2"><img src="Public/images/<?=$certificat->getImg();?>" alt=""></div>
                        </div>
                    </div>

                <?php endforeach; ?>


            <?php endif;?>
        <?php endif;?>


    </aside>

</section>


<!--*************************************
	 				CONTACT
*****************************************-->
<!-- Footer -->
<div id="footer">

    <div class="container">

        <div class="row">

            <!-- recommandations linkedin -->
            <section class="4u 12u(mobile)">
                <header>
                    <h2 class="icon fa-linkedin"><span class="label">Tweets</span></h2>
                </header>
                <ul class="divided">
                    <li>
                        <article class="tweet">
                            nulla convallis tique ante sociis accumsan.
                            <span class="timestamp">5 minutes ago</span>
                        </article>
                    </li>
                    <li>
                        <article class="tweet">
                            Hendrerit rutrum quisque.
                            <span class="timestamp">30 minutes ago</span>
                        </article>
                    </li>
                </ul>
            </section>

            <!-- projets github -->
            <section class="4u 12u(mobile)">
                <header>
                    <h2 class="icon fa-file circled"><span class="label">Posts</span></h2>
                </header>
                <ul class="divided">
                    <li>
                        <article class="post stub">
                            <header>
                                <h3><a href="#">Nisl fermentum integer</a></h3>
                            </header>
                            <span class="timestamp">3 hours ago</span>
                        </article>
                    </li>
                </ul>
            </section>

            <!-- Form de contact -->
            <section>

                <header>
                    <h2 class="icon fa-linkedin"><span class="label">Tweets</span></h2>
                </header>

                <div>
                    <p> <strong>WebAgency SAS</strong> <br> 25 Rue d'Hauteville 75010   Paris <br>Tel 01 02 03 04 05
                    </p>
                </div>
            </section>


        </div>
        <hr />

        <!-- BAS DE PAGE-->
        <div class="row">
            <div class="12u">
                <!-- Copyright -->
                <div class="copyright">
                    <ul class="menu">
                        <li>&copy; Untitled. All rights reserved.</li><li>Design: Bourgine Bérenger FAGADE</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('../Projet5/View/Frontend/template.php'); ?>
