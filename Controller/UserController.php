<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 22/03/2018
 * Time: 10:17
 */

namespace Projet5\Controller;

use Projet5\Model\Entity\User;
use Projet5\Model\Manager\UserManager;

class UserController extends Controller
{
    // c'est l'inscription
    public function createUser($contenu)
    {
        // Les vérifications on été faites on auniveau du routeur avant d'appeler ma fonction.
        // Je hache ensuite le mot de passe.

        $pass_hache = password_hash($contenu['pass'], PASSWORD_DEFAULT);

        $user = new user();
        $user->setPseudo($contenu['pseudo']);
        $user->setPass($pass_hache);

        //envoi des informations à la db via la fonction save du manager
        $userManager = new UserManager;
        $saveIsOk = $userManager->save($user);

        if($saveIsOk){
            $message = 'Votre Compte à bien été créé ';

        } else{
            $message = 'Votre compte n\'a pas pu être créé. Une erreur est survenue;';
        }

        include(__DIR__ ."/../View/Backend/messageAdmin.php");
    }


    public function formUpdateUser($recupIn)
    {
        $userManager = new UserManager();

        $user= $userManager->read($_GET['id']);

        // IL doit aussi demandé le nouveau formulaire à la vue selon l'id

        include(__DIR__."/../View/Backend/form_UpdateUser.php");
    }


    public function updateUser()
    {

        // j'instancie ensuite la fonction read de l'object contactManager;
        $userManager = new UserManager();
        $user= $userManager->read($_POST['id']);

        // J'envoi en les infos aux differents élements de la classe contact
        $user->setImg($_FILES['img']['name']);
        $user->setPseudo($_POST['pseudo']);

        // Je sauvegarde mes informations dans la base de données

        $saveIsOk = $userManager->save($user);

        if($saveIsOk)
        {
            $message = 'Félicitation, votre profil a bien été modifiée';

            // 2 - TRAITEMENT DE L'IMAGE ( Envoi de l'image dans mon dossier imgUpload)
            $this->saveImg();
        }
        else
        {
            $message = 'Désolé. Une erreur est survenu au niveau de la modification de votre profil';
        }

        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/messageAdmin.php");

    }


    public function deleteUser($recupUser)
    {
        $userManager = new UserManager();

        $deleteIsOk = $userManager->delete($recupUser);

        if($deleteIsOk){
            $message = 'L\'utilisateur a été bien supprimée';
        }else
        {
            $message = 'Une erreur est arrivée';
        }

        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }
}