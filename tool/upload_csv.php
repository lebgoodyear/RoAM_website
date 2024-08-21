<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset = "UTF-8">
    <title>Upload csv</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>

    <?php require '../header.php'; ?>

    <div class = "main">

        <?php include 'tool_bar.php'; ?>

        <div id="drop_zone">
            <p id = "drag_drop">DRAG AND DROP A CSV FILE</p>
            <div id="instructions">
                <form method="post" enctype="multipart/form-data">
                    <input type="file" name="csv_file" required>
                    <button type="submit">Go</button>
                </form>
            </div>
        </div>
    </div>

    <?php require 'csv_formatting.php'; ?>

    <?php require '../footer.php'; ?>

</body>