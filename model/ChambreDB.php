<?php

    function addChambre($num,$typecham,$typelit,$statut)
    {
        $sql = "INSERT INTO chambre VALUES ('$num','$typecham' ,'$typelit', '$statut')";
        return executeSQL($sql);
    }

    function listeChambre()
    {
        $sql = "SELECT * FROM chambre";
        return executeSQL($sql);
    }
