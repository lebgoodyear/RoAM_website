<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset = "UTF-8">
    <title>Select criteria</title>
    <link rel="stylesheet" href="../styles.css">
    <script src="select_criteria.js" defer></script>
</head>

<body>

    <?php require '../header.php'; ?>

    <div class = "main">

        <?php include 'tool_bar.php'; ?>

        <div id="nav_buttons">
            <div id="back_button">
                <a href="./upload_csv_front.php"><button>Back</button></a>
            </div>
            <div id="next_button">
                <a href="./calculate_utility_front.php" id="go_to_utility"><button>Next</button></a>
            </div>
        </div>

        <div id="content">
            <?php require 'select_criteria_back.php'; ?>

            <div class="drag_gap">
                <p>Choose criteria by dragging into the <strong>Critera</strong> column</p>
            </div>

            <div id="variable_drop">
                <div id="fundamental_drop">
                    <p class="variables">Fundamental criteria</p>
                    <ul id="fundamental"></ul>
                </div>
                <div id="additional_drop">
                    <p class="variables">Additional criteria</p>
                    <ul id="additional"></ul>
                </div>
            </div>
        </div>

    </div>

    <?php require '../footer.php'; ?>

</body>