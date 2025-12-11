const minutosInput = document.getElementById('minutos-input');
const iniBtn = document.getElementById('boton-control');
const temp = document.getElementById('tiempo');
const contenedor = document.getElementById("temporizador");
const estado = document.getElementById("estado");

let intervalo = null;
let tiempoRestante = 0;

function formatearTiempo(segundos) {
    const minutos = Math.floor(segundos / 60);
    const segundosRestantes = segundos % 60;

    return `${String(minutos).padStart(2, '0')}:${String(segundosRestantes).padStart(2, '0')}`;
}

function actualizarTiempo() {

    tiempoRestante--;
    temp.textContent = formatearTiempo(tiempoRestante);

    if (tiempoRestante <= 10) {
        contenedor.classList.add("finalizado");
        contenedor.classList.remove("alerta");
        estado.textContent = "Tiempo crítico";
    }
    else if (tiempoRestante <= 180) {
        contenedor.classList.add("alerta");
        contenedor.classList.remove("finalizado");
        estado.textContent = "Atención: quedan menos de 3 minutos";
    }
    else {
        contenedor.classList.remove("alerta", "finalizado");
        estado.textContent = "Sesión en progreso…";
    }

    if (tiempoRestante <= 0) {
        clearInterval(intervalo);
        intervalo = null;

        estado.textContent = "La sesión ha finalizado";
        iniBtn.textContent = "Reiniciar";
        minutosInput.disabled = false;
    }
}

iniBtn.addEventListener('click', () => {

    if (intervalo === null && iniBtn.textContent === "Iniciar Sesión") {

        const minutos = parseInt(minutosInput.value);

        tiempoRestante = minutos * 60;
        temp.textContent = formatearTiempo(tiempoRestante);

        minutosInput.disabled = true;

        iniBtn.textContent = "Pausar Sesión";

        intervalo = setInterval(actualizarTiempo, 1000);
    } else if (intervalo !== null && iniBtn.textContent === "Pausar Sesión") {
        
        pausarBtn();

    } else if (intervalo === null && iniBtn.textContent === "Reanudar Sesión") {
        
        reanudarBtn();

    } else if (iniBtn.textContent === "Reiniciar") {

        reiniciarBtn();
    }

});

function pausarBtn() {
    clearInterval(intervalo);
    intervalo = null;

    estado.textContent = "Sesión en pausa";
    iniBtn.textContent = "Reanudar Sesión";
}

function reanudarBtn() {
    estado.textContent = "Sesión en progreso…";
    iniBtn.textContent = "Pausar Sesión";

    intervalo = setInterval(actualizarTiempo, 1000);
}

function reiniciarBtn(){
    contenedor.classList.remove("alerta", "finalizado");
    estado.textContent = "Sesión preparada";
    
    const minutos = parseInt(minutosInput.value);
    tiempoRestante = minutos * 60;
    temp.textContent = formatearTiempo(tiempoRestante);
    
    iniBtn.textContent = "Iniciar Sesión";
}
