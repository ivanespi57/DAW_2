const listaProductos = document.querySelector('#lista-productos');
const carrito = document.querySelector('#contenedor-principal');
const carritoContenedor = document.querySelector('#carrito-items');
const vaciarCarritoBtn = document.querySelector('#vaciar-carrito');
const filCategoria = document.querySelector("#filtro-categoria");

let articulosCarrito = [];
let productosDB = [];

const datosBusqueda = {
    filCategoria: ''
};

filCategoria.addEventListener("change", e => {
    datosBusqueda.filCategoria = e.target.value;
    filtrarProductos();
});

function filtrarProductos() {
    const resultado = producto.filter(filtrarCat);

    resultado.length ? pintarCards(resultado) : noResultado();
}

function filtrarCat(producto) {
    return datosBusqueda.filCategoria ? producto.filCategoria === datosBusqueda.filCategoria : producto;
}

function noResultado() {
    limpiarHTML();
    const div = document.createElement("div");
    div.classList.add("alerta", "error");
    div.textContent = "No hay resultados con esa selección";
    list.appendChild(div);
}

cargarEventListeners();

function cargarEventListeners() {   
    // Al cargar la página, recuperar localStorage
    document.addEventListener('DOMContentLoaded', () => {
        articulosCarrito = JSON.parse(localStorage.getItem('carrito-detalle')) || [];
        actualizarCarrito();
    });

    // gestionar productos
    listaProductos.addEventListener('click', gestionarClickProductos);

    // Eliminar
    carrito.addEventListener('click', eliminarProducto);

    // Vaciar carrito
    vaciarCarritoBtn.addEventListener('click', vaciarCarrito);
}

async function obtenerProductos(e) {
    try {
        const respuesta = await fetch("productos.json");
        const datos = await respuesta.json();
        
    } catch (error) {
        mostrarError("Error al cargar productos");
    }
}

// mostrar 
function pintarCards(datos){
    obtenerProductos(e);
    limpiarHTML(listaProductos);

    datos.forEach(producto => {

        const { nombre, precio, categoria, stock } = producto;

        res.innerHTML += `
            <div class="producto-card">
                <p><strong>${categoria} ${nombre}</strong></p><br>
                <p>${precio}€</p><br>
                <p>Stock: ${stock}</p><br>
            </div>
        `;
    });
}

// gestionar productos
function gestionarClickProductos(e) {
    e.preventDefault();

    if (e.target.classList.contains('btn-add')) {
        const productoClicado = e.target.parentElement.parentElement;
        
        const infoProd = {
            categoria: productoClicado.textContent,
            precio: productoClicado.textContent,
            id: productoClicado.getAttribute('data-id'),
            cantidad: 1
        };

        const existe = articulosCarrito.some(producto => producto.id === infoProd.id);

        if (existe) {
            articulosCarrito.forEach(producto => {
                if (producto.id === infoProd.id) {
                    producto.cantidad++;
                }
            });
        } else {
            articulosCarrito.push(infoProd);
        }

        actualizarCarrito();
    }
}

// Mostrar carrito en HTML
function actualizarCarrito() {
    limpiarHTML();

    articulosCarrito.forEach(producto => {
        const row = document.createElement('tr');
        row.innerHTML = `¡
            <td>${producto.categoria}</td>
            <td>${producto.nombre}</td>
            <td>${producto.cantidad}</td>
            <td>
                <a href="#" class="vaciar-producto" data-id="${producto.id}">X</a>
            </td>
        `;
        carritoContenedor.appendChild(row);
    });

    // Guardar en localStorage
    sincronizarStorage();
}

// Eliminar curso
function eliminarProducto(e) {
    e.preventDefault();

    if (e.target.classList.contains('vaciar-producto')) {
        const productoId = e.target.getAttribute('data-id');

        articulosCarrito = articulosCarrito.filter(
            producto => producto.id !== productoId
        );

        actualizarCarrito();
    }
}

// Vaciar carrito
function vaciarCarrito() {
    articulosCarrito = [];
    limpiarHTML();
    localStorage.removeItem('carrito-detalle');
}

// Limpiar HTML
function limpiarHTML() {
    while (carritoContenedor.firstChild) {
        carritoContenedor.removeChild(carritoContenedor.firstChild);
    }
}

// Guardar en localStorage
function sincronizarStorage() {
    localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
}
