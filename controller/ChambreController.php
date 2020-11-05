<?php

require_once '../model/DB.php';
require_once '../model/ChambreDB.php';

    //Inscription
    $ok = 0;
    if(isset($_POST['numc']) && isset($_POST['typechambre']) && isset($_POST['typelit'])){
        $numc = $_POST['numc'];
        $typecham = $_POST['typechambre'];
        $lit = $_POST['typelit'];
        $statut = 'Libre';

        $con = getConnection();
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $ok = addChambre($numc,$typecham,$lit,$statut);
        return $ok;

    }
