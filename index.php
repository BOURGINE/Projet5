<?php
session_start();

require"Autoload/Autoloader.php";
use Autoload\Autoloader;
Autoloader::register();


use Projet5\Model\Entity\Competence;
use Projet5\Model\Manager\CompetenceManager;

use Projet5\Controller\Controller;
use Projet5\Controller\CompetenceController;

use Projet5\Model\Entity\Realisation;
use Projet5\Model\Manager\RealisationManager;

use Projet5\Model\Entity\Menu;
use Projet5\Model\Manager\MenuManager;

use Projet5\Model\Entity\Certificat;
use Projet5\Model\Manager\CertificatManager;

use Projet5\Model\Entity\User;
use Projet5\Model\Manager\UserManager;

// Ici c'est la déclaration de Class. C'est ce que je dois gérer avec un autloader
$controller = new Projet5\Controller\Controller();

$competence = new Projet5\Model\Entity\Competence();
$competenceController = new Projet5\Controller\CompetenceController();

$parcour = new Projet5\Model\Entity\Parcour();
$parcourController = new Projet5\Controller\ParcourController();

$realisation = new Projet5\Model\Entity\Realisation();
$realisationController = new Projet5\Controller\RealisationController();

$menu = new Projet5\Model\Entity\Menu();
$menuController = new Projet5\Controller\MenuController();

$certificat = new Projet5\Model\Entity\Certificat();
$certificatController = new Projet5\Controller\CertificatController();

$user = new Projet5\Model\Entity\User();
$userController = new Projet5\Controller\UserController();

try {

    if (isset($_GET['action'])) // si une action est effectué par l'utilisateur
    {

        /**
         * CONNEXION AU BACK OFFICE
         **/

        if ($_GET['action'] == 'code4lioko')
        {
           $controller->formConnexion();
        }

        elseif ($_GET['action'] == 'code4liokoConnexion')
        {
            $controller->connexion($_POST);
        }

        elseif ($_GET['action'] == 'code4liokoFormCreate')
        {
            $controller->formCreateUser();
        }

        elseif ($_GET['action'] == 'deconnexion')
        {
            session_destroy();
            header('Location: index.php');
        }

        elseif($_GET['action'] == 'accesAdmin')
        {
            $controller->Admin();
        }




        /**
         * GESTION DES USERS
         **/



        elseif ($_GET['action'] == 'code4liokoCreateUser')
        {
            $userController->createUser($_POST);
        }

        elseif ($_GET['action'] == 'code4liokoDelete')
        {
            $userController->deleteUser($_GET['id']);
        }





        /**
         * GESTION DES COMPETENCES
         *
         **/

        elseif ($_GET['action'] == 'competence')
        {
            if($_GET['order'] == 'formCreate')
            {
                include ("View/Backend/form_CreateCompetence.php");
            }

            elseif($_GET['order'] == 'createCompetence')
            {
                $competenceController->createCompetence($_POST);
            }

            elseif($_GET['order'] == 'formUpdate')
            {
                $competenceController->formUpdate($_GET['id']);
            }

            elseif($_GET['order'] == 'updateCompetence')
            {
                $competenceController->update();
            }
            elseif($_GET['order'] == 'delete')
            {
                $competenceController->delete($_GET['id']);
            }
            else
            {
                echo'jai rien';
            }

        }



        /**
         *
         * GESTION DES PARCOURS
         *
         **/


        elseif ($_GET['action'] == 'parcour')
        {
            if($_GET['order'] == 'formCreate')
            {
                include ("View/Backend/form_CreateParcours.php");
            }

            elseif($_GET['order'] == 'createParcour')
            {
                $parcourController->createParcour($_POST);
            }

            elseif($_GET['order'] == 'formUpdate')
            {
                $parcourController->formUpdate($_GET['id']);
            }

            elseif($_GET['order'] == 'update')
            {
                $parcourController->update();
            }
            elseif($_GET['order'] == 'delete')
            {
                $parcourController->delete($_GET['id']);
            }
            else
            {
                echo'jai rien';
            }
        }



        /**
         *
         * GESTION DES REALISATIONS
         *
         **/

        elseif ($_GET['action'] == 'realisation')
        {
            if($_GET['order'] == 'formCreate')
            {
                include ("View/Backend/form_CreateRealisation.php");
            }

            elseif($_GET['order'] == 'createRealisation')
            {
                $realisationController->createRealisation($_POST);
            }

            elseif($_GET['order'] == 'formUpdate')
            {
                $realisationController->formUpdate($_GET['id']);
            }

            elseif($_GET['order'] == 'update')
            {
                $realisationController->update();
            }
            elseif($_GET['order'] == 'delete')
            {
                $realisationController->delete($_GET['id']);
            }
            else
            {
                echo'jai rien';
            }
        }



        /**
         *
         * GESTION DU MENU
         *
         **/


        elseif ($_GET['action'] == 'menu')
        {
            if($_GET['order'] == 'formCreate')
            {
                include ("View/Backend/form_CreateMenu.php");
            }

            elseif($_GET['order'] == 'createMenu')
            {
                $menuController->createMenu($_POST);
            }

            elseif($_GET['order'] == 'formUpdate')
            {
                $menuController->formUpdate($_GET['id']);
            }

            elseif($_GET['order'] == 'update')
            {
                $menuController->update();
            }
            elseif($_GET['order'] == 'delete')
            {
                $menuController->delete($_GET['id']);
            }
            else
            {
                echo'jai rien';
            }
        }




        /**
         * GESTION DES CERTIFICATS
         **/


        elseif ($_GET['action'] == 'certificat')
        {
            if($_GET['order'] == 'formCreate')
            {
                // Je dois créer et appeller une fonction qui permet de :
                // récupérer la categorie ($menu->getTitle)
                //et qui l'affiche.
                $controller->formCreateCertificat();
            }

            elseif($_GET['order'] == 'createCertificat')
            {
                $certificatController->createCertificat($_POST);
            }

            elseif($_GET['order'] == 'formUpdate')
            {
                $certificatController->formUpdate($_GET['id']);
            }

            elseif($_GET['order'] == 'update')
            {
                $certificatController->update();
            }
            elseif($_GET['order'] == 'delete')
            {
                $certificatController->delete($_GET['id']);
            }

            elseif($_GET['order'] == 'readAll')
            {
                $controller->home();
            }

            elseif($_GET['order'] == 'readCat')
            {
                $controller->HomeReadCat($_GET['cat']);

            }


            else
            {
                echo'jai rien';
            }
        }


        else
        {
            $controller->home();
        }

    }

    else
    {
        $controller->home();
    }
}
// Si ces chose ne marchent pas affiche des messages d'erreurs
catch (Exception $e)
{ // S'il y a eu une erreur, alors...
    echo $e->getMessage();
}


