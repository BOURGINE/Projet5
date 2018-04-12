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
        if(!isset($title) && !is_string($this->title)){
            echo 'la fonction getTitle a du mal a récupérer le titre';
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
    public function getContent()
    {
        if(!isset($content) && !is_string($this->content)){
            echo 'la fonction getContent a du mal a récupérer le titre';
        }
        return (string) htmlspecialchars($this->content);
    }

    /**
     * @param mixed $content
     * @return $this
     */
    public function setContent($content)
    {
        if(!isset($content) && !is_string($content))
        {
            echo'le contenu n\'est pas bien définie';
        }
        else
        {
            $this->content = htmlspecialchars($content);
        }
        return $this;
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