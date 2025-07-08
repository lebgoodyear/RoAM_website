<?php

session_start();

// Check if the data exists in the session
if (!isset($_SESSION["newData"]) || !isset($_SESSION["newHeaders"])) {
     http_response_code(500);
     echo "Missing required data in session";
     exit;
}

// $data = $_SESSION["newData"];
$newHeaders = $_SESSION["newHeaders"];
$newData = $_SESSION['newData'];

// Set headers for direct download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="data_with_metric_values.csv"');
header('Pragma: no-cache');
header('Expires: 0');
header('Cache-Control: must-revalidate');

// Create output stream directly to browser
$output = fopen('php://output', 'w');

// Write headers including new columns
fputcsv($output, $newHeaders);

// Write data rows
foreach ($newData as $row) {
      fputcsv($output, $row);
}

// Close the file
fclose($output);

exit;
?>