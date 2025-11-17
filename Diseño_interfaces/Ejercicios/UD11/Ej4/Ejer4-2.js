const luces = document.querySelectorAll('.luz');
const botonSig = document.getElementById('siguiente');

let actual = 0;

const secuencia = ['roja', 'verde', 'amarilla'];

botonSig.addEventListener('click', function(){
    luces.forEach(luz => luz.classList.remove('activa'));
    
    actual = (actual + 1) % secuencia.length;

    const luzActiva = document.querySelector(`.${secuencia[actual]}`);
    luzActiva.classList.add('activa');
});