// TOOL BAR

// Add css into tool progress bar to show which stage we are at
const addCSS = css => document.head.appendChild(document.createElement("style")).innerHTML=css;
addCSS("#upload, #criteria {background-image: repeating-linear-gradient(25deg, var(--midgrey) 0 1.5rem, var(--darkgrey) 1.5rem 2rem);}")
addCSS("#utility {background-image: repeating-linear-gradient(25deg, var(--lightgrey) 0 1.5rem, var(--darkgrey) 1.5rem 2rem);}")  
addCSS("#tool_bar_list #utility p {background: var(--lightgrey)};") 



// GENERATE FORM FOR WEIGHTS

const fundamentalArray = Array.from(document.getElementsByClassName('fundamental_variable'));

const fundamentalCriteriaLabels = [];
fundamentalArray.forEach(criterion => {
    fundamentalCriteriaLabels.push(criterion.id);
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



// CALCULATE UTILITIES

const sumCheckbox = document.getElementById('sum');

const sumContent = sumCheckbox.appendChild(document.createElement("p"));
sumContent.textContent = 1;

let additionalWeights = [];
let weightsArray = [];
let jsonWeightsArray = JSON.stringify([])

const calculateButton = document.getElementById("calculate_utility");

// Global declarations
let utilities = [];
let bins = [];
let binLabels = [];
let histogramChart = null;

// Initialize an empty chart
function initializeEmptyChart() {
  const ctx = document.getElementById('histogramChart').getContext('2d');
  histogramChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [],
      datasets: [{
        label: 'Frequency',
        data: [],
        backgroundColor: 'rgba(54, 162, 235, 0.6)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: 'Data Histogram'
        },
        legend: {
          display: false
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
          title: {
            display: true,
            text: 'Value Ranges'
          }
        }
      }
    }
  });
}

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
        fetch("calculate_utility_back.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: "jsonWeightsArray=" + encodeURIComponent(jsonWeightsArray)
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById("results_container").innerHTML = data;
            // Load utilities as js variable
            utilities = JSON.parse(document.getElementById("utility_array").textContent);

            // Calculate histogram data
            function generateHistogramData(data, binCount = 8) {
                // Find min and max values
                const min = Math.min(...data);
                const max = Math.max(...data);

                // Calculate bin width
                const binWidth = (max - min) / binCount;

                // Initialize bins
                const bins = Array(binCount).fill(0);
                const binLabels = [];

                // Create bin labels
                for (let i = 0; i < binCount; i++) {
                    const binStart = min + i * binWidth;
                    const binEnd = binStart + binWidth;
                    binLabels.push(`${binStart.toFixed(1)}-${binEnd.toFixed(1)}`);
                }

                // Fill bins
                data.forEach(val => {
                    // Handle edge case for maximum value
                    if (val === max) {
                    bins[binCount - 1]++;
                    } else {
                    const binIndex = Math.floor((val - min) / binWidth);
                    bins[binIndex]++;
                    }
                });

                return { bins, binLabels };
            };

            const histogramData = generateHistogramData(utilities);
  
            // Update the global variables
            bins = histogramData.bins;
            binLabels = histogramData.binLabels;
            
            // Update the chart with new data
            histogramChart.data.labels = binLabels;
            histogramChart.data.datasets[0].data = bins;
            histogramChart.update();

        })
        .catch(error => {
            console.error("Error:", error);
        });
    }
});  

document.addEventListener('DOMContentLoaded', initializeEmptyChart);



