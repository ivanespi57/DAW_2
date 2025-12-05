const minutosInput = parseInt(document.getElementById('minutos-input').value);
const iniciarBtn = document.getElementById('boton-control');
const temp = document.getElementById('temporizador');
const btnPausar = document.getElementById('pausar');
const btnReiniciar = document.getElementById('reiniciar');

let intervalo;
let tiempoRestante;

function formatearTiempo(segundos) {
    const minutos = Math.floor(segundos / 60);
    const segundosRestantes = segundos % 60;

    return `${String(minutos).padStart(2, '0')}:${String(segundosRestantes).padStart(2, '0')}`;
}

iniciarBtn.addEventListener('click', () => {

    if (intervalo) {
        clearInterval(intervalo);
    }

    tiempoRestante = minutosInput * 60;
    temp.textContent = formatearTiempo(tiempoRestante);


    intervalo = setInterval(() => {
        tiempoRestante--;
        temp.textContent = formatearTiempo(tiempoRestante);
    }, 1000);
});
