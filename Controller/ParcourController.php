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

class ParcourController
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
            $message = 'Parcours bien ajouté';

        } else{
            $message = 'erreur survenu. Action non effectué';
        }
        // NB: Il faut que je retourne le résultat en HTLM. Je pense que ça doit etre au niveau de la vue.

        // 2 - TRAITEMENT DE L'IMAGE ( Envoi de l'image dans mon dossier imgUpload)
        $this->saveImg();
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }


    /**
     ** Cette fonction sert à vérifier le type de fichier envoyé et à l'ajouter dans la db
     **/

    public function saveImg()
    {
        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($_FILES['img']) AND $_FILES['img']['error'] == 0)
        {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['img']['size'] <= 1000000)
            {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['img']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('pdf','jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                    // On peut valider le fichier et le stocker définitivement
                    $executeIsOk= move_uploaded_file($_FILES['img']['tmp_name'], __DIR__ .'/../Public/images/'.basename($_FILES['img']['name']));

                    if($executeIsOk)
                    {
                        echo "L'envoi de l'image a bien été effectué !";
                    }
                    else
                    {
                        echo "Il y a un probleme au niveau de l'envoi du fichier image dans la BDD";
                    }
                }
                else
                {
                    echo "l'extention de votre image n'est pas pris en charge";
                }
            }
            else
            {
                echo ' La taille du fichier est trop grand';
            }
        }
        else
        {
            echo 'le fichier image nexiste pas ou il y a une erreur';
        }
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
            $message = 'Félicitation, parours a été modifié';
        }
        else
        {
            $message = 'erreur au niveau de la modification de votre parcour';
        }

        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/messageAdmin.php");

        // 2 - TRAITEMENT DE L'IMAGE ( Envoi de l'image dans mon dossier imgUpload)
        $this->saveImg();
    }


    public function delete($recupPost)
    {
        $parcourManager = new ParcourManager();

        $deleteIsOk = $parcourManager->delete($recupPost);

        if($deleteIsOk){
            $message = 'La compétence été bien supprimé';
        }else
        {
            $message = 'Une erreur est arrivée. Impossible de supprimer cette compétence';
        }
        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }
}