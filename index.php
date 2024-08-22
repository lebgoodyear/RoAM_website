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
            <!--<strong>Welcome to the online DARe tool</strong>-->
            <p> 
                <strong>Decision Analysis Refinement (DARe)</strong>
            </p>
            <p id = "description">
                A framework for transparent quantative meta-analyses
            </p>
        </div>
        <div class="options">
            <div class="new shortcut">
                <p>New here?</p>
                <button>Explore DARe</button>
            </div>
            <div class="returning shortcut">
                <p>Old hat?</p>
                <a href="/tool/upload_csv.php">
                    <button>Get started</button>
                </a>
            </div>
        </div>
    </div>

    <?php require 'footer.php'; ?>

</body>

</html>