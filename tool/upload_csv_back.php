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
            
            // Open the file
            $file = fopen($csv_file, 'r');

            // Read the header row first
            $headers = fgetcsv($file);

            // Initialize array to store the results
            $data = [];

            // Loop through remaining rows and assign values with headers as keys
                while (($row = fgetcsv($file)) !== FALSE) {
                $rowData = [];
            
                // Combine headers with row values to create associative array
                for ($i = 0; $i < count($headers); $i++) {
                    if (isset($row[$i])) {
                        $rowData[$headers[$i]] = $row[$i];
                    } else {
                        $rowData[$headers[$i]] = null; // Handle cases where a row might have fewer columns
                    }
                }
        
                // Add this row to our data array
                $data[] = $rowData;
            }
        
            // Close the file
            fclose($file);

            // Now $data contains all rows with header names as keys
            // Example: Access the data with $data[0]['column_name']

            // Display the data (for testing)
            //echo '<pre>';
            //print_r($data);
            //echo '</pre>';
            //print_r($headers);

            // Save the data to the session
            $_SESSION['csv_data'] = $data;
            $_SESSION['headers'] = $headers;

            // Redirect to the next page
            header('Location: select_criteria_front.php');
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