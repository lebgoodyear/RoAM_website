<?php

session_start();

if (isset($_SESSION['csv_data'])) {
    $data = $_SESSION['csv_data'];

    $column_names = $data[0];

    if ($column_names[0] == "") {
        array_splice($column_names, 0, 1);
    }

    $column_names = str_replace(' ', '_', $column_names);
    
    echo "<div id='column_names'>";

    echo "<p class='variables'>Data fields</p>";

    echo "<ul>";
    
    foreach ($column_names as $name) {
        echo "<div class='draggable_variables' id=" . htmlspecialchars($name) . " draggable='true'><li>" . htmlspecialchars($name) . "</li></div>";
    }

    echo "</ul>";

    echo "</div>";

}

?>