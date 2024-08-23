<?php

session_start();

$criteriaArray = $_POST["criteriaArray"];

// Save array of criteria to session
$_SESSION['criteriaArray'] = $criteriaArray;

header('Location: calculate_utility_front.php');

exit;

?>
