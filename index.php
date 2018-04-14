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
            if(isset($_SESSION['id']))
            {
                $controller->admin();
            }
            else
            {
                $controller->connexion($_POST);
            }
        }


        elseif ($_GET['action'] == 'code4liokoFormCreate')
        {
            // Vérifie s'il y a déjà une session. Car seul une personne connecté peut crée un Admin
            if(isset($_SESSION['id']))
            {
                $controller->formCreateUser();
            }
            // Sinon, renvoi-le l'accueil, c'est un imposteur.
            else
            {
                header('Location: index.php');
            }
        }

        elseif ($_GET['action'] == 'deconnexion')
        {
            session_destroy();
            header('Location: index.php');
        }




        /**
         * GESTION DES USERS
         **/


        elseif ($_GET['action'] == 'code4liokoCreateUser')
        {
            // Vérifie s'il y a déjà une session. Car seul une personne connecté peut crée un Admin
            if(isset($_SESSION['id']))
            {
                // Ici je dois vérifier formulaire n'est pas vide avant d'appeller la fonction
                if(!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['confirmPass']) && ($_POST['pass']) == ($_POST['confirmPass']))
                {
                    $userController->createUser($_POST);
                }
               else
               {
                   throw new Exception('Vous devez remplir tous les champs. Assurez-vous que le mot de passe soit identique');
               }
            }

            // Sinon, renvoi-le l'accueil, c'est un imposteur.
            else
            {
                header('Location: index.php');
            }
        }

        elseif ($_GET['action'] == 'code4liokoDelete')
        {
            // Vérifie s'il y a déjà une session. Car seul une personne connecté peut del
            if(isset($_SESSION['id']))
            {
                $userController->deleteUser($_GET['id']);
            }
            // Sinon, renvoi-le l'accueil, c'est un imposteur.
            else
            {
                header('Location: index.php');
            }
        }



        /**
         * GESTION DES COMPETENCES
         *
         **/

        elseif ($_GET['action'] == 'competence')
        {
           if(isset($_SESSION['id']))
           {
               if($_GET['order'] == 'formCreate')
               {
                   include ("View/Backend/form_CreateCompetence.php");
               }

               elseif($_GET['order'] == 'createCompetence')
               {
                   if(!empty($_FILES['img']['name']) && !empty($_POST['title']) && !empty($_POST['link']) && !empty($_POST['categorie']))
                   {
                       $competenceController->createCompetence($_POST);
                   }
                   else
                   {
                       // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                       throw new Exception('Vous devez remplir tous les champs.');
                   }
               }

               elseif($_GET['order'] == 'formUpdate')
               {
                   $competenceController->formUpdate($_GET['id']);
               }

               elseif($_GET['order'] == 'updateCompetence')
               {
                   if(!empty($_FILES['img']['name']) && !empty($_POST['title']) && !empty($_POST['link']) && !empty($_POST['categorie']))
                   {
                       $competenceController->update();
                   }
                   else
                   {
                       // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                       throw new Exception('Vous devez remplir tous les champs');
                   }
               }
               elseif($_GET['order'] == 'delete')
               {
                   $competenceController->delete($_GET['id']);
               }
           }
           else
           {
               header('Location: index.php');
           }

        }


        /**
         *
         * GESTION DES PARCOURS
         *
         **/


        elseif ($_GET['action'] == 'parcour')
        {
            // Ici je dois vérifier si la personne qui fait l'action est connecté.
            if(isset($_SESSION['id']))
            {
                if($_GET['order'] == 'formCreate')
                {
                    include ("View/Backend/form_CreateParcours.php");
                }

                elseif($_GET['order'] == 'createParcour')
                {
                    // Ici je dois vérifier formulaire n'est pas vide avant d'appeller la fonction

                    if (!empty($_FILES['img']['name']) && !empty($_POST['title']) && !empty($_POST['link']))
                    {
                        $parcourController->createParcour($_POST);
                    }
                    else
                    {
                        // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                        throw new Exception('Vous devez tous les champs obligatoires');
                    }

                }

                elseif($_GET['order'] == 'formUpdate')
                {
                    $parcourController->formUpdate($_GET['id']);
                }

                elseif($_GET['order'] == 'update')
                {
                    // Ici je dois vérifier formulaire n'est pas vide avant d'appeller la fonction
                    if (!empty($_FILES['img']['name']) && !empty($_POST['title']) && !empty($_POST['link']))
                    {
                        $parcourController->update();
                    }
                    else
                    {
                        // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                        throw new Exception('Vous devez remplir tous les champs');
                    }

                }
                elseif($_GET['order'] == 'delete')
                {
                    $parcourController->delete($_GET['id']);
                }
            }
            else
            {
                header('Location: index.php');
            }
        }



        /**
         *
         * GESTION DES REALISATIONS
         *
         **/

        elseif ($_GET['action'] == 'realisation')
        {

            // Ici, je dois vérifier si la personne qui fait l'action est connectée. sinon c'est un imposteur.
            if(isset($_SESSION['id']))
            {
                if($_GET['order'] == 'formCreate')
                {
                    include ("View/Backend/form_CreateRealisation.php");
                }

                elseif($_GET['order'] == 'createRealisation')
                {
                    // Ici je dois vérifier formulaire n'est pas vide avant d'appeller la fonction
                    if (!empty($_FILES['img']['name']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['link_view']) && !empty($_POST['link_git']))
                    {
                        $realisationController->createRealisation($_POST);
                    }
                    else
                    {
                        // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                        throw new Exception('Vous devez remplir tous les champs');
                    }
                }

                elseif($_GET['order'] == 'formUpdate')
                {
                    $realisationController->formUpdate($_GET['id']);
                }

                elseif($_GET['order'] == 'update')
                {
                    // Ici je dois vérifier formulaire n'est pas vide avant d'appeller la fonction
                    if (!empty($_FILES['img']['name']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['link_view']) && !empty($_POST['link_git']))
                    {
                        $realisationController->update();
                    }
                    else
                    {
                        // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                        throw new Exception('Vous devez remplir tous les champs');
                    }
                }
                elseif($_GET['order'] == 'delete') {
                    $realisationController->delete($_GET['id']);
                }
            }
            else // Je le recompagne à la porte, cet imposteur.
            {
                header('Location: index.php');
            }
        }


        /**
         *
         * GESTION DU MENU
         *
         **/


        elseif ($_GET['action'] == 'menu')
        {
            // Ici, je dois vérifier si la personne qui fait l'action est connectée
            if(isset($_SESSION['id']))
            {
                if($_GET['order'] == 'formCreate')
                {
                    include ("View/Backend/form_CreateMenu.php");
                }

                elseif($_GET['order'] == 'createMenu')
                {
                    // Ici je dois vérifier formulaire n'est pas vide avant d'appeller la fonction
                    if (!empty($_POST['title']))
                    {
                        $menuController->createMenu($_POST);
                    }
                    else
                    {
                        // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                        throw new Exception('Vous devez remplir le titre du menu');
                    }
                }

                elseif($_GET['order'] == 'formUpdate')
                {
                    $menuController->formUpdate($_GET['id']);
                }

                elseif($_GET['order'] == 'update')
                {
                    // Ici je dois vérifier formulaire n'est pas vide avant d'appeller la fonction
                    if (!empty($_POST['title']))
                    {
                        $menuController->update();
                    }
                    else
                    {
                        // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                        throw new Exception('Le titre du menu ne doit pas être vide!');
                    }

                }
                elseif($_GET['order'] == 'delete')
                {
                    $menuController->delete($_GET['id']);
                }
            }
            else
            {
                header('Location: index.php');
            }
        }



        /**
         * GESTION DES CERTIFICATS
         **/


        elseif ($_GET['action'] == 'certificat')
        {
            // Ici, je dois vérifier si la personne qui fait l'action est connectée
            if(isset($_SESSION['id']))
            {
                if($_GET['order'] == 'formCreate')
                {
                    $controller->formCreateCertificat();
                }

                elseif($_GET['order'] == 'createCertificat')
                {
                    // Ici je dois vérifier formulaire n'est pas vide avant d'appeller la fonction

                    if(!empty($_POST['title']) && !empty($_POST['cat']) && !empty($_FILES['img']['name']))
                    {
                        $certificatController->createCertificat($_POST);
                    }
                    else
                    {
                        // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                        throw new Exception('Vous devez choisir une image, un titre et une catégorie');
                    }
                }

                elseif($_GET['order'] == 'formUpdate')
                {
                    $certificatController->formUpdate($_GET['id']);
                }

                elseif($_GET['order'] == 'update')
                {
                    // Ici je dois vérifier formulaire n'est pas vide avant d'appeller la fonction
                    if(!empty($_POST['title']) && !empty($_POST['cat']) && !empty($_FILES['img']['name']))
                    {
                        $certificatController->update();
                    }
                    else
                    {
                        // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                        throw new Exception('Le titre du menu ne doit pas être vide!');
                    }
                }

                elseif($_GET['order'] == 'delete')
                {
                    // Penser à sécuriser l'action de suppression
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
                elseif($_GET['order'] == 'read')
                {
                    $certificatController->read($_GET['id']);
                }
            }
            else
            {
                 if($_GET['order'] == 'readAll')
                 {
                     $controller->home();
                 }

                 elseif($_GET['order'] == 'readCat')
                 {
                    $controller->HomeReadCat($_GET['cat']);
                 }
                 elseif($_GET['order'] == 'read')
                 {
                     $certificatController->read($_GET['id']);
                 }
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


