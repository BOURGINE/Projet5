<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 24/03/2018
 * Time: 17:55
 */

namespace Projet5\Controller;

// On indique les espace de nom des classes utilisées.

use Projet5\Model\Entity\Certificat;
use Projet5\Model\Manager\CertificatManager;
use Projet5\Model\Manager\MenuManager;

class CertificatController
{
    private $certificat;


    /**
     **  CREATION d'une compétence
     **/

    public function createCertificat($contenu)
    { // 1 - GESTION ET ENVOI DES INFOS DANS LA BDD;
        // Donc instanciation de la class
        // Envoi des informations récupérer dans les POST par la méthode SET***

        $certificat = new Certificat();

        $certificat->setImg($_FILES['img']['name']);
        $certificat->setTitle($contenu['title']);
        $certificat->setCat($contenu['cat']);

        //envoi des informations à la db via la fonction save du manager
        // donc j'instancie la classe ContactManager

        $certificatManager = new CertificatManager;
        $saveIsOk = $certificatManager->save($certificat);

        if($saveIsOk){
            $this->saveImg();
            $message = 'Certificat bien ajouté';
        }
        else{
            $message = 'erreur survenu. Action non effectué';
        }
        // NB: Il faut que je retourne le résultat en HTLM.
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
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'pdf');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                    // On peut valider le fichier et le stocker définitivement
                    $executeIsOk= move_uploaded_file($_FILES['img']['tmp_name'], __DIR__ .'/../Public/images/'.basename($_FILES['img']['name']));

                    if($executeIsOk)
                    {
                        echo '<script language="javascript"> alert("Format d\'image validé")</script>';
                    }
                    else
                    {
                        echo '<script language="javascript"> alert("Il y a un problème d\'envoi de l\'image dans la BDD")</script>';
                    }
                }
                else
                {
                    echo '<script language="javascript"> alert("l\'extention de votre image n\'est pas pris en charge")</script>';
                }
            }
            else
            {
                echo '<script language="javascript"> alert("La taille de l\'image est trop grande")</script>';
            }
        }
        else
        {
            echo '<script language="javascript"> alert("le fichier image n\'existe pas ou il y a une erreur")</script>';
        }

    }


    /**
     ** Cette fonction lit un certificat spécifique en fonction de sont id.
     * Elle est Permet de lit le certificat pour modification
     **/
    public function read($idrecup)
    {
        $certificatManager = new CertificatManager();
        $certificat = $certificatManager->read($_GET['id']);
    }

    /**
     ** Cette fonction appelle le formulaire de modification
     * Ce formulaire récupère et lit les informations présentes dans la bdd
     **/

    public function formUpdate($recupInfos)
    {
        $certificatManager = new CertificatManager();
        $certificat = $certificatManager->read($_GET['id']);

        //Menu
        $menuManager = new MenuManager();
        $menus = $menuManager->readAll();

        // IL doit aussi demandé le nouveau formulaire à la vue selon l'id

        include(__DIR__."/../View/Backend/form_UpdateCertificat.php");
    }

    /**
     ** Envoi des informations mise à jours dans la base de données
     **/

    public function update()
    {
        $certificatManager = new CertificatManager();
        $certificat= $certificatManager->read($_POST['id']);

        // J'envoi en les infos aux differents élements de la classe contact
        $certificat->setImg($_FILES['img']['name']);
        $certificat->setTitle($_POST['title']);
        $certificat->setCat($_POST['cat']);

        // Je sauvegarde mes informations dans la base de données

        $saveIsOk = $certificatManager->save($certificat);

        if($saveIsOk){
            $message = 'Félicitation, certificat a été modifié';
            // 2 - TRAITEMENT DE L'IMAGE ( Envoi de l'image dans mon dossier imgUpload)
            $this->saveImg();
        }
        else
        {
            $message = 'erreur au niveau de la modification de votre competence';
        }

        //NB: il faut que je retroune le résultat dans la vue
        include(__DIR__ . "/../View/Backend/messageAdmin.php");

    }


    public function delete($recupPost)
    {
        $certificatManager = new CertificatManager();

        $deleteIsOk = $certificatManager->delete($recupPost);

        if($deleteIsOk){
            $message = 'La compétence été bien supprimée';
        }else
        {
            $message = 'Une erreur est arrivée. Impossible de supprimer cette compétence';
        }
        //NB: il faut que je retroune le résultat dans la vue
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }
}