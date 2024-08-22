<?php

ob_start();

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was uploaded
    if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] === UPLOAD_ERR_OK) {
        $csv_file = $_FILES['csv_file']['tmp_name'];
        $file_info = pathinfo($_FILES['csv_file']['name']);
        $file_extension = strtolower($file_info['extension']);

        // Check if the uploaded file is a CSV file
        if ($file_extension === 'csv') {
            
            // Store csv file as array
            $data = array_map('str_getcsv', file($csv_file));

            // Save the data to the session
            $_SESSION['csv_data'] = $data;

            // Redirect to the next page
            header('Location: select_criteria.php');
            exit;
        }    
        else {
            echo "Error: Uploaded file is not a csv.";
        }
    } else {
        echo "Error: No file was uploaded.";
    }
}

?>