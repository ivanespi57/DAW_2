// Ejercicio 5.2: Galería de Imágenes Simple

// 1. Array con URLs de imágenes
const imagenes = [
    'https://picsum.photos/400/300?random=1',
    'https://picsum.photos/400/300?random=2',
    'https://picsum.photos/400/300?random=3'
];

let imagenActual = 0;

const imagen = document.getElementById('imagen-actual');
const contador = document.getElementById('contador');
const botonAnterior = document.getElementById('anterior');
const botonSiguiente = document.getElementById('siguiente');

function actualizarGaleria() {
    // Cambiar la imagen
    imagen.src = imagenes[imagenActual];
    imagen.alt = `Imagen ${imagenActual + 1}`;
    
    // 4. Actualizar el contador de posición
    contador.innerText = `${imagenActual + 1} / ${imagenes.length}`;
    
    // Actualizar estado de botones
    botonAnterior.disabled = imagenActual === 0;
    botonSiguiente.disabled = imagenActual === imagenes.length - 1;
}

// 2. Botón "Siguiente" cambia a la siguiente imagen
botonSiguiente.addEventListener('click', function() {
    if (imagenActual < imagenes.length - 1) {
        imagenActual++;
    } else {
        // 5. Al llegar al final, volver al inicio
        imagenActual = 0;
    }
    actualizarGaleria();
});

// 3. Botón "Anterior" cambia a la imagen anterior
botonAnterior.addEventListener('click', function() {
    if (imagenActual > 0) {
        imagenActual--;
    } else {
        // Al llegar al inicio, ir al final
        imagenActual = imagenes.length - 1;
    }
    actualizarGaleria();
});

// Inicializar la galería
actualizarGaleria();