<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset = "UTF-8">
    <title>Calculate success</title>
    <link rel="stylesheet" href="../styles.css">
    <script src="calculate_utility.js" defer></script>
</head>

<body>

    <?php require '../header.php'; ?>

    <div id="progress">
        <div id="back_button">
            <a href="./select_criteria_front.php"><button>Back</button></a>
        </div>

        <?php include 'tool_bar.php'; ?>

        <div id="next_button">
            <button>Finish</button>
        </div>

    </div>


    <div class = "main" id="main_utility">

        <div id="work_space">

            <?php require 'calculate_utility_back.php'; ?>

            <div id="user_inputs">

                <div id="weights">
                    <p>Weights</p>

                    <form id="add_weights">
                    </form> 

                </div>

                <div id="sumbox">
                    <p>Checksum</p>
                    <div id="sum">

                    </div>
                </div>

                <button id="calculate">Calculate</button>
            </div>

        </div>

        <div id="plot_space">
            <p>Utility distribution</p>
        </div>

    </div>

    <?php require '../footer.php'; ?>

</body>