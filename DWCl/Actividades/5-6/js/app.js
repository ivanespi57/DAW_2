const formulario = document.querySelector('#formulario');
const emailInput = document.querySelector('#email');
const asuntoInput = document.querySelector('#asunto');
const mensajeInput = document.querySelector('#mensaje');
const btnEnviar = formulario.querySelector('button[type="submit"]');
const btnReset = formulario.querySelector('button[type="reset"]');
const spinner = document.querySelector('#spinner');

const emailEstado = {
    email: '',
    asunto: '',
    mensaje: ''
};

document.addEventListener('DOMContentLoaded', () => {
    emailInput.addEventListener('input', validar);
    asuntoInput.addEventListener('input', validar);
    mensajeInput.addEventListener('input', validar);

    formulario.addEventListener('submit', enviarEmail);

    btnReset.addEventListener('click', e => {
        e.preventDefault();
        resetFormulario();
    });
});

function validar(e) {
    if (e.target.value.trim() === '') {
        mostrarAlerta(`EL CAMPO ${e.target.id.toUpperCase()} ES OBLIGATORIO`, e.target.parentElement);
        emailEstado[e.target.name] = '';
        comprobarEmail();
        return;
    }

    if (e.target.id === 'email' && !validarEmail(e.target.value)) {
        mostrarAlerta('EMAIL NO VÁLIDO', e.target.parentElement);
        emailEstado[e.target.name] = '';
        comprobarEmail();
        return;
    }

    limpiarAlerta(e.target.parentElement);
    emailEstado[e.target.name] = e.target.value.trim();
    comprobarEmail();
}

function validarEmail(email) {
    const regex = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
    return regex.test(email);
}

function enviarEmail(e) {
    e.preventDefault();

    spinner.classList.remove('hidden');
    spinner.classList.add('flex');

    setTimeout(() => {
        spinner.classList.add('hidden');
        spinner.classList.remove('flex');

        const alerta = document.createElement('P');
        alerta.classList.add('bg-green-600', 'text-white', 'p-2', 'text-center', 'mt-5');
        alerta.textContent = 'El mensaje se ha enviado correctamente';

        formulario.appendChild(alerta);

        setTimeout(() => {
            alerta.remove();
            resetFormulario();
        }, 3000);

    }, 3000);
}

function mostrarAlerta(mensaje, referencia) {
    limpiarAlerta(referencia);
    const error = document.createElement('P');
    error.classList.add('bg-red-600', 'text-white', 'p-2', 'text-center');
    error.textContent = mensaje;
    referencia.appendChild(error);
}

function limpiarAlerta(referencia) {
    const alerta = referencia.querySelector('p');
    if (alerta) {
        alerta.remove();
    }
}

function comprobarEmail() {
    if (Object.values(emailEstado).includes('')) {
        btnEnviar.disabled = true;
        btnEnviar.classList.add('opacity-50');
    } else {
        btnEnviar.disabled = false;
        btnEnviar.classList.remove('opacity-50');
    }
}

function resetFormulario() {
    formulario.reset();
    emailEstado.email = '';
    emailEstado.asunto = '';
    emailEstado.mensaje = '';
    btnEnviar.disabled = true;
    btnEnviar.classList.add('opacity-50');
}
