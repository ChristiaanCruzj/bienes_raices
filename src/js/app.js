document.addEventListener('DOMContentLoaded', function() {

    addEventListener();
});

function addEventListener() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive)
}

function navegacionResponsive() {
    console.log('desde navegacionResponsive');
}