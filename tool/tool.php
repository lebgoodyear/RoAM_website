<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset = "UTF-8">
    <title>Online Tool</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>

    <?php require '../header.php'; ?>

    <div class = "main">
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="csv_file">
            <button type="submit">Go</button>
        </form>

    </div>

    <?php require '../footer.php'; ?>

</body>