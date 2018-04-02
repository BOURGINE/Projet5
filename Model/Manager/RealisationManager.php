<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 24/03/2018
 * Time: 18:32
 */

namespace Projet5\Model\Manager;

use PDO;
use Projet5\Model\Entity\Realisation;

class RealisationManager
{
    private $pdo;

    private $pdoStatement;

    /**
    connexion à la bdd avec la fonction constructeur
     * C'est une fonction PHP de connexion à la base de donnée via PDO
     **/
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost; dbname=projet5', 'root','root');
    }

    /**
     *
     **/

    private function create(Realisation &$realisation)
    {
        $this->pdoStatement=$this->pdo->prepare('INSERT INTO realisation VALUES(NULL, :img, :title, :content, :link_view, :link_git)');

        $this->pdoStatement->bindValue(':img', $realisation->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $realisation->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $realisation->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link_view', $realisation->getLinkView(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link_git', $realisation->getLinkGit(), PDO::PARAM_STR);

        $executeIsOk = $this->pdoStatement->execute();

        if(!$executeIsOk){ // si l'éxécution ne s'est pas bien passée

            return false;
        }
        else{

            $id = $this->pdo->lastInsertId();
            $realisation = $this->read($id);
            return true;
        }
    }

    /**
     * lis un post précis
     **/

    public function read($id)
    {
        $this->pdoStatement=$this->pdo->prepare('SELECT * FROM realisation WHERE id=:id');

        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        $executeIsOk = $this->pdoStatement->execute();
        if($executeIsOk)
        {

            // récupération du réslutat. Ici, j'utiliserai fetchObject car je n'affiche qu'une seul ligne da db

            $realisation= $this->pdoStatement->fetchObject('Projet5\Model\Entity\Realisation');

            if($realisation === false)
            {
                return null;
            }
            else
            {
                return $realisation;
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
        $this->pdoStatement = $this->pdo->query('SELECT * FROM realisation ORDER BY id DESC ');

        // récupération de résultats tableau. Un tableau se récupère en 3 étapes

        //1- initialisation du tableau vide
        $realisations=[];

        // 2-On ajoute au table chaque ligne.
        while($realisation=$this->pdoStatement->fetchObject('Projet5\Model\Entity\Realisation'))
        {
            $realisations[]=$realisation;
        }
        //3- On retourne le table finalisé.
        return $realisations;
    }

    /**
     * Utilise l'id pour modifier les autres éléments d'un Post sauf le post_cat qui reste le meme.
     **/

    private function update(Realisation $realisation)
    {
        //preparation de la req
        $this->pdoStatement = $this->pdo->prepare('UPDATE realisation set img=:img, title=:title, content=:content, link_view=:link_view, Link_git=:link_git WHERE id=:id');

        //Liaison des paramètres des elements de formulaire a ceux des champs de la bdd
        $this->pdoStatement->bindValue(':id', $realisation->getId(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':img', $realisation->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $realisation->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $realisation->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link_view', $realisation->getLinkView(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link_git', $realisation->getLinkGit(), PDO::PARAM_STR);

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
        $this->pdoStatement =$this->pdo->prepare('DELETE FROM realisation WHERE id=:id');

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

    public function save(Realisation &$realisation)
    {
        if (is_null($realisation->getId())){
            return $this->create($realisation);

        }
        else{
            return $this->update($realisation);
        }
    }


}