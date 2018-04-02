<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 24/03/2018
 * Time: 17:55
 *
 */
namespace Projet5\Controller;

// On indique les espace de nom des classes utilisées.

use Projet5\Model\Entity\Competence;
use Projet5\Model\Manager\CompetenceManager;
use Projet5\Controller\CompetenceController;

use Projet5\Model\Entity\Parcour;
use Projet5\Model\Manager\ParcourManager;
use Projet5\Controller\ParcourController;

use Projet5\Model\Entity\Realisation;
use Projet5\Model\Manager\RealisationManager;
use Projet5\Controller\RealisationController;

use Projet5\Model\Entity\Menu;
use Projet5\Model\Manager\MenuManager;
use Projet5\Controller\MenuController;

use Projet5\Model\Entity\Certificat;
use Projet5\Model\Manager\CertificatManager;
use Projet5\Controller\CertificatController;

use Projet5\Model\Entity\User;
use Projet5\Model\Manager\UserManager;
use Projet5\Controller\UserController;


class Controller
{
    private $competence;

    /**
     *   ELle retorune la page d'accueil avec readAll.
     **/

    public function home()
    {

        // On instancie tous les manager Ici et appelle leur fonction de lecture (read)

        // Competences
        $competenceManager = new CompetenceManager();
        $frontCompetences = $competenceManager->readAllFront();
        $backCompetences = $competenceManager->readAllBack();

        // Parcours
        $parcourManager = new ParcourManager();
        $parcours = $parcourManager->readAll();

        // Réalisation
        $realisationManager = new RealisationManager();
        $realisations = $realisationManager->readAll();

        //Menu
        $menuManager = new MenuManager();
        $menus = $menuManager->readAll();

        //Certificat
        $certificatManager = new CertificatManager();
        $certificats = $certificatManager->readAll();

        // On affiche ensuite le résultat en HTML en appellant ma vue depuis mon controlleur-ci.
        include(__DIR__ . "/../View/FrontEnd/home.php");
    }

    public function HomeReadCat($cat)
    {

        // On instancie tous les manager Ici et appelle leur fonction de lecture (read)

        // Competences
        $competenceManager = new CompetenceManager();
        $frontCompetences = $competenceManager->readAllFront();
        $backCompetences = $competenceManager->readAllBack();

        // Parcours
        $parcourManager = new ParcourManager();
        $parcours = $parcourManager->readAll();

        // Réalisation
        $realisationManager = new RealisationManager();
        $realisations = $realisationManager->readAll();

        //Menu
        $menuManager = new MenuManager();
        $menus = $menuManager->readAll();

        //Certificat
        $certificatManager = new CertificatManager();
        $certificats = $certificatManager->readCat($cat);
        include(__DIR__ . "/../View/FrontEnd/home.php");
    }


    /**
     *   NAVIGATION ENTRE LES PAGES
     **/

    public function formConnexion()
    {
        include(__DIR__."/../View/FrontEnd/form_connexion.php");
    }

    public function formCreateUser()
    {
        include(__DIR__."/../View/Backend/form_CreateUser.php");
    }

    public function connexion($info)
    {
        $userManager = new UserManager();

        $userManager->verifConnexion($info);
        //Le user Manager aura une fonction de vérification entre les données du formulaires et les données et de la db

        if(isset($_SESSION['id']))
        {
            $this->admin();
        }
        else
        {
            // redirigera vers le formulaire de connexion avec
            // le FAMEUX message mot de passe incorrecte.
            header('Location: index.php');
        }
    }

    /**
     **  Retourne le formulaire de création du certificat
     **/

    public function formCreateCertificat()
    {
        //Menu
        $menuManager = new MenuManager();
        $menus = $menuManager->readAll();
        // IL doit aussi demandé le nouveau formulaire à la vue selon l'id

        include(__DIR__."/../View/Backend/form_CreateCertificat.php");
    }


    /**
     **  Retourne le formulaire de création du certificat
     **/
    public function Admin()
    {
        // Competences
        $competenceManager = new CompetenceManager();
        $competences = $competenceManager->readAll();

        // Parcours
        $parcourManager = new ParcourManager();
        $parcours = $parcourManager->readAll();

        // Réalisation
        $realisationManager = new RealisationManager();
        $realisations = $realisationManager->readAll();

        //Menu
        $menuManager = new MenuManager();
        $menus = $menuManager->readAll();

        //Certificat
        $certificatManager = new CertificatManager();
        $certificats = $certificatManager->readAll();

        //Certificat
        $userManager = new UserManager();
        $users = $userManager->readAll();




        include(__DIR__ . "/../View/Backend/admin.php");
    }


}