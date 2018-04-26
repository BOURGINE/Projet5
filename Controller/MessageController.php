<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 26/04/2018
 * Time: 14:37
 */

namespace Projet5\Controller;

use Projet5\Model\Entity\Message;
use Projet5\Model\Manager\MessageManager;

class MessageController
{
    private $message;

    /**
     **  CREATION d'un message
     **/

    public function createMessage($recup_messages)
    {
        $message = new Message();
        $message->setNom($recup_messages['nom']);
        $message->setMail($recup_messages['mail']);
        $message->setSubject($recup_messages['subject']);
        $message->setContent($recup_messages['content']);

        //envoi des informations à la db via la fonction save du manager
        // donc j'instancie la classe ContactManager

        $messageManager = new MessageManager;
        $saveIsOk = $messageManager->save($message);


        // A EFFACER APRES GESTION EN JAVASCRIPT
        if($saveIsOk){
            $message = 'message bien ajouté';

        } else{
            $message = 'erreur survenu. Action non effectué';
        }
        // NB: Il faut que je retourne le résultat en HTLM. Je pense que ça doit etre au niveau de la vue.

        include(__DIR__ . "/../View/Backend/messageAdmin.php");
    }

}