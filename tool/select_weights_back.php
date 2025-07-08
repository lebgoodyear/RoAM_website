<?php

session_start();

if (isset($_SESSION['jsonCriteriaArray'])) {
    $jsonCriteriaArray = $_SESSION['jsonCriteriaArray'];

    $criteriaArray = json_decode($jsonCriteriaArray, true);

    $root = $criteriaArray[0];

    $additional = $criteriaArray[1];

    echo "<div id='criterion_selection'>";

    echo "<div class='final_criteria_root'>";

    echo "<p>ROOT CRITERIA</p>";

    echo "<ul id='root_variables'>";
    
    foreach ($root as $name) {
        $name_no_spaces = str_replace(' ', '_', $name);
        echo "<div id=" . htmlspecialchars($name_no_spaces) . " class='root_variable' data-name="  . htmlspecialchars($name) . "><li>" . htmlspecialchars($name) . "</li></div>";
    }

    echo "</ul>";

    echo "</div>";

    echo "<div class='final_criteria_additional'>";

    echo "<p>ADDITIONAL CRITERIA</p>";

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