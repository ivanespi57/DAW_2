const listaCursos = document.querySelector('#lista-cursos');
const carrito = document.querySelector('#carrito');
const contenedorCarrito = document.querySelector('#lista-carrito tbody');
const vaciarCarritoBtn = document.querySelector('#vaciar-carrito');

let articulosCarrito = [];

cargarEventListeners();

function cargarEventListeners() {
    // Al cargar la página, recuperar localStorage
    document.addEventListener('DOMContentLoaded', () => {
        articulosCarrito = JSON.parse(localStorage.getItem('carrito')) || [];
        carritoHTML();
    });

    // Agregar curso
    listaCursos.addEventListener('click', agregarCurso);

    // Eliminar curso
    carrito.addEventListener('click', eliminarCurso);

    // Vaciar carrito
    vaciarCarritoBtn.addEventListener('click', vaciarCarrito);
}

// Agregar curso
function agregarCurso(e) {
    e.preventDefault();

    if (e.target.classList.contains('agregar-carrito')) {
        const cursoClicado = e.target.parentElement.parentElement;
        leerDatosCurso(cursoClicado);
    }
}

// Leer datos del curso
function leerDatosCurso(cursoClicado) {
    const infoCurso = {
        imagen: cursoClicado.querySelector('img').src,
        titulo: cursoClicado.querySelector('h4').textContent,
        precio: cursoClicado.querySelector('.precio span').textContent,
        id: cursoClicado.querySelector('a').getAttribute('data-id'),
        cantidad: 1
    };

    const existe = articulosCarrito.some(curso => curso.id === infoCurso.id);

    if (existe) {
        articulosCarrito.forEach(curso => {
            if (curso.id === infoCurso.id) {
                curso.cantidad++;
            }
        });
    } else {
        articulosCarrito.push(infoCurso);
    }

    carritoHTML();
}

// Mostrar carrito en HTML
function carritoHTML() {
    limpiarHTML();

    articulosCarrito.forEach(curso => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>
                <img src="${curso.imagen}" width="100">
            </td>
            <td>${curso.titulo}</td>
            <td>${curso.precio}</td>
            <td>${curso.cantidad}</td>
            <td>
                <a href="#" class="borrar-curso" data-id="${curso.id}">X</a>
            </td>
        `;
        contenedorCarrito.appendChild(row);
    });

    // Guardar en localStorage
    sincronizarStorage();
}

// Eliminar curso
function eliminarCurso(e) {
    e.preventDefault();

    if (e.target.classList.contains('borrar-curso')) {
        const cursoId = e.target.getAttribute('data-id');

        articulosCarrito = articulosCarrito.filter(
            curso => curso.id !== cursoId
        );

        carritoHTML();
    }
}

// Vaciar carrito
function vaciarCarrito() {
    articulosCarrito = [];
    limpiarHTML();
    localStorage.removeItem('carrito');
}

// Limpiar HTML
function limpiarHTML() {
    while (contenedorCarrito.firstChild) {
        contenedorCarrito.removeChild(contenedorCarrito.firstChild);
    }
}

// Guardar en localStorage
function sincronizarStorage() {
    localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
}
