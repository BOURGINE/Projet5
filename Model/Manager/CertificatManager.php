<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 24/03/2018
 * Time: 18:34
 */

namespace Projet5\Model\Manager;

use PDO;
use Projet5\Model\Entity\Certificat;

class CertificatManager extends Connex_Db
{
    private $pdoStatement;

    /**
     *
     **/

    private function create(Certificat &$certificat)
    {
        $this->pdoStatement=$this->pdo->prepare('INSERT INTO certificat VALUES(NULL, :img, :title, :cat)');

        $this->pdoStatement->bindValue(':img', $certificat->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $certificat->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':cat', $certificat->getCat(), PDO::PARAM_STR);

        $executeIsOk = $this->pdoStatement->execute();

        if(!$executeIsOk){ // si l'éxécution ne s'est pas bien passée

            return false;
        }
        else{

            $id = $this->pdo->lastInsertId();
            $certificat = $this->read($id);
            return true;
        }
    }

    /**
     * lis un post précis
     **/

    public function read($id)
    {
        $this->pdoStatement=$this->pdo->prepare('SELECT * FROM certificat WHERE id=:id');

        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        $executeIsOk = $this->pdoStatement->execute();
        if($executeIsOk)
        {

            // récupération du réslutat. Ici, j'utiliserai fetchObject car je n'affiche qu'une seul ligne da db

            $certificat= $this->pdoStatement->fetchObject('Projet5\Model\Entity\Certificat');

            if($certificat === false)
            {
                return null;
            }
            else
            {
                return $certificat;
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
        $this->pdoStatement = $this->pdo->query('SELECT * FROM certificat ORDER BY id DESC ');

        // récupération de résultats tableau. Un tableau se récupère en 3 étapes

        //1- initialisation du tableau vide
        $certificats=[];

        // 2-On ajoute au table chaque ligne.
        while($certificat=$this->pdoStatement->fetchObject('Projet5\Model\Entity\Certificat'))
        {
            $certificats[]=$certificat;
        }
        //3- On retourne le table finalisé.
        return $certificats;
    }


    /**
     * Cette fonction lira toutes les certificats en fonction des categories
     **/


    public function readCat($cat)
    {
        $this->pdoStatement=$this->pdo->prepare('SELECT * FROM certificat WHERE cat=:cat');

        $this->pdoStatement->bindValue(':cat', $cat, PDO::PARAM_STR);

        $executeIsOk = $this->pdoStatement->execute();

        //1- initialisation du tableau vide
        $certificats=[];

        // 2-On ajoute au table chaque ligne.
        while($certificat=$this->pdoStatement->fetchObject('Projet5\Model\Entity\Certificat'))
        {
            $certificats[]=$certificat;
        }
        //3- On retourne le table finalisé.
        return $certificats;
    }

    /**
     * Utilise l'id pour modifier les autres éléments d'un Post sauf le post_cat qui reste le meme.
     **/

    private function update(Certificat $certificat)
    {
        //preparation de la req
        $this->pdoStatement = $this->pdo->prepare('UPDATE certificat set img=:img, title=:title, cat=:cat WHERE id=:id');

        //Liaison des paramètres des elements de formulaire a ceux des champs de la bdd
        $this->pdoStatement->bindValue(':id', $certificat->getId(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':img', $certificat->getImg(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':title', $certificat->getTitle(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':cat', $certificat->getCat(), PDO::PARAM_STR);

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
        $this->pdoStatement =$this->pdo->prepare('DELETE FROM certificat WHERE id=:id');

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

    public function save(Certificat &$certificat)
    {
        if (is_null($certificat->getId())){
            return $this->create($certificat);
        }
        else{
            return $this->update($certificat);
        }
    }

}