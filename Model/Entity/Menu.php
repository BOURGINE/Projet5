<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 27/03/2018
 * Time: 16:35
 */

namespace Projet5\Model\Entity;


class Menu
{
    private $id;
    private $title;

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}