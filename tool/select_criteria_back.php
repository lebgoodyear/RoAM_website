<?php

session_start();

if (isset($_SESSION['data'])) {
    $data = $_SESSION['data'];
} else {
    header('Location: upload_csv_front.php')
    exit;
}

?>