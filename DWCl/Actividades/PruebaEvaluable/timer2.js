let segundosRestantes = 0;
let idIntervalo = null;
let corriendo = false;

const inputMinutos = document.querySelector("#minutos-input");
const tiempo = document.querySelector("#tiempo");
const estado = document.querySelector("#estado");
const contenedor = document.querySelector("#temporizador");
const boton = document.querySelector("#boton-control");

function formatoDosDigitos(num) {
    return num < 10 ? "0" + num : num;
}

function actualizarTiempo() {

    if (segundosRestantes <= 0) {
        clearInterval(idIntervalo);
        idIntervalo = null;
        estado.textContent = "¡La sesión ha finalizado!";
        boton.textContent = "Reiniciar";
        corriendo = false;
        inputMinutos.disabled = false;
        return;
    }

    segundosRestantes--;

    let mins = Math.floor(segundosRestantes / 60);
    let secs = segundosRestantes % 60;

    tiempo.textContent = `${formatoDosDigitos(mins)}:${formatoDosDigitos(secs)}`;

    contenedor.classList.remove("alerta", "finalizado");

    if (segundosRestantes <= 10) {
        contenedor.classList.add("finalizado");
        estado.textContent = "⚠️ ¡Tiempo crítico!";
    } 
    else if (segundosRestantes <= 180) {
        contenedor.classList.add("alerta");
        estado.textContent = "Atención: quedan menos de 3 minutos";
    } 
    else {
        estado.textContent = "Sesión en progreso…";
    }
}

boton.addEventListener("click", () => {

    if (!corriendo) {

        if (segundosRestantes === 0 || idIntervalo === null) {
            let mins = parseInt(inputMinutos.value);

            if (isNaN(mins) || mins <= 0) {
                alert("Introduce un número válido de minutos.");
                return;
            }

            segundosRestantes = mins * 60;
            tiempo.textContent = `${formatoDosDigitos(mins)}:00`;
            estado.textContent = "Sesión iniciada";
        }

        idIntervalo = setInterval(actualizarTiempo, 1000);
        corriendo = true;

        boton.textContent = "Pausar Sesión";
        inputMinutos.disabled = true;
    } 
    else {

        clearInterval(idIntervalo);
        corriendo = false;
        boton.textContent = "Reanudar Sesión";
        estado.textContent = "Sesión pausada…";
    }
});
