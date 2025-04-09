// TOOL BAR

// Add css into tool progress bar to show which stage we are at
const addCSS = css => document.head.appendChild(document.createElement("style")).innerHTML=css;
addCSS("#upload {background-image: repeating-linear-gradient(25deg, var(--midgrey) 0 1.5rem, var(--darkgrey) 1.5rem 2rem);}")
addCSS("#criteria {background-image: repeating-linear-gradient(25deg, var(--lightgrey) 0 1.5rem, var(--darkgrey) 1.5rem 2rem);}")  
addCSS("#tool_bar_list #criteria p {background: var(--lightgrey)};") 


// SET UP DRAG AND DROP

// Get references to my draggable elements and the droppable area
const draggableElements = Array.from(document.getElementsByClassName('draggable_variables'));
const droppableArea1 = document.getElementById('variable_drop');
const droppableArea2 = document.getElementById('column_names');
const appendableAreaFundamental = document.getElementById('fundamental')
const appendableAreaAdditional = document.getElementById('additional')

// Set up arrays to store fundamental and additional criteria
const fundamentalCriteria = []
const additionalCriteria = []

// Set up event handler for when dropping starts
draggableElements.forEach(element => {
    element.addEventListener('dragstart', (event) => {
    // Set the data that will be dragged
    event.dataTransfer.setData('text/plain', event.target.id);
    })
});

// Set up event handler for when dropping occurs into criteria drop zone
droppableArea1.addEventListener('drop', (event) => {
    // Prevent default behaviour or dropping can't take place
    event.preventDefault();

    // Get the data from the drag event above
    const data = event.dataTransfer.getData('text/plain');

    // Based on the data, find the draggable element
    const draggableElement = document.getElementById(data);

    // Find the target drop area and determine where to insert the element
    let targetContainer;
    if (event.target.id.toLowerCase() === 'fundamental') {
        targetContainer = appendableAreaFundamental;
        fundamentalCriteria.push(draggableElement.id);
    } else if (event.target.id.toLowerCase() === 'additional') {
        targetContainer = appendableAreaAdditional;
        additionalCriteria.push(draggableElement.id);
    } else if (event.target.closest('#fundamental')) {
        targetContainer = appendableAreaFundamental;
        fundamentalCriteria.push(draggableElement.id);
    } else if (event.target.closest('#additional')) {
        targetContainer = appendableAreaAdditional;
        additionalCriteria.push(draggableElement.id);
    }

    if (targetContainer) {
        // Find the closest element based on mouse position
        const mouseY = event.clientY;
        const children = Array.from(targetContainer.children);
        
        // Find the element to insert before
        let insertBeforeElement = null;
        
        for (const child of children) {
          const rect = child.getBoundingClientRect();
          const childMiddleY = rect.top + rect.height / 2;
          
          if (mouseY < childMiddleY) {
            insertBeforeElement = child;
            break;
          }
        }
        
        // Insert the dragged element at the appropriate position
        targetContainer.insertBefore(draggableElement, insertBeforeElement);
      }

    /*// if draggable element is moved to fundamental list, add to fundamental array
    if (event.target.id.toLowerCase() == 'fundamental') {
        fundamentalCriteria.push(draggableElement.id);
        // Put the draggable element into the droppable area
        appendableAreaFundamental.appendChild(draggableElement);
    }
   // if draggable element is moved to additional list, add to additional array
    if (event.target.id.toLowerCase() == 'additional') {
        additionalCriteria.push(draggableElement.id);
        // Put the draggable element into the droppable area
        appendableAreaAdditional.appendChild(draggableElement);
    }*/
});

// Set up event handler for when dropping occurs back into column name data zone
droppableArea2.addEventListener('drop', (event) => {
    // Prevent default behaviour or dropping can't take place
    event.preventDefault();

    // Get the data from the drag event above
    const data = event.dataTransfer.getData('text/plain');

    // Based on the data, find the draggable element
    const draggableElement = document.getElementById(data);

    /*// Put the draggable element into the droppable area
    event.target.appendChild(draggableElement);*/

    // Find proper container if dropping on a child element
    const container = event.target.tagName.toLowerCase() === 'ul' ? 
    event.target : event.target.closest('ul');

    if (container) {
        // Find the closest element based on mouse position
        const mouseY = event.clientY;
        const children = Array.from(container.children);
        
        // Find the element to insert before
        let insertBeforeElement = null;
        
        for (const child of children) {
            const rect = child.getBoundingClientRect();
            const childMiddleY = rect.top + rect.height / 2;
            
            if (mouseY < childMiddleY) {
            insertBeforeElement = child;
            break;
            }
        }
        
        // Insert the dragged element at the appropriate position
        container.insertBefore(draggableElement, insertBeforeElement);
    }

    // Remove element from its selected criteria array
    if (fundamentalCriteria.includes(draggableElement.id)) {
        const indexFundamental = fundamentalCriteria.indexOf(draggableElement.id);
        fundamentalCriteria.splice(indexFundamental, 1);
    }
    if (additionalCriteria.includes(draggableElement.id)) {
        const indexAdditional = additionalCriteria.indexOf(draggableElement.id);
        additionalCriteria.splice(indexAdditional, 1);
    }
});

// Event handler for when a draggable element is being dragged over the droppable area
droppableArea1.addEventListener('dragover', (event) => {
    if ((event.target.tagName.toLowerCase() === 'ul') ||
        (event.target.id.toLowerCase() === 'fundamental_drop') ||
        (event.target.id.toLowerCase() === 'fundamental') ||
        (event.target.id.toLowerCase() === 'additional_drop') ||
        (event.target.id.toLowerCase() === 'additional') ||
        event.target.closest('#fundamental') ||
        event.target.closest('#additional')) {
        // Prevent the default behavior to allow dropping
        event.preventDefault();
    }
});

// Event handler for when a draggable element is being dragged over the droppable area
droppableArea2.addEventListener('dragover', (event) => {
    if (event.target.tagName.toLowerCase() === 'ul' || event.target.closest('ul')) {
    // Prevent the default behavior to allow dropping
        event.preventDefault();
    }
});


// STORE ARRAYS

// Only store once the 'next' button is clicked
const nextButton = document.getElementById("go_to_weights");

// Store and send to html form for php processing
nextButton.addEventListener("click", (event) => {
    const criteriaArray = [fundamentalCriteria, additionalCriteria];
    const jsonCriteriaArray = JSON.stringify(criteriaArray);
    document.getElementById("selected_criteria_array").value = jsonCriteriaArray;
    document.getElementById("store_criteria").submit();
})
