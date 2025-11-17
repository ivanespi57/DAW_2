// Ejercicio 6.2: Buscador en Tiempo Real

const buscador = document.getElementById('buscador');
const listaFrutas = document.getElementById('lista-frutas');
const noResultados = document.getElementById('no-resultados');
const contador = document.getElementById('contador');
const frutas = document.querySelectorAll('#lista-frutas li');

function filtrarFrutas() {
    // 1. Obtener el texto de búsqueda
    const textoBusqueda = buscador.value.toLowerCase().trim();
    
    let frutasVisibles = 0;
    
    // 2. Filtrar cada fruta
    frutas.forEach(fruta => {
        const nombreFruta = fruta.getAttribute('data-fruta');
        
        // 3. Ignorar mayúsculas y minúsculas
        if (nombreFruta.includes(textoBusqueda)) {
            fruta.classList.remove('oculto');
            frutasVisibles++;
        } else {
            fruta.classList.add('oculto');
        }
    });
    
    // 4. Mostrar mensaje si no hay coincidencias
    if (frutasVisibles === 0 && textoBusqueda !== '') {
        noResultados.style.display = 'block';
        contador.innerText = 'No hay resultados';
    } else {
        noResultados.style.display = 'none';
        contador.innerText = `Mostrando ${frutasVisibles} frutas`;
    }
}

// Escuchar cambios en el input mientras se escribe
buscador.addEventListener('input', filtrarFrutas);

// También escuchar el evento keyup para mayor responsividad
buscador.addEventListener('keyup', filtrarFrutas);
