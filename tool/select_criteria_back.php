<?php

session_start();

if (isset($_SESSION['csv_data'])) {
    $data = $_SESSION['csv_data'];

    $column_names = $data[0];

    if ($column_names[0] == "") {
        array_splice($column_names, 0, 1);
    }

    // Save the column names to the session
    $_SESSION['data_fields'] = $data;
    
    echo "<div id='column_names'>";

    echo "<p class='variables'>Data fields</p>";

    echo "<ul>";
    
    foreach ($column_names as $name) {
        $name_no_spaces = str_replace(' ', '_', $name);
        echo "<div class='draggable_variables' id=" . htmlspecialchars($name_no_spaces) . " data-name="  . htmlspecialchars($name) . " draggable='true'><li>" . htmlspecialchars($name) . "</li></div>";
    }

    echo "</ul>";

    echo "</div>";

}

?>