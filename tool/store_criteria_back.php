<?php

session_start();

$jsonArray = $_POST["jsonArray"];

// Save array of criteria to session
$_SESSION['jsonArray'] = $jsonArray;

header('Location: calculate_utility_front.php');

exit;

?>
