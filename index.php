<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset = "UTF-8">
    <title>Homepage</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php require 'header.php'; ?>

    <div class="home_main">
        <div class="about">
            <p> 
                <strong>Root/Additional Metric (RoAM)</strong>
            </p>
            <p id = "description">
                A framework for goal-centred metric construction
            </p>
        </div>
        <div class="options">
            <div class="new shortcut">
                <p>New here?</p>
                <button>Explore RoAM</button>
            </div>
            <div class="returning shortcut">
                <p>Old hat?</p>
                <a href="/tool/upload_csv_front.php">
                    <button>Get started</button>
                </a>
            </div>
        </div>
    </div>

    <?php require 'footer.php'; ?>

</body>

</html>
