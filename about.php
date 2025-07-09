<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset = "UTF-8">
    <title>About</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="icon" type="image/png" href="./favicon.png">
</head>

<body>

    <?php require './header.php'; ?>

    <div class="home_main">

        <div class="about">
            <p> 
                <strong>An introduction to the RoAM framework</strong>
            </p>
            <p id = "description">
                Is this the tool for you?
            </p>
        </div>

        <div class="mainAbout">

            <div class="mainQA">
                <div class="QA">
                    <div class="questionbox">
                        <h2>What is it for?</h2>
                    </div>
                    <div class="textbox">
                        <p>We frequently want to measure success against a particular goal.
                            The RoAM framework enables tailor-made metrics to measure 
                            goal achievement across different options.
                        </p>
                    </div>
                </div>
                <div class="QA">
                    <div class="questionbox">
                        <h2>What actually is it?</h2>
                    </div>
                    <div class="textbox">
                        <p>RoAM stands for Root/Additional Metric and is a custom-built indicator
                            constructed following a particular structural framework. It can be used
                            in any field that requires comparisons of goal achievement across 
                            heterogenous datasets.
                        </p>
                    </div>
                </div>
                <div class="QA">
                    <div class="questionbox">
                        <h2>When is it useful?</h2>
                    </div>
                    <div class="textbox">
                        <ul>
                            <li>You want to include factors outside of effectiveness, such as cost</li>
                            <li>You want to compare across aggragate datasets</li>        
                        </ul>
                    </div>
                </div>
            </div>

            <div class="aboutButtons">
                <div class="buttonSet">
                    <div class="arrows">
                        <img class="indicatorArrow" src="/img/arrow.png">
                        <img class="indicatorArrow" src="/img/arrow.png">
                        <img class="indicatorArrow" src="/img/arrow.png">
                    </div>
                    <a href="https://arxiv.org/abs/2507.01526">
                        <button>Click here to read our paper on arXiv</button>
                    </a>
                </div>
            
                <div class="buttonSet">
                    <div class="arrows">
                        <img class="indicatorArrow" src="/img/arrow.png">
                        <img class="indicatorArrow" src="/img/arrow.png">
                        <img class="indicatorArrow" src="/img/arrow.png">
                    </div>
                    <button>Click here to see the framework in action</button>
                </div>
            </div>
        </div>

    </div>

    <?php require './footer.php'; ?>

</body>