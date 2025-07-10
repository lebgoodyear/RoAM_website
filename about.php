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
                        <p> The RoAM framework is used to to measure success against 
                            a particular goal and compare across different ways of 
                            achieving that goal to see which performs best.
                            It is a custom-built indicator constructed following a particular 
                            structural framework. It can be used
                            in any field that requires comparisons of goal achievement across 
                            heterogenous datasets.
                        </p>
                        </p>
                    </div>
                </div>
                <div class="QA">
                    <div class="questionbox">
                        <h2>How does it work?</h2>
                    </div>
                    <div class="textbox">
                        <p>RoAM stands for Root/Additional Metric. A RoAM is constructed
                            by choosing criteria that you think are an important part of 
                            achieving your goal. These criteria are split into 'root', which
                            are criteria that result in complete failure if they are not met,
                            and 'additional' which are extra criteria that scale the metric
                            but do not result in failure if they are not met.
                        </p>
                    </div>
                </div>
                <div class="QA">
                    <div class="questionbox">
                        <h2>When is it useful?</h2>
                    </div>
                    <div class="textbox">
                        <p>The RoAM framework is useful for situations when you want to:</p>
                        <ul>
                            <li>Create a custom metric but don't know where to start
                            </li>
                            <li>Encompass many criteria
                                with differing importance
                            </li>
                            <li>Compare across aggragate datasets and don't 
                                have access to the original datasets
                            </li>        
                             <li>Compare goal achievement across 
                                highly heterogenous datasets
                            </li>        
                        </ul>
                    </div>
                </div>
            </div>

            <div class="aboutButtons">
                <div class="buttonSet">
                    <a href="https://arxiv.org/abs/2507.01526">
                        <button>
                            For more information
                            <div class="link">read our paper on arXiv</div>
                        </button>
                    </a>
                </div>
            
                <div class="buttonSet">
                    <a href = '/tutorial.php'>
                        <button>
                            To get started
                            <div class="link">check out our tutorial</div>
                        </button>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <?php require './footer.php'; ?>

</body>