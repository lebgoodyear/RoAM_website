// Add css into tool progress bar to show which stage we are at
const addCSS = css => document.head.appendChild(document.createElement("style")).innerHTML=css;
addCSS("#upload {background-image: repeating-linear-gradient(25deg, var(--lightgrey) 0 1.5rem, var(--darkgrey) 1.5rem 2rem);}") 

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