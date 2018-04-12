<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 28/03/2018
 * Time: 11:08
 */

namespace Projet5\Model\Entity;


class Certificat
{
    private $id;
    private $img;
    private $title;
    private $cat;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        if(!isset($title) && !is_string($this->title)){
            echo 'la fonction getTitle du mal a récupérer le titre';
        }
        return (string) htmlspecialchars($this->title);
    }

    /**
     * @param mixed $title
     * @return $this
     */
    public function setTitle($title)
    {
        if(!isset($title) && !is_string($title))
        {
            echo'le titre n\'est pas bien définie';
        }
        else
        {
            $this->title = htmlspecialchars($title);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCat()
    {
        if (!is_string($this->cat)){
            echo 'Problème avec le getCat';
        }
        return $this->cat;
    }

    /**
     * @param mixed $cat
     * @return $this
     */
    public function setCat($cat)
    {
        if(!isset($cat) && !is_string($cat))
        {
            echo'le titre n\'est pas bien définie';
        }
        else{
            $this->cat = htmlspecialchars($cat);
        }
        return $this;
    }



}