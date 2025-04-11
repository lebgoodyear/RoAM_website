<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset = "UTF-8">
    <title>Calculate Utility</title>
    <link rel="stylesheet" href="../styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="select_weights.js" defer></script>
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

            <?php require 'select_weights_back.php'; ?>

            <div id="user_inputs">

                <div id="weights">

                    <form id="add_weights">
                    </form> 

                </div>

                <div id="sumbox">
                    <p>Checksum</p>
                    <div id="sum">

                    </div>
                </div>

                <div id='weight_buttons'>
                    <div id="reset">
                        <button type="submit">Reset</button>
                    </div>

                    <div id="calculate_button">
                        <form id="store_weights" action="calculate_utility_back.php" method="post">
                            <input type="hidden" id="criteria_weights_array" name="jsonWeightsArray">
                            <button type="submit" id="calculate_utility">Calculate</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>

        <div id="plot_space">
            <div id="results_container"></div>
            <canvas id="histogramChart"></canvas>
        </div>

    </div>

    <?php require '../footer.php'; ?>

</body>