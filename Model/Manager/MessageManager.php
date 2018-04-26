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

    /**
     *
     **/

    private function create(Message &$message)
    {
        $this->pdoStatement=$this->pdo->prepare('INSERT INTO message VALUES(NULL, :nom, :mail, :subject, :content)');

        $this->pdoStatement->bindValue(':nom', $message->getNom(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':mail', $message->getMail(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':subject', $message->getMail(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $message->getContent(), PDO::PARAM_STR);

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