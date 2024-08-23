<?php

session_start();

if (isset($_SESSION['jsonArray'])) {
    $jsonArray = $_SESSION['jsonArray'];

    echo $jsonArray;

    $criteriaArray = json_decode($jsonArray, true);

    //$fundamental = $criteriaArray[0];

    echo(gettype($criteriaArray));

    //echo $fundamental;

    //$additional = $criteriaArray[1];

    echo $criteriaArray;

    //$column_names = $data[0];

    //if ($column_names[0] == "") {
    //    array_splice($column_names, 0, 1);
    //}

    // Save the column names to the session
    //$_SESSION['data_fields'] = $data;

    echo "<div id='criterion_selection'>";

    echo "<div id='fundamental_variables'>";

    echo "<ul>";
    
    foreach ($fundamental as $name) {
        $name_no_spaces = str_replace(' ', '_', $name);
        echo "<div id=" . htmlspecialchars($name_no_spaces) . " data-name="  . htmlspecialchars($name) . "><li>" . htmlspecialchars($name) . "</li></div>";
    }

    echo "</ul>";

    echo "</div>";

    echo "<div id='additional_variables'>";

    echo "<ul>";
    
    foreach ($additional as $name) {
        $name_no_spaces = str_replace(' ', '_', $name);
        echo "<div id=" . htmlspecialchars($name_no_spaces) . " data-name="  . htmlspecialchars($name) . "><li>" . htmlspecialchars($name) . "</li></div>";
    }

    echo "</ul>";

    echo "</div>";

    echo "</div>";

}
?>