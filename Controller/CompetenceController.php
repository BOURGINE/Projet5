<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 24/03/2018
 * Time: 17:55
 */

namespace Projet5\Controller;

// On indique les espace de nom des classes utilisées.

use Projet5\Model\Entity\Competence;
use Projet5\Model\Manager\CompetenceManager;

class CompetenceController extends Controller
{
    private $competence;

    /**
     **  CREATION d'une compétence
     **/

    public function createCompetence($contenu)
    { // 1 - GESTION ET ENVOI DES INFOS DANS LA BDD;
        // Donc instanciation de la class
        // Envoi des informations récupérer dans les POST par la méthode SET***

        $competence = new Competence();

        $competence->setImg($_FILES['img']['name']);
        $competence->setTitle($contenu['title']);
        $competence->setContent($contenu['content']);
        $competence->setLink($contenu['link']);
        $competence->setCategorie($contenu['categorie']);
        //envoi des informations à la db via la fonction save du manager
        // donc j'instancie la classe ContactManager

        $competenceManager = new CompetenceManager;
        $saveIsOk = $competenceManager->save($competence);

        if($saveIsOk){
            //  - TRAITEMENT DE L'IMAGE ( Envoi de l'image dans mon dossier imgUpload)
            $this->saveImg();
            $message = 'Félicitaion. Votre Competence bien été ajoutée';
        }
        else{
            $message = 'Désolé. Une erreur est survenue. Action non effectuée';
        }

        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }


    /**
     ** Cette fonction appelle le formulaire de mise à jour
     **/

    public function formUpdate($recupInfos)
    {
        $competenceManager = new CompetenceManager();

        $competence = $competenceManager->read($_GET['id']);

        // IL doit aussi demandé le nouveau formulaire à la vue selon l'id

        include(__DIR__."/../View/Backend/form_Update.php");
    }


    /**
     ** Cette fonction appelle l'action de mise à jour
     **/
    public function update()
    {
        // Je cré un nouvel object avec la classe ContactManager;
        // j'instancie ensuite la fonction read de l'object contactManager;

        $competenceManager = new CompetenceManager();
        $competence= $competenceManager->read($_POST['id']);

        // J'envoi en les infos aux differents élements de la classe contact
        $competence->setImg($_FILES['img']['name']);
        $competence->setTitle($_POST['title']);
        $competence->setContent($_POST['content']);
        $competence->setLink($_POST['link']);
        $competence->setCategorie($_POST['categorie']);

        // Je sauvegarde mes informations dans la base de données

        $saveIsOk = $competenceManager->save($competence);

        if($saveIsOk){
            $message = 'Félicitation, votre competence a bien été modifiée';

            // 2 - TRAITEMENT DE L'IMAGE ( Envoi de l'image dans mon dossier imgUpload)
            $this->saveImg();
        }
        else
            {
            $message = 'Désolé. Une erreur est survenue  au niveau de la modification de votre compétence';
        }

        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/messageAdmin.php");


    }

    /**
     ** Cette fonction supprime une Compétence ayant un id spécifique
     **/

    public function delete($recupPost)
    {
        $competenceManager = new CompetenceManager();

        $deleteIsOk = $competenceManager->delete($recupPost);

        if($deleteIsOk){
            $message = ' Félicitation, votre compétence bien été supprimée';
        }else
        {
            $message = 'Désolé. Une erreur est arrivée. Impossible de supprimer cette compétence';
        }
        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }
}