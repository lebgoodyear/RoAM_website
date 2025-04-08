<?php

session_start();

$jsonArray = $_POST["jsonWeightsArray"];

// Save array of criteria to session
$_SESSION['jsonWeightsArray'] = $jsonWeightsArray;

header('Location: select_weights_front.php');

exit;

?>