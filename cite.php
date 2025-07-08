<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset = "UTF-8">
    <title>Cite</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="icon" type="image/png" href="./favicon.png">
</head>

<body>

    <?php require './header.php'; ?>

    <div class="home_main">

        <div class="about">
            <p> 
                <strong>Reference</strong>
            </p>
            <p id = "description">
                How to cite this work
            </p>
        </div>

        <div class="reference">


            <div class="link">
                <h2>Our paper is available as a preprint on arXiv <a class="paperLink" href="https://arxiv.org/abs/2507.01526">here</a></h2> 
            </div>

            <div class="citeMain">

            <div class="paper">
                <a href="https://arxiv.org/abs/2507.01526"><img class="screenshot" src="img/arxiv.png" alt="Screenshot of online article with abstract"></img></a>
            </div>

            <div class="cite">

                <div class="textCitation">
                <p class="citeHeader">Plain text citation</p>
                <p>Goodyear LEB, Pincheira-Donoso D. Root/Additional Metric (RoAM) workflow: a guide for goal-centred metric construction. arXiv [Preprint]. 2025. doi: 10.48550/arXiv.2507.01526
                </p>
                </div>
                
                <div class="bibtex">
                    <p class="citeHeader">BibTex citation</p>
<pre><code>
@article{goodyear2025roam,
    title={Root/Additional Metric (RoAM) framework: a guide for goal-centred metric construction},
    author={Luke E. B. Goodyear and Daniel Pincheira-Donoso},
    journal={arXiv preprint arXiv:2507.01526},
    year={2025},
    url={https://arxiv.org/abs/2507.01526}
}
</code></pre>
                </div>
            </div>
            </div>

        </div>


    </div>

    <?php require './footer.php'; ?>

</body>