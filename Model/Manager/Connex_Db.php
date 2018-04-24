<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 30/03/2018
 * Time: 14:36
 */

namespace Projet5\Model\Manager;
use PDO;

class Connex_Db
{
    protected $pdo;

    /**
    connexion à la bdd avec la fonction constructeur
     * C'est une fonction PHP de connexion à la base de donnée via PDO
     **/
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=db734480021.db.1and1.com; dbname=db734480021', 'dbo734480021','Berenger2019@');
    }
}