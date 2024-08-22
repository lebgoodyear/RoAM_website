// Get references to my draggable elements and the droppable area
const draggableElements = Array.from(document.getElementsByClassName('draggable_variables'));
const droppableArea = document.getElementById('variable_drop');

// Set up event handler for when dropping starts
draggableElements.forEach(element => {
    element.addEventListener('dragstart', (event) => {
    // Set the data that will be dragged
    event.dataTransfer.setData('text/plain', event.target.id);
    })
});

// Set up event handler for when dropping occurs
droppableArea.addEventListener('drop', (event) => {
    // Prevent default behaviour or dropping can't take place
    event.preventDefault();

    // Get the data from the drag event above
    const data = event.dataTransfer.getData('text/plain');

    // Based on the data, find the draggable element
    const draggableElement = document.getElementById(data);

    // Put the draggable element into the droppable area
    event.target.appendChild(draggableElement);
});

// Event handler for when a draggable element is being dragged over the droppable area
droppableArea.addEventListener('dragover', (event) => {
    if ((event.target.tagName.toLowerCase() == 'ul') ||
        (event.target.id.toLowerCase() == 'fundamental') ||
        (event.target.id.toLowerCase() == 'additional')) {
    // Prevent the default behavior to allow dropping
        event.preventDefault();
    }
});