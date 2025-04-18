<?php

session_start();

//if (isset($_SESSION['jsonWeightsArray'])) {

    $jsonWeightsArray = $_POST["jsonWeightsArray"];

    // Get weights
    //$jsonWeightsArray = $_SESSION['jsonWeightsArray'];
    $weightsArray = json_decode($jsonWeightsArray, true);
    $betas = $weightsArray[1];


    // Get data
    $data = $_SESSION['csv_data'];
    $headers = $_SESSION['headers'];


    // Get criteria
    $jsonCriteriaArray = $_SESSION['jsonCriteriaArray'];
    $criteriaArray = json_decode($jsonCriteriaArray, true);
    $fundamental_columns = $criteriaArray[0];
    $additional_columns = $criteriaArray[1];


    // UTILITY CALCULATION

    function calc_utility($fundamental_vars = [], $additional_vars = [], $betas = []) {
        // Multiply all fundamental variables together
        $fvars_prod = 1;
        foreach ($fundamental_vars as $var) {
            $fvars_prod *= $var;
        };
        
        // Multiply all additional variables by their corresponding weights, adding
        // an extra variable at the end for the baseline beta
        $avars_weighted = [];
        for ($i = 0; $i < count($additional_vars); $i++) {
            $avars_weighted[] = $additional_vars[$i] * $betas[$i];
        };
        // Add baseline beta (last element of betas)
        //$avars_weighted[] = 1 * $betas[count($betas) - 1];
        
        // Sum all weighted additional variables
        $avars_weighted_sum = array_sum($avars_weighted);
        
        // Calculate utility
        // Formula to calculate utility from fundamental and weighted additional variables
        $utility = $fvars_prod * $avars_weighted_sum;
        
        return $utility;
    };


    // Extract column data using array_column()
    // For fundamental variables
    $fundamental_data = [];
    foreach ($fundamental_columns as $col) {
        $fundamental_data[$col] = array_column($data, $col);
        // Convert to float
        $fundamental_data[$col] = array_map('floatval', $fundamental_data[$col]);
    };

    // For additional variables
    $additional_data = [];
    foreach ($additional_columns as $col) {
        if ($col === 'Baseline') {
            // Fill with 1s - create an array with the same number of elements as rows in data
            $additional_data[$col] = array_fill(0, count($data), 1.0);
        } else {
            $additional_data[$col] = array_column($data, $col);
            // Convert to float
            $additional_data[$col] = array_map('floatval', $additional_data[$col]);
        }
    }


    // Perform calculations for each row
    for ($i = 0; $i < count($data); $i++) {
        // Prepare fundamental variables for this row
        $fundamental_vars = [];
        foreach ($fundamental_columns as $col) {
            $fundamental_vars[] = $fundamental_data[$col][$i];
        };
        
        // Prepare additional variables for this row
        $additional_vars = [];
        foreach ($additional_columns as $col) {
            $additional_vars[] = $additional_data[$col][$i];
        };
        
        // First calculation - utility
        $data[$i]['utility'] = calc_utility($fundamental_vars, $additional_vars, $betas);
        
        // Second calculation
        //$data[$i]['calculation2'] = /* your second calculation logic */;
        
        // Third calculation
        //$data[$i]['calculation3'] = /* your third calculation logic */;
        
        // Fourth calculation
        //$data[$i]['calculation4'] = /* your fourth calculation logic */;
    }

    // Extract utilities
    $utilities = array_column($data, 'utility');

    // Load utilities into html to pass to javascript
    echo "<div hidden='true'>";
    echo "<p id='utility_array'>";
    echo json_encode($utilities);
    echo "</p>";
    echo "</div>";

    $newHeaders = array_merge($headers, ['utility']);//, 'calculation2', 'calculation3', 'calculation4']);

    // Save to session for use in csv generation script
    $_SESSION['newData'] = $data;
    $_SESSION['newHeaders'] = $newHeaders;

//} else {echo "<p>not working</p>";}

?>