<?php

require_once '../model/DB.php';

$con = getConnection();
$json = array();

$query ="SELECT * FROM sejour";

$liste_sejours = mysqli_query($con,$query);

foreach ($liste_sejours as $nature) {
    $json[$nature[0]] = $nature[1];
}
echo json_encode($json);