<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 24/03/2018
 * Time: 18:31
 */

namespace Projet5\Model\Manager;

// Je definis l'emplacement des classe je vais utiliser

use PDO;
use Projet5\Model\Entity\Competence;

class CompetenceManager extends Connex_Db
{
    private $pdoStatement;

    /**
     * Créaation
     **/

    private function create(Competence &$competence)
    {

        $this->pdoStatement=$this->pdo->prepare('INSERT INTO competence VALUES(NULL, :img, :title, :content, :link, :categorie)');

        $this->pdoStatement->bindValue(':img', $competence->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $competence->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $competence->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link', $competence->getLink(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':categorie', $competence->getCategorie(), PDO::PARAM_STR);

        $executeIsOk = $this->pdoStatement->execute();

        if(!$executeIsOk){ // si l'éxécution ne s'est pas bien passée

            return false;
        }
        else{

            $id = $this->pdo->lastInsertId();
            $competence = $this->read($id);
            return true;
        }
    }

    /**
     * Cette fonction n'est pas utile pour le moment.
     **/

    public function read($id)
    {
        $this->pdoStatement=$this->pdo->prepare('SELECT * FROM competence WHERE id=:id');

        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        $executeIsOk = $this->pdoStatement->execute();
        if($executeIsOk)
        {
            // récupération du réslutat. Ici, j'utiliserai fetchObject car je n'affiche qu'une seul ligne da db

            $competence= $this->pdoStatement->fetchObject('Projet5\Model\Entity\Competence');

            if($competence === false)
            {
                return null;
            }
            else
            {
                return $competence;
            }
        }
        else
        {
            return false;
        }
    }


    /**
     * Cette fonction lira toutes les competences (Front et back)
     * Elle servira pour le backoffice
     * Je ne sais pas encore si elle me servira.
     **/

    public function readAll()
    {
        $this->pdoStatement = $this->pdo->query('SELECT * FROM competence ORDER BY id DESC ');

        // récupération de résultats tableau. Un tableau se récupère en 3 étapes

        //1- initialisation du tableau vide
        $competences=[];

        // 2-On ajoute au table chaque ligne.
        while($competence=$this->pdoStatement->fetchObject('Projet5\Model\Entity\Competence'))
        {
            $competences[]=$competence;
        }
        //3- On retourne le table finalisé.
        return $competences;
    }


    /**
     * Cette fonction lira les compétences du Front
     **/

    public function readAllFront()
    {
        $this->pdoStatement = $this->pdo->query('SELECT * FROM competence WHERE categorie=1 ORDER BY id DESC ');

        // récupération de résultats tableau. Un tableau se récupère en 3 étapes

        //1- initialisation du tableau vide
        $competences=[];

        // 2-On ajoute au table chaque ligne.
        while($competence=$this->pdoStatement->fetchObject('Projet5\Model\Entity\Competence'))
        {
            $competences[]=$competence;
        }
        //3- On retourne le table finalisé.
        return $competences;
    }

    /**
     * Cette fonction lira les compétences du BACK
     **/

    public function readAllBack()
    {
        $this->pdoStatement = $this->pdo->query('SELECT * FROM competence WHERE categorie=2 ORDER BY id DESC ');

        // récupération de résultats tableau. Un tableau se récupère en 3 étapes

        //1- initialisation du tableau vide
        $competences=[];

        // 2-On ajoute au table chaque ligne.
        while($competence=$this->pdoStatement->fetchObject('Projet5\Model\Entity\Competence'))
        {
            $competences[]=$competence;
        }
        //3- On retourne le table finalisé.
        return $competences;
    }

    /**
     * Utilise l'id pour modifier les autres éléments d'un Post sauf le post_cat qui reste le meme.
     **/

    private function update(Competence $competence)
    {
        //preparation de la req
        $this->pdoStatement = $this->pdo->prepare('UPDATE competence set img=:img, title=:title, content=:content, link=:link, categorie=:categorie WHERE id=:id');

        //Liaison des paramètres des elements de formulaire a ceux des champs de la bdd
        $this->pdoStatement->bindValue(':id', $competence->getId(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':img', $competence->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $competence->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':content', $competence->getContent(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':link', $competence->getLink(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':categorie', $competence->getCategorie(), PDO::PARAM_STR);

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
        $this->pdoStatement =$this->pdo->prepare('DELETE FROM competence WHERE id=:id');

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

    public function save(Competence &$competence)
    {
        if (is_null($competence->getId())){
            return $this->create($competence);
        }
        else{
            return $this->update($competence);
        }
    }


}