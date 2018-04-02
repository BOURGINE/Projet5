<?php
/**
 * Created by PhpStorm.
 * User: BourgineMac
 * Date: 30/03/2018
 * Time: 15:21
 */
namespace Projet5\View;

class View
{

    function ShowFrontPage($page, $data)
    {
     // EN RESUME: Ce que je fais c'est apeller une page avec des données;

        // retrourner ce couple au template

        //1- Insertion des données dans ob_start pour retourner au la page
        ob_start();

            extract($data);
            include "View/FrontEnd/$page.php";

        $content=ob_get_clean();

        //3- Appelle template. je retrourne tous ça au template
        include ("View//FrontEnd/template.php");
    }


    function ShowBackPage($page, $data)
    {
        // EN RESUME: Ce que je fais c'est apeller une page avec des données;

        // retrourner ce couple au template

        //1- Insertion des données dans ob_start
        ob_start();
        extract($data);
        include "View/Backend/$page.php";

        $content=ob_get_clean();

        //3- Appelle template
        include ("View/FrontEnd/template.php");
    }
}