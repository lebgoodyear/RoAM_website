<?php

session_start();

if (isset($_SESSION['criteriaArray'])) {
    $criteriaArray = $_SESSION['criteriaArray'];

    //$fundamental = $criteriaArray[0];

    //$additional = $criteriaArray[1]

    //$column_names = $data[0];

    //if ($column_names[0] == "") {
    //    array_splice($column_names, 0, 1);
    //}

    // Save the column names to the session
    //$_SESSION['data_fields'] = $data;
    
    echo "<p>" . htmlspecialchars($criteriaArray) . "</p>";

}

?>