//cuando el documento este listo se van a ejecutar estas funciones
document.addEventListener('DOMContentLoaded', function() {

    addEventListener();

    darkMode();
});
//funcion de darkMode
function darkMode() {
    const prefiereDarkMode = window.matchMedia( '(prefers-color-scheme: dark)' ); // si el usuario tiene su tema amarillo en su equipo

    // console.groupCollapsed(prefiereDarkMode);

    if(prefiereDarkMode.matches) {  //change if this is true 
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
    //but if the user have in auto or change the theme in your advice then is this..
    prefiereDarkMode.addEventListener('change', function() {
        if(prefiereDarkMode.matches) {  //change if this is true 
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    })

    const botonDarkMode = document.querySelector('.dark-mode-boton'); //Waiting for a click 
    botonDarkMode.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode'); //agrega clase si no la tiene y lo contrario como en el if de abajo
    });
}
//finished dark mode
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