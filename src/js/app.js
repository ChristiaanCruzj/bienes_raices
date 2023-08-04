//cuando el documento este listo se van a ejecutar estas funciones
document.addEventListener('DOMContentLoaded', function() {

    addEventListener();

    darkMode();
});
//funcion de darkMode
function darkMode() {
    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener(click, function () {

    });
}

function addEventListener() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive) //pude hacer ahi mismo mi funcion pero decidi sacarla como ejemplo
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');
    // if(navegacion.classList.contains('mostrar')) {
    //     navegacion.classList.remove('mostrar');
    // } else {
    //     navegacion.classList.add('mostrar');
    // }
    navegacion.classList.toggle('mostrar');
}