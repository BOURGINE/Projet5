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

class CertificatController extends Controller
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
            $message = 'Félicitaion le Certificat a bien été ajouté';
        }
        else{
            $message = 'Désolé, une erreur est survenue. Action non effectuée';
        }
        // NB: Il faut que je retourne le résultat en HTLM.
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }


    /**
     ** Cette fonction lit un certificat spécifique en fonction de sont id.
     * NE PAS EFFACER
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
            $message = 'Félicitation, le certificat a  bien été modifié';
            // 2 - TRAITEMENT DE L'IMAGE ( Envoi de l'image dans mon dossier imgUpload)
            $this->saveImg();
        }
        else
        {
            $message = ' Désolé. Une erreur est survenue au niveau de la modification de votre compétence';
        }
        //NB: il faut que je retroune le résultat dans la vue
        include(__DIR__ . "/../View/Backend/messageAdmin.php");

    }


    public function delete($recupPost)
    {
        $certificatManager = new CertificatManager();

        $deleteIsOk = $certificatManager->delete($recupPost);

        if($deleteIsOk){
            $message = 'Félicitation. La compétence bien été supprimée';
        }else
        {
            $message = 'Désolé, Une erreur est arrivée. Impossible de supprimer cette compétence';
        }
        //NB: il faut que je retroune le résultat dans la vue
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }
}