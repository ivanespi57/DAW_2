const minutosInput = document.getElementById('minutos-input');
const iniciarBtn = document.getElementById('boton-control');
const temporizadorDisplay = document.getElementById('tiempo');
const contenedor = document.getElementById("temporizador");
const estado = document.getElementById("estado");

let intervalo;
let tiempoRestante;


function formatearTiempo(segundos) {
    const minutos = Math.floor(segundos / 60);
    const segundosRestantes = segundos % 60;

    return `${String(minutos).padStart(2, '0')}:${String(segundosRestantes).padStart(2, '0')}`;
}

iniciarBtn.addEventListener('click', () => {
    minutosInput.disabled = true;
    iniciarBtn.disabled = true;

    if (intervalo) {
        clearInterval(intervalo);
    }

    const minutos = parseInt(minutosInput.value);

    tiempoRestante = minutos * 60;
    temporizadorDisplay.textContent = formatearTiempo(tiempoRestante);


    intervalo = setInterval(() => {
        tiempoRestante--;
        temporizadorDisplay.textContent = formatearTiempo(tiempoRestante);
        if (tiempoRestante <= 10) {
        contenedor.classList.add("finalizado");
        estado.textContent = "Tiempo crítico";
        } 
        else if (tiempoRestante <= 180) {
            contenedor.classList.add("alerta");
            estado.textContent = "Atención: quedan menos de 3 minutos";
        } 
        else if (tiempoRestante > 180){
            contenedor.classList.remove("alerta", "finalizado");
            estado.textContent = "Sesión en progreso…";
        }

        if (tiempoRestante <= 0) {
            clearInterval(intervalo);
            estado.textContent = "¡La sesión ha finalizado!";
            boton.textContent = "Reiniciar";
            minutosInput.disabled = false;
            return;
        }
    }, 1000);
});
