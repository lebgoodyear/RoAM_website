<?php

session_start();

if (isset($_SESSION['jsonArray'])) {
    $jsonArray = $_SESSION['jsonArray'];

    $criteriaArray = json_decode($jsonArray, true);

    $fundamental = $criteriaArray[0];

    $additional = $criteriaArray[1];

    echo "<div id='criterion_selection'>";

    echo "<div class='final_criteria'>";

    echo "<p>Fundamental criteria</p>";

    echo "<ul id='fundamental_variables'>";
    
    foreach ($fundamental as $name) {
        $name_no_spaces = str_replace(' ', '_', $name);
        echo "<div id=" . htmlspecialchars($name_no_spaces) . " class='fundamental_variable' data-name="  . htmlspecialchars($name) . "><li>" . htmlspecialchars($name) . "</li></div>";
    }

    echo "</ul>";

    echo "</div>";

    echo "<div class='final_criteria'>";

    echo "<p>Additional criteria</p>";

    echo "<ul id='additional_variables'>";
    
    foreach ($additional as $name) {
        $name_no_spaces = str_replace(' ', '_', $name);
        echo "<div hidden='true' id=" . htmlspecialchars($name_no_spaces) . " class='additional_variable' data-name="  . htmlspecialchars($name) . "><li>" . htmlspecialchars($name) . "</li></div>";
    }

    echo "</ul>";

    echo "</div>";

    echo "</div>";

}
?>