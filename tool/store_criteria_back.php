<?php

session_start();

$jsonCriteriaArray = $_POST["jsonCriteriaArray"];

// Save array of criteria to session
$_SESSION['jsonCriteriaArray'] = $jsonCriteriaArray;

header('Location: select_weights_front.php');

exit;

?>
