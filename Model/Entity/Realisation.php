<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 27/03/2018
 * Time: 11:39
 */

namespace Projet5\Model\Entity;


class Realisation
{
    private $id;
    private $img;
    private $title;
    private $content;
    private $link_view;
    private $link_git;

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
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getLinkView()
    {
        return $this->link_view;
    }

    /**
     * @param mixed $link_view
     */
    public function setLinkView($link_view)
    {
        $this->link_view = $link_view;
    }

    /**
     * @return mixed
     */
    public function getLinkGit()
    {
        return $this->link_git;
    }

    /**
     * @param mixed $link_git
     */
    public function setLinkGit($link_git)
    {
        $this->link_git = $link_git;
    }



}