<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset = "UTF-8">
    <title>Tutorial</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="icon" type="image/png" href="./favicon.png">
</head>

<body>

    <?php require './header.php'; ?>

    <div class="home_main">

        <div class="about">
            <p> 
                <strong>Tutorial</strong>
            </p>
            <p id = "description">
                A hypothetical worked example showing how to use the RoAM Online Tool
            </p>
        </div>

        <div class="mainTutorial">

            <div class="egIntro">

                <div class="egIntroText">
                    <h2>Imagine the following scenario...</h2>
                    You are in charge of conservation in your local area. 
                    You have some funding to implement some measures to
                    conserve and promote biodiversity and have a choice of intervention programmes, such as connecting corridors (connections between habitat parts that have been partitioned as a result of industrial activity, such as creation of roads) or creation of protected areas. Since you have a limited budget, you want to know which intervention to choose that will make the biggest impact for the lowest cost.
                </div>

                <div class="egIntroImage"><img src="/img/village.png"></div>

            <!--<img class="workflow" src="img/workflow.png">-->
            </div>

            <div class="egStepTitle">STEP 1</div>
            
            <div class="egStep">
                <div class="egStepText">
                    <h2>Upload dataset</h2>
                    <p>Upload your dataset to the platform, either by dragging and dropping or browsing your files. Make sure all your data fields have clear column headings and any fields you want to choose as criteria are scaled between 0 and 1 if they are numerical.
                    </p>
                </div>
                <div class="egStepImage">
                    <img src="img/step1a.png">
                    <img class="arrow" src="img/arrow.png">
                    <img src="img/step1b.png">
                </div>
            </div>

            <div class="egStepTitle">STEP 2</div>

            <div class="egStep">
                <div class="egStepText">
                    <h2>Select criteria</h2>
                    <p>You need to choose which criteria you think contribute to a successful intervention. Some of these will be <strong>Root</strong> criteria, which are those you want to be the core components of your metric. A zero for any of these criteria will necessarily result in a value of zero for your metric. The rest will be <strong>Additional</strong> criteria, which scale the metric value but can never reduce it to zero.</p>
                    <p>(1) <strong>EffectivenessScaled</strong>. Our effectiveness scores scaled to between zero and one. This is the most important as it is a direct measure of how well an intervention worked. This will be a Root criterion.
                    </p>
                    <p>(2) <strong>CostScaled</strong>. Our intervention costs scaled to between zero and one. This encapsulates our budget constraints and penalises interventions that are very expensive. We could set this as a Root criterion with a hard budget cap, but we will choose to set it as an Additional criterion to separate true intervention failure from financial constraints.
                    </p>
                    <p>(3) <strong>Politics</strong>. This can feed into costs and is representative of the difficulties in administration and red tape requirements. This is an Additional criterion.
                    </p>
                </div>
                <div class="egStepImage">
                    <img src="img/step2a.png">
                    <img class="arrow" src="img/arrow.png">
                    <img src="img/step2b.png">
                </div>
            </div>

            <div class="egStepTitle">STEP 3</div>

            <div class="egStepText">
                <h2>Define criteria weighting</h2>
                <p>You need to choose weights for Additional criteria.</p>
                <p>Which criteria are most important to you and should have more
                    influence over the final metric values? Change individual weights for each Additional criterion, as well as the baseline value (this reflects the maximum metric value achievable if none of the Additional criteria are met), using the sliders or by directly typing the weights into the text boxes. All weights should sum to one, which can be checked in real-time using the checksum at the bottom. The plot on the left shows the distribution of metric values with your chosen weights.  
                </p>
                <p>When you are happy, click 'Finish' to download the csv file of your original data with an additional column containing your calculated values scores.
            </div>
            <div class="egStepFinal">
                <img src="img/step3.png">
            </div>
        </div>

 

    <?php require './footer.php'; ?>

</body>