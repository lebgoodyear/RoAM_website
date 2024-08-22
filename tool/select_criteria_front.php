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

        <div class="content">
            <?php require 'select_criteria_back.php'; ?>

            <div class="drag_gap">
                <p>Choose criteria by dragging into the <strong>Critera</strong> column</p>
            </div>

            <div id="variable_drop">
                <div id="fundamental">
                    <p class="variables">Fundamental criteria</p>
                    <ul></ul>
                </div>
                <div id="additional">
                    <p class="variables">Additional criteria</p>
                    <ul></ul>
                </div>
            </div>
        </div>

    </div>

    <?php require '../footer.php'; ?>

</body>