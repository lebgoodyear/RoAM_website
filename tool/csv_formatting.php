<?php

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was uploaded
    if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] === UPLOAD_ERR_OK) {
        $csv_file = $_FILES['csv_file']['tmp_name'];

        // Save the data to the session
        $_SESSION['csv_data'] = $csv_file;

        // Redirect to the next page
        header('Location: select_criteria.php');
        exit;
    } else {
        echo "No file was uploaded.";
    }
}

?>