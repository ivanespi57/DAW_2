const listaProductos = document.querySelector('#lista-productos');
const carritoContenedor = document.querySelector('#carrito-items');
const contadorCarrito = document.querySelector('#contador-productos');
const precioTotalHTML = document.querySelector('#precio-total');
const filtroCategoria = document.querySelector('#filtro-categoria');
const loading = document.querySelector('#loading');
const btnVaciar = document.querySelector('#vaciar-carrito');

let articulosCarrito = [];
let productosDB = [];
let categoriaActual = 'todos'; 

// Inicio
document.addEventListener('DOMContentLoaded', () => {
    articulosCarrito = JSON.parse(localStorage.getItem('carrito')) || [];

    obtenerProductos();
});

async function obtenerProductos() {

    try {
        const res = await fetch('productos.json');
        if(!res.ok) throw new Error("Error en red");
        productosDB = await res.json(); 
        
        loading.style.display = 'none';

        sincronizarStockInicial();

        aplicarFiltroActual();
        actualizarCarritoHTML();
    } catch (error) {
        loading.textContent = "Error al cargar productos.";
        console.error(error);
    }
}

function aplicarFiltroActual() {
    limpiarHTML(listaProductos);

    const productosAMostrar = (categoriaActual === 'todos') 
        ? productosDB 
        : productosDB.filter(p => p.categoria === categoriaActual);

    pintarCards(productosAMostrar);
}


function pintarCards(lista) {

    lista.forEach(p => {
        const { id, nombre, precio, stock } = p;
        const card = document.createElement('div');
        card.classList.add('producto-card');
        if(stock === 0) card.classList.add('agotado');

        card.innerHTML = `
            <h3>${nombre}</h3>
            <p class="precio">${precio}â‚¬</p>
            <p>Stock: ${stock}</p>
            <button class="btn-add" data-id="${id}" ${stock === 0 ? 'disabled' : ''}>
                ${stock === 0 ? 'AGOTADO' : 'AÃ±adir al carrito'}
            </button>
        `;
        listaProductos.appendChild(card);
    });
}

function actualizarCarritoHTML() {
    limpiarHTML(carritoContenedor);
    let subtotal = 0;

    articulosCarrito.forEach(item => {
        subtotal += item.precio * item.cantidad;
        const li = document.createElement('li');
        li.classList.add('item-carrito');
        li.innerHTML = `
            ${item.nombre} (x${item.cantidad})
            <button class="btn-remove" data-id="${item.id}">-</button>
        `;
        carritoContenedor.appendChild(li);
    });

    precioTotalHTML.textContent = `${subtotal.toFixed(2)}â‚¬`;

    contadorCarrito.textContent = articulosCarrito.reduce((acc, item) => acc + item.cantidad, 0);

    localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
}

listaProductos.addEventListener('click', (e) => {
    if(e.target.classList.contains('btn-add')) {
        const id = parseInt(e.target.getAttribute('data-id'));
        const producto = productosDB.find(p => p.id === id);

        if(producto && producto.stock > 0) {
            producto.stock--;
            
            const existe = articulosCarrito.find(item => item.id === id);
            if(existe) {
                existe.cantidad++;
            } else {
                articulosCarrito.push({ ...producto, cantidad: 1 });
            }

            aplicarFiltroActual();
            actualizarCarritoHTML();
        }
    }
});

carritoContenedor.addEventListener('click', (e) => {
    if(e.target.classList.contains('btn-remove')) {
        const id = parseInt(e.target.getAttribute('data-id'));
        const item = articulosCarrito.find(i => i.id === id);

        const productoOriginal = productosDB.find(p => p.id === id);
        productoOriginal.stock++;

        if(item.cantidad > 1) {
            item.cantidad--;
        } else {
            articulosCarrito = articulosCarrito.filter(i => i.id !== id);
        }

        aplicarFiltroActual();
        actualizarCarritoHTML();
    }
});

filtroCategoria.addEventListener('change', (e) => {
    categoriaActual = e.target.value;
    aplicarFiltroActual();
});

btnVaciar.addEventListener('click', () => {

    articulosCarrito.forEach(item => {
        const prod = productosDB.find(p => p.id === item.id);
        if(prod) prod.stock += item.cantidad;
    });

    articulosCarrito = [];

    aplicarFiltroActual();
    actualizarCarritoHTML();
});

function limpiarHTML(contenedor) {
    while(contenedor.firstChild) {
        contenedor.removeChild(contenedor.firstChild);
    }
}

function sincronizarStockInicial() {
    
    articulosCarrito.forEach(item => {
        const prod = productosDB.find(p => p.id === item.id);
        if(prod) prod.stock -= item.cantidad;
    });
}