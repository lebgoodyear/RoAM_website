<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset = "UTF-8">
    <title>Select criteria</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="icon" type="image/png" href="../favicon.png">
    <script src="select_criteria.js" defer></script>
</head>

<body>

    <?php require '../header.php'; ?>

    <div id="progress">
        <div id="back_button">
            <a href="./upload_csv_front.php"><button>Back</button></a>
        </div>

        <?php include 'tool_bar.php'; ?>

        <div id="next_button">
            <form id="store_criteria" action="store_criteria_back.php" method="post">
                <input type="hidden" id="selected_criteria_array" name="jsonCriteriaArray">
                <button type="submit" id="go_to_weights">Next</button>
            </form>

            <!--<a href="./calculate_metric_front.php" id="go_to_metric"><button>Next</button></a>-->
        </div>

    </div>

    <div class = "main">

        <div id="content">
            <?php require 'select_criteria_back.php'; ?>

            <div class="drag_gap">
                <p>Choose criteria by dragging into one of the <strong>Criteria</strong> columns</p>
            </div>

            <div id="variable_drop">
                <div id="root_drop">
                    <p class="variables criteria">ROOT CRITERIA</p>
                    <ul id="root"></ul>
                </div>
                <div id="additional_drop">
                    <p class="variables criteria">ADDITIONAL CRITERIA</p>
                    <ul id="additional"></ul>
                </div>
            </div>
        </div>

    </div>

    <?php require '../footer.php'; ?>

</body>