<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 08/03/2018
 * Time: 15:24
 */

namespace Projet5\Model\Manager;

// Je definis l'emplacement des classe je vais utiliser
use PDO;
use Projet5\Model\Entity\User;

class UserManager extends Connex_Db
{
    private $pdoStatement;

    /**
     * Cette fonction permet de créer un utilisateur
     **/

    private function create(User &$user)
    {
        //Préparation de la req
        //je lie pdoStatement à pdo car je fais une req préparée
        $this->pdoStatement=$this->pdo->prepare('INSERT INTO myuser VALUES(NULL, :pseudo, :pass)');

        //liaison des paramettres : Liaison des name du formulaire aux champs de la table post
        $this->pdoStatement->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':pass', $user->getPass(), PDO::PARAM_STR);
        //Exécution de la req
        $executeIsOk = $this->pdoStatement->execute();

        //Recupération du résultat
        if(!$executeIsOk){ // si l'éxécution ne s'est pas bien passée

            return false;
        }
        else{
            //Ajoute l'élement en mettant à jour d'id.
            $id = $this->pdo->lastInsertId();
            $user = $this->read($id);
            return true;
        }
    }

    /**
     * Cette fonction lis un utilisateur précis.
     **/
    public function read($id)
    {
        //préparation de la req
        $this->pdoStatement=$this->pdo->prepare('SELECT * FROM myuser WHERE id=:id');

        // liaison de la req
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        //exécution de la req
        $executeIsOk = $this->pdoStatement->execute();
        if($executeIsOk)
        {

            // récupération du réslutat. Ici, j'utiliserai fetchObject car je n'affiche qu'une seul ligne da db

            $user= $this->pdoStatement->fetchObject('Projet5\Model\Entity\User');

            if($user === false)
            {
                return null;
            }
            else
            {
                return $user;
            }
        }
        else
        {
            return false;
        }
    }

    /**
     *
     **/

    public function readAll()
    {
        $this->pdoStatement = $this->pdo->query('SELECT * FROM myuser ORDER BY id');

        //1- initialisation du tableau vide
        $users=[];
        // 2-On ajoute au table chaque ligne.
        while($user=$this->pdoStatement->fetchObject('Projet5\Model\Entity\User'))
        {
            $users[]=$user;
        }
        //3- On retourne le table finalisé.
        return $users;
    }


    /**
     *  Mise à jour à user
     **/

    private function update(User $user)
    {
        //preparation de la req
        $this->pdoStatement = $this->pdo->prepare('UPDATE myuser set img=:img, pseudo=:pseudo WHERE id=:id');

        //Liaison des paramètres des elements de formulaire a ceux des champs de la bdd
        $this->pdoStatement->bindValue(':id', $user->getId(), PDO::PARAM_STR);
        $newImage= $this->pdoStatement->bindValue(':img', $user->getImg(), PDO::PARAM_STR);
        $newPseudo= $this->pdoStatement->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);

        $executeIsOk= $this->pdoStatement->execute();

        if($executeIsOk)
        {
          // session_destroy();
          //  session_start();
            $_SESSION['img']['name'] = $newImage;
            $_SESSION['pseudo'] =  $newPseudo;
        }
        //recuperation du résultat
        return $executeIsOk;
    }

    /**
     *  Supprimer un compte user
     **/

    public function delete($id)
    {
        //preparation de la req
        $this->pdoStatement =$this->pdo->prepare('DELETE FROM myuser WHERE id=:id');

        //liaison des paramettres
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        // execution de la req
        $executionIsOk = $this->pdoStatement->execute();

        //recupération du résultat.
        return $executionIsOk;
    }


    /**
        Cette fonction verifie si les informations du formulaire de connexion sont exactes.
     * Elle récupère les infos de la base de donnée
     * Et les compare avec les information du formulaire de connexion
     */

    public function verifConnexion($infos)
    {
        //preparation de la req
        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM myuser WHERE pseudo=:pseudo');

        $this->pdoStatement->execute(array(
            'pseudo' => $infos['pseudo']));

        $resultat = $this->pdoStatement->fetch();

        $isPasswordCorrect = password_verify($infos['pass'], $resultat['pass']);

        if ($resultat && $isPasswordCorrect)
        {
            session_destroy();
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $resultat['pseudo'];
        }

     }


    /**
    La fonction public save est un rAssemblement des fonctions create et de la fonction update.
     * Elle crée un objet contact lorsque qu'il n'y a pas d'id.
     * sinon, elle fait appel à la fonction UPDATE
     */

    public function save(User &$user)
    {
        if (is_null($user->getId())){
            return $this->create($user);

        }
        else{
            return $this->update($user);
        }
    }


}