const dropZone = document.getElementById('drop_zone');
const csvFile = document.getElementById('csv_file');

// wWhen mouse drags something into drop zone,activate css hover class
dropZone.addEventListener('dragover', (event) => {
    event.preventDefault();
    dropZone.classList.add('hover');
})

// when mouse leaves hover zone, deactivate hover class
dropZone.addEventListener('dragleave', (event) =>{
    dropZone.classList.remove('hover');
})