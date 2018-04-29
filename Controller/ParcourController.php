<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 26/03/2018
 * Time: 21:23
 */

namespace Projet5\Controller;

// On indique les espace de nom des classes utilisées.

use Projet5\Model\Entity\Parcour;
use Projet5\Model\Manager\ParcourManager;

class ParcourController extends Controller
{

    private $parcour;

    /**
     **  CREATION d'une compétence
     **/

    public function createParcour($contenu)
    { // 1 - GESTION ET ENVOI DES INFOS DANS LA BDD;
        // Donc instanciation de la class
        // Envoi des informations récupérer dans les POST par la méthode SET***

        $parcour = new Parcour();

        $parcour->setImg($_FILES['img']['name']);
        $parcour->setTitle($contenu['title']);
        $parcour->setContent($contenu['content']);
        $parcour->setLink($contenu['link']);

        //envoi des informations à la db via la fonction save du manager
        // donc j'instancie la classe ContactManager

        $parcourManager = new ParcourManager;
        $saveIsOk = $parcourManager->save($parcour);

        if($saveIsOk){
            $message = 'Félicitation. Votre Parcours bien été ajouté';

            // 2 - TRAITEMENT DE L'IMAGE ( Envoi de l'image dans mon dossier imgUpload)
            $this->saveImg();

        } else{
            $message = 'Désolé. Une erreur est survenue. Action non effectuée';
        }
        // NB: Il faut que je retourne le résultat en HTLM. Je pense que ça doit etre au niveau de la vue.

        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }




    public function formUpdate($recupInfos)
    {
        $parcourManager = new ParcourManager();

        $parcour= $parcourManager->read($_GET['id']);

        // IL doit aussi demandé le nouveau formulaire à la vue selon l'id

        include(__DIR__."/../View/Backend/form_UpdateParcours.php");
    }


    public function update()
    {
        // Je cré un nouvel object avec la classe ContactManager;
        // j'instancie ensuite la fonction read de l'object contactManager;

        $parcourManager = new ParcourManager();
        $parcour= $parcourManager->read($_POST['id']);

        // J'envoi en les infos aux differents élements de la classe contact
        $parcour->setImg($_FILES['img']['name']);
        $parcour->setTitle($_POST['title']);
        $parcour->setContent($_POST['content']);
        $parcour->setLink($_POST['link']);

        // Je sauvegarde mes informations dans la base de données

        $saveIsOk = $parcourManager->save($parcour);

        if($saveIsOk)
        {
            $message = 'Félicitation. Votre parours a bien été modifié';

            // 2 - TRAITEMENT DE L'IMAGE ( Envoi de l'image dans mon dossier imgUpload)
            $this->saveImg();
        }
        else
        {
            $message = 'Désolé. Une erreur est survenue au niveau de la modification de votre parcours';
        }

        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }



    public function delete($recupPost)
    {
        $parcourManager = new ParcourManager();

        $deleteIsOk = $parcourManager->delete($recupPost);

        if($deleteIsOk){
            $message = 'Félicitation. Le parcours été bien supprimé';
        }else
        {
            $message = 'Désolé. Une erreur est arrivée. Impossible de supprimer ce parcours';
        }
        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }
}