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

class CompetenceController
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
            $message = 'Competence bien ajouté';

        }
        else{
            $message = 'erreur survenu. Action non effectué';
        }

        include(__DIR__ . "/../View/Backend/admin.php");
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
        $competenceManager = new CompetenceManager();

        $competence = $competenceManager->read($_GET['id']);

        // IL doit aussi demandé le nouveau formulaire à la vue selon l'id

        include(__DIR__."/../View/Backend/form_Update.php");
    }


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
            $message = 'Félicitation, competence a été modifié';

            // 2 - TRAITEMENT DE L'IMAGE ( Envoi de l'image dans mon dossier imgUpload)
            $this->saveImg();
        }
        else
            {
            $message = 'erreur au niveau de la modification de votre competence';
        }

        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/messageAdmin.php");


    }


    public function delete($recupPost)
    {
        $competenceManager = new CompetenceManager();

        $deleteIsOk = $competenceManager->delete($recupPost);

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