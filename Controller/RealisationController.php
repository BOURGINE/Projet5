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


class RealisationController
{

    private $parcour;

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
            $message = 'Realisation bien ajouté';
        }

        else
        {
            $message = 'erreur survenu. Action non effectuée';
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
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
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
            $message = 'Félicitation, realisation a été modifié';
        }
        else
        {
            $message = 'erreur au niveau de la modification de votre realisation';
        }

        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/messageAdmin.php");

        // 2 - TRAITEMENT DE L'IMAGE ( Envoi de l'image dans mon dossier imgUpload)
        $this->saveImg();
    }


    public function delete($recupPost)
    {
        $realisationManager = new RealisationManager();

        $deleteIsOk = $realisationManager->delete($recupPost);

        if($deleteIsOk){
            $message = 'La realisation été bien supprimé';
        }else
        {
            $message = 'Une erreur est arrivée. Impossible de supprimer cette realisation';
        }
        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }
}