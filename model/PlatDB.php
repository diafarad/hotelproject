<?php

    function addPlat($nom)
    {
        $sql = "INSERT INTO plat VALUES (NULL, '$nom')";
        return executeSQL($sql);
    }

    function listePlat()
    {
        $sql = "SELECT * FROM plat";
        return executeSQL($sql);
    }

    function updatePlat($id,$nom)
    {
        $sql = "UPDATE plat SET nom = '$nom'
                                  WHERE id = $id";
        return executeSQL($sql);
    }

    function deletePlat($id)
    {
        $sql = "DELETE FROM plat WHERE id = $id";
        return executeSQL($sql);
    }

    function getPlatById($id)
    {
        $sql = "SELECT * FROM plat WHERE id= '$id'";
        return executeSQL($sql);
    }