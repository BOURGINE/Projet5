<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 26/04/2018
 * Time: 14:08
 */

namespace Projet5\Model\Manager;

use PDO;
use Projet5\Model\Entity\Message;
class MessageManager extends Connex_Db
{
    private $pdoStatement;

    private $messages_by_page = 4;

    private $num_max_before_after = 2;

    private $total_messages;

    private $total_messages_non_lu;

    private $last_page;

    private $num_page;


    /**
     *
     **/

    private function create(Message &$message)
    {
        $this->pdoStatement=$this->pdo->prepare('INSERT INTO message VALUES(NULL, :nom, :mail, now(), :subject, :content, :statut)');

        $this->pdoStatement->bindValue(':nom', $message->getNom(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':mail', $message->getMail(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':subject', $message->getSubject(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $message->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':statut', $message->getStatut(), PDO::PARAM_STR);

        $executeIsOk = $this->pdoStatement->execute();

        if(!$executeIsOk){ // si l'éxécution ne s'est pas bien passée

            return false;
        }
        else{

            $id = $this->pdo->lastInsertId();
            $parcour = $this->read($id);
            return true;
        }

    }

    /**
     * lis un post précis
     **/

    public function read($id)
    {
        $this->pdoStatement=$this->pdo->prepare('SELECT * FROM message WHERE id=:id');

        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        $executeIsOk = $this->pdoStatement->execute();
        if($executeIsOk)
        {
            // récupération du réslutat. Ici, j'utiliserai fetchObject car je n'affiche qu'une seul ligne da db

            $message= $this->pdoStatement->fetchObject('Projet5\Model\Entity\Message');

            if($message === false)
            {
                return null;
            }
            else
            {
                return $message;
            }
        }
        else
        {
            return false;
        }
    }

    /**
     * Cette fonction détermine le nbre tous les messages non lu.
     * Il me permettra de déterminer le nombre de messages non lus
     *
     **/
    public function totalMessagesNonLu()
    {
        // Nombre total de Message
        $this->pdoStatement = $this->pdo->query("SELECT id FROM message WHERE statut='non lu'");
        $this->total_messages_non_lu =  $this->pdoStatement->rowCount();

        $resultat = $this->total_messages_non_lu;
        return $resultat;
    }




    /**
     * Cette fonction lira toutes les articles
     **/

    public function readAll()
    {
        $this->pdoStatement = $this->pdo->query('SELECT * FROM message ORDER BY id DESC ');

        // récupération de résultats tableau. Un tableau se récupère en 3 étapes

        //1- initialisation du tableau vide
        $messages=[];

        // 2-On ajoute au table chaque ligne.
        while($message=$this->pdoStatement->fetchObject('Projet5\Model\Entity\Message'))
        {
            $messages[]=$message;
        }
        //3- On retourne le table finalisé.
        return $messages;
    }



    public function totalMessages()
    {
        // Nombre total de Message
        $this->pdoStatement = $this->pdo->query('SELECT id FROM message');
        $this->total_messages =  $this->pdoStatement->rowCount();

        $resultat = $this->total_messages;
        return $resultat;
    }

    /**
     * Cette fonction lira toutes les Messages par 4 x 4
     * @param num_page
     **/

    public function readAllByPage()
    {

        $this->total_messages =$this->totalMessages();

        // Le nombre total de PAGE
        $this->last_page = ceil($this->total_messages/$this->messages_by_page);

        // GERER LE $THIS->

        if(isset($_GET['p']) && is_numeric($_GET['p']))
        {
            $this->num_page = $_GET['p'];
        }
        else
        {
            $this->num_page = 1;
        }

        if($this->num_page <=1)
        {
            $this->num_page = 1;
        }

        elseif($this->num_page > $this->last_page)
        {
            $this->num_page = $this->last_page;
        }

        // LA REQUETTE

        $depart = ($this->num_page - 1)*$this->messages_by_page;


        $this->pdoStatement = $this->pdo->query("SELECT * FROM message ORDER BY id DESC LIMIT $depart,$this->messages_by_page");

        //1- initialisation du tableau vide
        $messages=[];

        // 2-On ajoute au table chaque ligne.
        while($message=$this->pdoStatement->fetchObject('Projet5\Model\Entity\Message'))
        {
            $messages[]=$message;
        }

        //3- On retourne le table finalisé.
        return $messages;
    }


    /**
     * Doit permettre de modifier le statut du message
     **/

    private function update(Message $message)
    {
        //preparation de la req
        $this->pdoStatement = $this->pdo->prepare('UPDATE message set statut=:statut WHERE id=:id');

        //Liaison des paramètres des elements de formulaire a ceux des champs de la bdd
        $this->pdoStatement->bindValue(':id', $message->getId(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':statut', $message->getStatut(), PDO::PARAM_STR);

        $executeIsOk= $this->pdoStatement->execute();

        //recuperation du résultat
        return $executeIsOk;
    }


    /**
     * Supprime Post à partir de son Id.
     **/

    public function delete($id)
    {
        //preparation de la req
        $this->pdoStatement =$this->pdo->prepare('DELETE FROM message WHERE id=:id');

        //liaison des paramettres
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        // execution de la req
        $executionIsOk = $this->pdoStatement->execute();

        //recupération du résultat.
        return $executionIsOk;
    }


    /**
    La fonction public save est un rAssemblement des fonctions create et de la fonction update.
     * Elle crée un objet contact lorsque qu'il n'y a pas d'id.
     * sinon, elle fait appel à la fonction UPDATE
     */

    public function save(Message &$message)
    {
        if (is_null($message->getId()))
        {
            return $this->create($message);
        }
        else
        {
            return $this->update($message);
        }
    }
}