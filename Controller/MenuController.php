<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 26/03/2018
 * Time: 21:23
 */

namespace Projet5\Controller;

// On indique les espace de nom des classes utilisées.

use Projet5\Model\Entity\Menu;
use Projet5\Model\Manager\MenuManager;

class MenuController
{

    private $menu;

    /**
     **  CREATION d'un menu
     **/

    public function createMenu($contenu)
    {
        $menu = new Menu();
        $menu->setTitle($contenu['title']);

        //envoi des informations à la db via la fonction save du manager
        // donc j'instancie la classe ContactManager

        $menuManager = new MenuManager;
        $saveIsOk = $menuManager->save($menu);

        if($saveIsOk){
            $message = 'menu bien ajouté';

        } else{
            $message = 'erreur survenu. Action non effectué';
        }
        // NB: Il faut que je retourne le résultat en HTLM. Je pense que ça doit etre au niveau de la vue.

        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }



    public function formUpdate($recupInfos)
    {
        $menuManager = new MenuManager();

        $menu= $menuManager->read($_GET['id']);

        // IL doit aussi demandé le nouveau formulaire à la vue selon l'id

        include(__DIR__."/../View/Backend/form_UpdateMenu.php");
    }


    public function update()
    {
        // Je cré un nouvel object avec la classe ContactManager;
        // j'instancie ensuite la fonction read de l'object contactManager;

        $menuManager = new MenuManager();
        $menu= $menuManager->read($_POST['id']);

        // J'envoi en les infos aux differents élements de la classe contact
        $menu->setTitle($_POST['title']);

        // Je sauvegarde mes informations dans la base de données

        $saveIsOk = $menuManager->save($menu);

        if($saveIsOk)
        {
            $message = 'Félicitation, menu a été modifié';
        }
        else
        {
            $message = 'erreur au niveau de la modification de votre menu';
        }

        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }


    public function delete($recupPost)
    {
        $menuManager = new MenuManager();

        $deleteIsOk = $menuManager->delete($recupPost);

        if($deleteIsOk){
            $message = 'Le menu été bien supprimé';
        }else
        {
            $message = 'Une erreur est arrivée. Impossible de supprimer ce menu';
        }
        //NB: il faut que je retroune le réslutat en HTML
        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }
}