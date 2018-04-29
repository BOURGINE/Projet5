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

class MessageController extends Controller
{
    private $message;

    private $last_page;

    private $num_page;

    private $total_messages;

    private $num_max_before_after = 2;

    private $messages_by_page = 4;

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
        $message->setStatut($recup_messages['statut']);

        //envoi des informations à la db via la fonction save du manager
        // donc j'instancie la classe ContactManager

        $messageManager = new MessageManager;
        $saveIsOk = $messageManager->save($message);


        // A EFFACER APRES GESTION EN JAVASCRIPT
        if($saveIsOk){

            echo "<script> alert(\"Félicitation. Votre message a bien été  ajouté\")</script>";
            $this->home();

        }
        else
        {
            echo "<script> alert(\"Désolé. Une erreur est survenue. Veuillez essayer à nouveau.\")</script>";
            $this->home();
        }

    }


    /**
     **  Cette fonction lis plusieurs messages par page
     **/

    public function readAllMessagesByPage()
    {
        // Je récupère le nombre total de Message ($message_Post)
        $messageManager= new MessageManager();
        $this->total_messages = $messageManager->totalMessages();

        // Je récupère le nombre total de page
        $this->last_page = ceil($this->total_messages/$this->messages_by_page);

        // condition Pour lire la pagination

        if(isset($_GET['p']) && is_numeric($_GET['p']))
        {
            $this->num_page = $_GET['p'];
        }
        else
        {
            $this->num_page = 1;
        }

        if($this->num_page <= 1)
        {
            $this->num_page = 1;
        }
        elseif($this->num_page > $this->last_page)
        {
            $this->num_page= $this->last_page;
        }

        // LECTURE DES ARTICLES 8x8
        $messageManager = new MessageManager();
        $messages = $messageManager->readAllByPage();


        include(__DIR__ . "/../View/Backend/readMessage.php");
    }


    public function updateStatut()
    {
        $messageManager = new MessageManager();
        $message= $messageManager->read($_POST['id']);

        $message->setStatut($_POST['statut']);

        // Je sauvegarde mes informations dans la base de données
        $messageManager->save($message);

    }


    public function deleteMessage($recupMessage)
    {
        $messageManager = new MessageManager();

        $deleteIsOk = $messageManager->delete($recupMessage);

        if($deleteIsOk)
        {
            $message = 'Félicitation. Le message a bien été supprimé';
        }
        else
        {
            $message = 'Désolé. Une erreur est arrivée. Action non éffectuée';
        }

        $this->readAllMessagesByPage();

    }


    public function SendMail($recup_messages)
    {

        $mail = 'bourgine.fagade@gmail.fr'; // Déclaration de l'adresse de destination.
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
        {
            $passage_ligne = "\r\n";
        }
        else
        {
            $passage_ligne = "\n";
        }
        //=====Déclaration des messages au format texte et au format HTML.
        $message_txt = $recup_messages['content'];
        $message_html = "<html><head></head><body><b> ok </b>, voici un e-mail envoyé par un <i>script PHP</i>.</body></html>";
        //==========

        //=====Création de la boundary
        $boundary = "-----=".md5(rand());
        //==========

        //=====Définition du sujet.
        $sujet = "Hey mon ami !";
        //=========

        //=====Création du header de l'e-mail.
        $header = "From: \"WeaponsB\"<weaponsb@mail.fr>".$passage_ligne;
        $header.= "Reply-to: \"WeaponsB\" <weaponsb@mail.fr>".$passage_ligne;
        $header.= "MIME-Version: 1.0".$passage_ligne;
        $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
        //==========

        //=====Création du message.
        $message = $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format texte.
        $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_txt.$passage_ligne;
        //==========
        $message.= $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format HTML
        $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_html.$passage_ligne;
        //==========
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        //==========

        //=====Envoi de l'e-mail.
        mail($mail,$sujet,$message,$header);
        //==========

    }
}