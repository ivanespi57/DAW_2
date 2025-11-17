// Ejercicio 6.1: Navegación con Teclado

const cuadrado = document.getElementById('cuadrado');
const posicionDisplay = document.getElementById('posicion');

// Posición inicial
let x = 225;
let y = 175;
const paso = 20; // Píxeles por movimiento

// Límites del área de juego
const maxX = 450; // 500 - 50 (ancho cuadrado)
const maxY = 350; // 400 - 50 (alto cuadrado)
const minX = 0;
const minY = 0;

function actualizarPosicion() {
    cuadrado.style.left = x + 'px';
    cuadrado.style.top = y + 'px';
    posicionDisplay.innerText = `Posición: X=${x}, Y=${y}`;
}

function resetearPosicion() {
    x = 225;
    y = 175;
    actualizarPosicion();
}

// 1. Escuchar eventos de teclado en todo el documento
document.addEventListener('keydown', function(event) {
    let moved = false;
    
    switch(event.key) {
        case 'ArrowUp':
            // 2. Flecha arriba: mover hacia arriba
            if (y > minY) {
                y -= paso;
                moved = true;
            }
            break;
            
        case 'ArrowDown':
            // 3. Flecha abajo: mover hacia abajo
            if (y < maxY) {
                y += paso;
                moved = true;
            }
            break;
            
        case 'ArrowLeft':
            // 4. Flecha izquierda: mover hacia la izquierda
            if (x > minX) {
                x -= paso;
                moved = true;
            }
            break;
            
        case 'ArrowRight':
            // 5. Flecha derecha: mover hacia la derecha
            if (x < maxX) {
                x += paso;
                moved = true;
            }
            break;
            
        case 'r':
        case 'R':
            // Bonus: resetear posición
            resetearPosicion();
            moved = true;
            break;
    }
    
    // Prevenir scroll de la página con las flechas
    if (['ArrowUp', 'ArrowDown', 'ArrowLeft', 'ArrowRight'].includes(event.key)) {
        event.preventDefault();
    }
    
    if (moved) {
        actualizarPosicion();
    }
});

// Inicializar posición
actualizarPosicion();
