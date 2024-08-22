<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset = "UTF-8">
    <title>Upload csv</title>
    <link rel="stylesheet" href="../styles.css">
    <script src="upload_csv.js" defer></script>
</head>

<body>

    <?php require '../header.php'; ?>

    <div class = "main">

        <?php include 'tool_bar.php'; ?>

        <div id="drop_zone">
            <p id = "drag_drop">DRAG AND DROP A CSV FILE</p>
            <div id="instructions">
                <form action='csv_formatting.php' method="post" enctype="multipart/form-data">
                    <input type="file" name="csv_file" id="csv_file" required>
                    <button type="submit">Go</button>
                </form>
            </div>
        </div>
    </div>

    <?php require '../footer.php'; ?>

</body>