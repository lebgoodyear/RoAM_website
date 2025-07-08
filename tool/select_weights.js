// TOOL BAR

// Add css into tool progress bar to show which stage we are at
const addCSS = css => document.head.appendChild(document.createElement("style")).innerHTML=css;
addCSS("#upload, #criteria {background-image: repeating-linear-gradient(25deg, var(--midgrey) 0 1.5rem, var(--darkgrey) 1.5rem 2rem);}")
addCSS("#metric {background-image: repeating-linear-gradient(25deg, var(--lightgrey) 0 1.5rem, var(--darkgrey) 1.5rem 2rem);}")  
addCSS("#tool_bar_list #metric p {background: var(--lightgrey)};") 

// Funcion to extract css variables
const getCSSVar = (varName) => {
    return getComputedStyle(document.documentElement).getPropertyValue(varName).trim();
};

// Helper function to convert hex to rgba
function hexToRGBA(hex, alpha = 1) {
    const r = parseInt(hex.slice(1, 3), 16);
    const g = parseInt(hex.slice(3, 5), 16);
    const b = parseInt(hex.slice(5, 7), 16);
    return `rgba(${r}, ${g}, ${b}, ${alpha})`;
}


// GENERATE FORM FOR WEIGHTS

const rootArray = Array.from(document.getElementsByClassName('root_variable'));

const rootCriteriaLabels = [];
rootArray.forEach(criterion => {
    rootCriteriaLabels.push(criterion.id);
})

const additionalArray = Array.from(document.getElementsByClassName('additional_variable'));

const additionalCriteriaLabels = [];
additionalArray.forEach(criterion => {
    additionalCriteriaLabels.push(criterion.id);
})

const addWeightsForm = document.getElementById("add_weights");

function updateTextBox(criterion) {
    let slider = document.getElementById("s_" + criterion);
    let textBox = document.getElementById("ntb_" + criterion);
    textBox.value = slider.value;
}

function updateSlider(criterion) {
    let slider = document.getElementById("s_" + criterion);
    let textBox = document.getElementById("ntb_" + criterion);
    slider.value = textBox.value;
}

// Reset button
const resetButton = document.getElementById('reset');

additionalCriteriaLabels.forEach(criterion => {

    // Create a container div for each variable
    const containerDiv = document.createElement("div");
    containerDiv.classList.add("weight-container");
  
    // Create and set up the label
    const labelElement = document.createElement("label");
    labelElement.textContent = criterion;
    labelElement.classList.add("weight-label");
  
    // Create a div to contain the slider and text box (for layout)
    const controlsDiv = document.createElement("div");
    controlsDiv.classList.add("weight-controls");

    const inputSlider = document.createElement("input");
    inputSlider.classList.add(criterion);
    inputSlider.classList.add("slider");
    inputSlider.id = "s_" + criterion;
    inputSlider.type = "range";
    inputSlider.min = 0;
    inputSlider.max = 1;
    inputSlider.value = 1/additionalCriteriaLabels.length;
    inputSlider.step = 0.05;
    inputSlider.addEventListener("input", function() {updateTextBox(criterion)});
    inputSlider.addEventListener("input", function() {updateSumCheckbox()});

    const inputNumberTextBox = document.createElement("input");
    inputNumberTextBox.classList.add(criterion);
    inputNumberTextBox.classList.add("number_text_box");
    inputNumberTextBox.id = "ntb_" + criterion;
    inputNumberTextBox.type = "number";
    inputNumberTextBox.min = 0;
    inputNumberTextBox.max = 1;
    inputNumberTextBox.value = 1/additionalCriteriaLabels.length;
    inputNumberTextBox.step = 0.05;
    inputNumberTextBox.addEventListener("input", function() {updateSlider(criterion)});
    inputNumberTextBox.addEventListener("input", function() {updateSumCheckbox()});

    resetButton.addEventListener("click", function() {
        inputNumberTextBox.value = 1/additionalCriteriaLabels.length;
        updateSlider(criterion);
        updateSumCheckbox();
    });

    // Append elements to the container
    containerDiv.appendChild(labelElement);
    controlsDiv.appendChild(inputSlider);
    controlsDiv.appendChild(inputNumberTextBox);
    containerDiv.appendChild(controlsDiv);
  
    // Add the container to the form
    addWeightsForm.appendChild(containerDiv);

    updateSlider(criterion) // Make sure slider is correct
});



// GENERATE SUM CHECK BOX FOR WEIGHTS

const weightInputs = document.getElementsByClassName("number_text_box");

function updateSumCheckbox() {
    let sum = 0;

    for (let i = 0; i < weightInputs.length; i++) {
        sum += parseFloat(weightInputs[i].value);
    };

    sumContent.textContent = sum;
};



// CONSTRUCT METRIC

const sumCheckbox = document.getElementById('sum');

const sumContent = sumCheckbox.appendChild(document.createElement("p"));
sumContent.textContent = 1;

let additionalWeights = [];
let weightsArray = [];
let jsonWeightsArray = JSON.stringify([])

const calculateButton = document.getElementById("calculate_metric");

// Global declarations
let metricValues = [];
let bins = [];
let binLabels = [];
let histogramChart = null;

// Initialize an empty chart
function initializeEmptyChart() {

    const ctx = document.getElementById('histogramChart').getContext('2d');

    histogramChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['0-0.1', '0.1-0.2', '0.2-0.3', '0.3-0.4', '0.4-0.5', '0.5-0.6', '0.6-0.7', '0.7-0.8', '0.8-0.9', '0.9-1.0'],
            datasets: [{
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                backgroundColor: hexToRGBA(getCSSVar('--midblue'), 0.6),
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                display: false,
                },
                legend: {
                display: false
                },
                tooltip: {
                    callbacks: {
                        title: function(context) {
                            return context[0].label;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Frequency'
                    }
                },
                x: {
                    type: 'category',
                    title: {
                        display: true,
                        text: 'Metric'
                    },
                },
            },
        },
    });
};

calculateButton.addEventListener("click", (event) => {
    // Prevent default form behaviour
    event.preventDefault();

    if (sumContent.textContent !== "1") {
        window.alert("Weights must sum up to 1");
    } else {
        additionalWeights = [];
        for (let i = 0; i < weightInputs.length; i++) {
            additionalWeights[i] = weightInputs[i].valueAsNumber;
        };
        weightsArray = [additionalCriteriaLabels, additionalWeights];
        jsonWeightsArray = JSON.stringify(weightsArray);

        // Fetch API
        fetch("calculate_metric_back.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: "jsonWeightsArray=" + encodeURIComponent(jsonWeightsArray)
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById("results_container").innerHTML = data;
            // Load metric values as js variable
            metricValues = JSON.parse(document.getElementById("metric_array").textContent);

           /// Function to update histogram data
        function updateHistogram(data) {
            // Initialize bins (10 bins for ranges 0-0.1, 0.1-0.2, ..., 0.9-1.0)
            const bins = Array(10).fill(0);
            
            // Fill bins
            data.forEach(val => {
            // Handle edge case for maximum value
            if (val === 1) {
                bins[9]++;
            } else {
                const binIndex = Math.floor(val * 10);
                bins[binIndex]++;
            }
            });
            
            // Update chart data
            histogramChart.data.datasets[0].data = bins;
            histogramChart.update();
        }

        updateHistogram(metricValues)

        })
        .catch(error => {
            console.error("Error:", error);
        });
    }
});  

document.addEventListener('DOMContentLoaded', initializeEmptyChart);


document.getElementById('next_button').addEventListener('click', event => {
    event.preventDefault();
    
    // Redirect to the CSV generation script
    window.location.href = 'generate_csv_back.php';
});

