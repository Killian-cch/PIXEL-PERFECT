//Empeche le drag & drop des élements de la page (problématique pour dessiner)
const div = document.querySelector('div, form')
div.addEventListener('dragstart', (e) => {
    e.preventDefault()
})
div.addEventListener('drop', (e) => {
    e.preventDefault()
})



//Sélection de la couleur
var theInput = document.getElementById("inputcolor");
theColor = '#ffd700';
theInput.addEventListener("input", function(){
    theColor = theInput.value;
    document.getElementById('color').innerHTML = theColor;
}, false);



//Gestion des évenements de la souris
let mouseDown = false;
document.body.onmousedown = () => {
    mouseDown = true;
};
document.body.onmouseup = () => {
    mouseDown = false;
};
document.body.onmouseleave = () => {
    mouseDown = false;
};



//Au click
function colorier_onclick(pixel) {
    pixel.value = theColor;
    pixel.style.setProperty('background-color', theColor);
    couleur = document.getElementById('couleur' + pixel.getAttribute('data-place'));
    couleur.value = theColor;
}

//Au click glissé
function colorier_onmousedown(pixel) {
    if (mouseDown == true) {
        pixel.value = theColor;
        pixel.style.setProperty('background-color', theColor);
        couleur = document.getElementById('couleur' + pixel.getAttribute('data-place'));
        couleur.value = theColor;
    }
}