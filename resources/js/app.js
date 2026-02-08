import './bootstrap';


//FORMULARIO HOME//
document.addEventListener('DOMContentLoaded', function () {
    'use strict'

    // Seleccionamos TODOS los formularios que tengan la clase
    const formularios = document.querySelectorAll('.needs-validation')

    // Usamos un bucle para que cada formulario funcione por separado
    formularios.forEach(function (formulario) {
        formulario.addEventListener('submit', function (event) {
            
            // Antes de validar, limpiamos espacios SOLO al inicio y al final
            // Esto permite espacios entre palabras (como en los apellidos)
            const inputs = formulario.querySelectorAll('input');
            inputs.forEach(input => {
                input.value = input.value.trim(); //limpiamos los espacios
            });
//checkValidity "¿Cumplen todos los campos las reglas (required, pattern, type="email", etc.)?
            if (!formulario.checkValidity()) {
                event.preventDefault()//Si hay errores, la página se refresca,
            }

            formulario.classList.add('was-validated') //ya se han hecho las comprobaciones y los campos se pueden pintar de rojo o verde.
        }, false)
    })
})

// Función para validar la contraseña en tiempo real y a la vez validar confirmar contraseña para que 
//coincidan.
const passwordInput = document.querySelector('#inputPassword');
const confirmInput = document.querySelector('#inputPasswordConfirm');

function validarContraseñas() {
    //el mismo patron que tengo en el html
    const patron = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/;
    
    // 1. Validar la primera contraseña contra el patrón solo devuelve true o false, si el usurio escribe bien la contraseña a la primera,
    //no utiliza is-invalid y como no ha podido reemplazar nada, pasa a la siguiente parte || y aquí es donde da por buena la contraseña.
    if (patron.test(passwordInput.value)) {
        passwordInput.classList.replace('is-invalid', 'is-valid') || passwordInput.classList.add('is-valid');//is-valid: Pone el borde de la caja en verde.

    } else {
        passwordInput.classList.replace('is-valid', 'is-invalid') || passwordInput.classList.add('is-invalid');// is-invalid: Pone el borde de la caja en rojo.
    }

    // 2. Validar si la segunda coincide con la primera
    if (confirmInput.value !== "" && confirmInput.value === passwordInput.value) { // verificamos que haya algo escrito y ademas que coincida con la primmera contraseña
        confirmInput.classList.replace('is-invalid', 'is-valid') || confirmInput.classList.add('is-valid');
        confirmInput.setCustomValidity(""); // confirma que el formulario ya se puede enviar al dejarlo vacío
    } else if (confirmInput.value !== "") {
        confirmInput.classList.replace('is-valid', 'is-invalid') || confirmInput.classList.add('is-invalid');
        confirmInput.setCustomValidity("No coinciden");
    }
}

if (passwordInput && confirmInput) {
    passwordInput.addEventListener('input', validarContraseñas);
    confirmInput.addEventListener('input', validarContraseñas);
}


if (telefonoInput) {
    telefonoInput.addEventListener('input', function() {
        // Esta regla permite: + opcional, prefijo de 1-4 dígitos, y entre 6-14 números
        const telPattern = /^\+?[0-9]{1,4}[ -]*([0-9][ -]*){6,14}$/;
        
        if (telPattern.test(telefonoInput.value)) {
            telefonoInput.classList.replace('is-invalid', 'is-valid') || telefonoInput.classList.add('is-valid');
        } else {
            // Si el campo está vacío, mejor no mostrar error todavía (opcional)
            if (telefonoInput.value === "") {
                telefonoInput.classList.remove('is-valid', 'is-invalid');
            } else {
                telefonoInput.classList.replace('is-valid', 'is-invalid') || telefonoInput.classList.add('is-invalid');
            }
        }
    });
}
//Esperamos a que esté toda la página cargada
document.addEventListener('DOMContentLoaded', function () {
    const loginModalElement = document.getElementById('loginModal'); //Buscamos el contenedor del modal

    if (loginModalElement) {
        // Leemos el atributo que pusimos en el HTML
        const debeAbrir = loginModalElement.getAttribute('data-open-modal') === 'true'; // si no existe el usuario devuelve true

        if (debeAbrir) {
            const myModal = new bootstrap.Modal(loginModalElement);
            myModal.show();
        }
    }
});

