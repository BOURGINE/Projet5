<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 27/03/2018
 * Time: 12:01
 */

namespace Projet5\Controller;

// On indique les espace de nom des classes utilisées.

use Projet5\Model\Entity\Realisation;
use Projet5\Model\Manager\RealisationManager;


class RealisationController extends Controller
{

    private $realisation;

    /**
     **  CREATION d'une Realisation
     **/

    public function createRealisation($contenu)
    { // 1 - GESTION ET ENVOI DES INFOS DANS LA BDD;
        // Donc instanciation de la class
        // Envoi des informations récupérer dans les POST

        $realisation = new Realisation();

        $realisation->setImg($_FILES['img']['name']);
        $realisation->setTitle($contenu['title']);
        $realisation->setContent($contenu['content']);
        $realisation->setLinkView($contenu['link_view']);
        $realisation->setLinkGit($contenu['link_git']);

        //envoi des informations à la db via la fonction save du manager
        // donc j'instancie la classe ContactManager

        $realisationManager = new RealisationManager;
        $saveIsOk = $realisationManager->save($realisation);


        if($saveIsOk){
            $message = 'Féliciation. Votre Realisation a bien été ajoutée';

            // 2 - TRAITEMENT DE L'IMAGE ( Envoi de l'image dans mon dossier imgUpload)
            $this->saveImg();
        }

        else
        {
            $message = 'Désolé. Une erreur est survenue. Action non effectuée';
        }
        // NB: Il faut que je retourne le résultat en HTLM. Je pense que ça doit etre au niveau de la vue.

        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }




    public function formUpdate($recupInfos)
    {
        $realisationManager = new RealisationManager();

        $realisation= $realisationManager->read($_GET['id']);

        // IL doit aussi demandé le nouveau formulaire à la vue selon l'id

        include(__DIR__."/../View/Backend/form_UpdateRealisation.php");
    }



    public function update()
    {
        // Je cré un nouvel object avec la classe ContactManager;
        // j'instancie ensuite la fonction read de l'object contactManager;
        $realisationManager = new RealisationManager();
        $realisation= $realisationManager->read($_POST['id']);

        // J'envoi en les infos aux differents élements de la classe contact
        $realisation->setImg($_FILES['img']['name']);
        $realisation->setTitle($_POST['title']);
        $realisation->setContent($_POST['content']);
        $realisation->setLinkView($_POST['link_view']);
        $realisation->setLinkGit($_POST['link_git']);

        // Je sauvegarde mes informations dans la base de données

        $saveIsOk = $realisationManager->save($realisation);

        if($saveIsOk)
        {
            $message = 'Félicitation, votre réalisation a bien été modifiée';

            // 2 - TRAITEMENT DE L'IMAGE ( Envoi de l'image dans mon dossier imgUpload)
            $this->saveImg();
        }
        else
        {
            $message = 'Désolé. Une erreur est survenu au niveau de la modification de votre réalisation';
        }

        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/messageAdmin.php");

    }


    public function delete($recupPost)
    {
        $realisationManager = new RealisationManager();

        $deleteIsOk = $realisationManager->delete($recupPost);

        if($deleteIsOk){
            $message = 'Félicitation. La realisation bien été supprimée';
        }else
        {
            $message = 'Désolé. Une erreur est arrivée. Impossible de supprimer cette réalisation';
        }
        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }
}