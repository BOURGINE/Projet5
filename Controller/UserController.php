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

class UserController
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
        $user->setRole($contenu['role']);

        //envoi des informations à la db via la fonction save du manager
        $userManager = new UserManager;
        $saveIsOk = $userManager->create($user);

        if($saveIsOk){
            $message = 'Votre Compte à été bien créée ';

        } else{
            $message = 'Votre compte n\'a pas pu être créé. Une erreur est arrivée;';
        }

        include(__DIR__ ."/../View/Backend/messageAdmin.php");
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