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

        //Para que el modo elegido se quede guardado en local-storage
        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('modo-oscuro','true');   //Creo un nombre cualquiera(modo-oscuro) y le asigno un valor para que se guarde (true). Verificar en el almacenamiento del site
        } else {
            localStorage.setItem('modo-oscuro','false');
        }
    });

    //Obtenemos el modo del color actual en el cual nos encontramos
    if (localStorage.getItem('modo-oscuro') === 'true') {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
}