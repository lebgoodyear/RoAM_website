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

additionalCriteriaLabels.forEach(criterion => {
    const labelElement = document.createElement("label");
    labelElement.textContent = criterion;

    const inputSlider = document.createElement("input");
    inputSlider.classList.add(criterion);
    inputSlider.classList.add("slider");
    inputSlider.id = "s_" + criterion;
    inputSlider.type = "range";
    inputSlider.min = 0;
    inputSlider.max = 1;
    inputSlider.value = 0;
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
    inputNumberTextBox.value = 0;
    inputNumberTextBox.step = 0.05;
    inputNumberTextBox.addEventListener("input", function() {updateSlider(criterion)});
    inputNumberTextBox.addEventListener("input", function() {updateSumCheckbox()});

    addWeightsForm.appendChild(labelElement);
    addWeightsForm.appendChild(inputSlider);
    addWeightsForm.appendChild(inputNumberTextBox);
    addWeightsForm.appendChild(document.createElement("br")); // Add a line break for spacing
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


const sumCheckbox = document.getElementById('sum');

const calculateButton = document.getElementById('calculate');

const sumContent = sumCheckbox.appendChild(document.createElement("p"));
sumContent.textContent = 0;

let additionalWeights = [];
let weightsArray = [];
let jsonWeightsArray = JSON.stringify([])
calculateButton.addEventListener("click", (event) => {
    if (sumContent.textContent !== "1") {
        window.alert("Weights must sum up to 1");
    } else {
        window.alert("Let's go!");
        additionalWeights = [];
        for (let i = 0; i < weightInputs.length; i++) {
            additionalWeights[i] = weightInputs[i].valueAsNumber;
        };
        weightsArray = [additionalCriteriaLabels, additionalWeights];
        jsonWeightsArray = JSON.stringify(weightsArray);
        document.getElementById("selected_criteria_array").value = jsonWeightsArray;
        document.getElementById("store_weights").submit();
    }
});