document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
    darkmode();
});

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');
   /* if (navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar');
    } else{
        navegacion.classList.add('mostrar');
    }
*/
    navegacion.classList.toggle('mostrar'); //Es lo mismo que arriba
}

function darkmode(){

        //Preferencias color sistema
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme-dark)');
    if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
        //Para que cambie el color del sitio automaticamente cuando cambia la preferencia de color de sistema
    prefiereDarkMode.addEventListener('change', function() {
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    //console.log(prefiereDarkMode.matches);
        //Boton DarkMode
    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode'); //Para que lo agregue en el body
    });
}