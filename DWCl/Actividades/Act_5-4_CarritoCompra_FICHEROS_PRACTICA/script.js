const listaCursos = document.querySelector('#lista-cursos');
const carrito = document.querySelector('#carrito');
const contenedorCarrito = document.querySelector('#lista-carrito tbody');
const vaciarCarritoBtn = document.querySelector('#vaciar-carrito');

let articulosCarrito = [];

cargarEventListeners();

function cargarEventListeners() {
    // 1. Agregar curso
    listaCursos.addEventListener('click', agregarCurso);

    // 2. Eliminar curso
    carrito.addEventListener('click', eliminarCurso);

    // 3. Vaciar carrito
    vaciarCarritoBtn.addEventListener('click', vaciarCarrito);
}

// Usuario clica en "Agregar al carrito"
function agregarCurso(e) {
    e.preventDefault();

    if (e.target.classList.contains('agregar-carrito')) {
        const cursoClicado = e.target.parentElement.parentElement;
        leerDatosCurso(cursoClicado);
    }
}

// Extraemos los datos del curso
function leerDatosCurso(cursoClicado) {

    const infoCurso = {
        imagen: cursoClicado.querySelector('img').src,
        titulo: cursoClicado.querySelector('h4').textContent,
        precio: cursoClicado.querySelector('.precio span').textContent,
        id: cursoClicado.querySelector('a').getAttribute('data-id'),
        cantidad: 1
    };

    // Comprobamos si existe en el carrito
    const existe = existeEnCarrito(infoCurso.id);

    if (existe) {
        actualizarCantidad(infoCurso.id);
    } else {
        articulosCarrito.push(infoCurso);
    }

    carritoHTML();
}

// Comprueba si el curso ya está en el carrito
function existeEnCarrito(idRecibido) {
    for (let i = 0; i < articulosCarrito.length; i++) {
        if (articulosCarrito[i].id === idRecibido) {
            return true;
        }
    }
    return false;
}

// Suma 1 a la cantidad del curso
function actualizarCantidad(idRecibido) {
    for (let i = 0; i < articulosCarrito.length; i++) {
        if (articulosCarrito[i].id === idRecibido) {
            articulosCarrito[i].cantidad++;
            break;
        }
    }
}

// Pinta el carrito en la tabla
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
}

// Eliminar un curso
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
}

// Limpiar HTML del carrito
function limpiarHTML() {
    while (contenedorCarrito.firstChild) {
        contenedorCarrito.removeChild(contenedorCarrito.firstChild);
    }
}
