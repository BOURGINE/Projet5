<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 26/04/2018
 * Time: 13:43
 */

namespace Projet5\Model\Entity;


class Message
{
    private $id;
    private $nom;
    private $mail;
    private $subject;
    private $content;

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
    public function getNom()
    {
        if(!isset($nom) && !is_string($this->nom)){
            echo 'la fonction getnom a du mal a récupérer le Name';
        }
        return (string) htmlspecialchars($this->nom);
    }

    /**
     * @param mixed $name
     */
    public function setNom($nom)
    {
        if(!isset($nom) && !is_string($nom))
        {
            echo'le titre n\'est pas bien définie';
        }
        else
        {
            $this->nom = htmlspecialchars($nom);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return (string) htmlspecialchars($this->mail);
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        if(filter_var($mail, FILTER_VALIDATE_EMAIL))
        {
            $this->mail = htmlspecialchars($mail);
        }
        else
        {
            echo 'Cet email a un format non adapté.';
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        if(!isset($subject) && !is_string($this->subject)){
            echo 'la fonction getSubject a du mal a récupérer le Suject';
        }
        return (string) htmlspecialchars($this->subject);
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        if(!isset($subject) && !is_string($subject))
        {
            echo'le Sujet n\'est pas bien définie';
        }
        else
        {
            $this->subject = htmlspecialchars($subject);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        if(!isset($content) && !is_string($this->content)){
            echo 'la fonction getContent a du mal a récupérer le Contenu';
        }
        return (string) htmlspecialchars($this->content);
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        if(!isset($content) && !is_string($content))
        {
            echo'le Contenu n\'est pas bien définie';
        }
        else
        {
            $this->content = htmlspecialchars($content);
        }
        return $this;
    }


}