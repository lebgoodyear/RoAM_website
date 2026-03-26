<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset = "UTF-8">
    <title>Tutorial</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="icon" type="image/png" href="./favicon.png">
    <script src="contact.js" defer></script>
</head>

<body>

    <?php require './header.php'; ?>

    <div class="home_main">

    <div class="about">
        <p> 
            <strong>Contact</strong>
        </p>
        <p id = "description">
            If you have any queries about the RoAM framework or Online Tool, fill in the form below
        </p>
    </div>

    <div class="mainContact">
        <form id="contactForm">
            <p>
                <input type="text" placeholder="Enter your name" id="contactName" name="contactName" />
            </p>
            <p>
                <input type="email" placeholder="Enter your email" id="contactEmail" name="contactEmail"/>
            </p>
            <br>
            <div class="submitZone">
                <textarea id="contactMessage" name="contactMessage" rows="10" cols="60" placeholder="Write your message here..."></textarea>
                <br><br>
                <button id="submitButton">Send your message</button>
            </div>
        </form>
    </div>

    </div>

    <?php require './footer.php'; ?>

</body>