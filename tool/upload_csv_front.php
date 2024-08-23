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

    <div id="progress">
        
        <div id="back_button" hidden="true">
            <a href="./upload_csv_front.php"><button>Back</button></a>
        </div>

        <?php include 'tool_bar.php'; ?>

        <div id="next_button" hidden="true">
            <a href="./calculate_utility_front.php" id="go_to_utility"><button>Next</button></a>
        </div>

    </div>

    <div class = "main">

        <div id="drop_zone">
            <div id = "drag_drop">
                <p>DRAG AND DROP A CSV FILE</p>
            </div>    
            <div id="instructions">
                <form action='upload_csv_back.php' method="post" enctype="multipart/form-data">
                    <input type="file" name="csv_file" id="csv_file" required>
                    <button type="submit">Go</button>
                </form>
            </div>
        </div>
    </div>

    <?php require '../footer.php'; ?>

</body>