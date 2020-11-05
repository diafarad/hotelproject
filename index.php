<?php

require_once "public/web/rooting.php";
require_once "public/web/menu.php";

require_once "model/DB.php";
require_once "model/ChambreDB.php";


if(isset($_GET['page']))
{
    switch ($_GET['page'])
    {
        case 'accueil':
            require_once "view/accueil/index.php";
            break;
        case 'chambre':
            $chambres = listeChambre();
            require_once "view/chambre/index.php";
            break;
        case 'visiteur':
            $chambres = listeChambre();
            require_once "view/visiteur/index.php";
            break;
        default:
            header("location:".base_url());
            break;
    }
}
?>
