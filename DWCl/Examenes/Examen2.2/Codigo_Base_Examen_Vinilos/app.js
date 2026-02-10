// Variables principales
const listaVinilos = document.querySelector("#lista-vinilos");
const carritoCont = document.querySelector("#carrito-items");
const contadorCarr = document.querySelector("#contador-productos");
const precioTot = document.querySelector('#precio-total');
const filtroCat = document.querySelector("#filtro-categoria");
const loading = document.querySelector("#loading");
const btnVaciar = document.querySelector("#vaciar-carrito");

// Variables que controlan el estado de la aplicación
let vinilosDB = [];
let articulosCarrito = [];
let categoriaActual = 'todos';

// Recuperamos el LocalStorage y cargamos los datos Asíncronos
document.addEventListener("DOMContentLoaded", () => {
    articulosCarrito = JSON.parse(localStorage.getItem("carrito")) || [];

    obtenerVinilos();
});

// Cargo los vinilos del JSON con async/await y fetch
async function obtenerVinilos() {
    // Manejo los errores con try/catch
    try{
        const result = await fetch('vinilos.json');
        if(!result.ok) throw new Error("Error en red");
        vinilosDB = await result.json();

        loading.style.display = "none";

        // Para sincronizar el stock con lo que ya hay en el carrito
        sincronizarStorage();
        aplicarFiltro();
        actualizarCarritoHTML();
    }catch (error){
        loading.textContent = "Error al cargar los vinilos";
        console.error(error);
    }
}

//  Filtramos vinilos según su categoría/género que selecciones
function aplicarFiltro(){
    // Limpiamos antes de filtrar
    limpiarHTML(listaVinilos);

    const vinilosMos = (categoriaActual === "todos") ? vinilosDB : vinilosDB.filter(p => p.categoria === categoriaActual);

    mostrarVinilos(vinilosMos);
}

// Mostramos las cards de los vinilos
function mostrarVinilos(lista){
    lista.forEach(p => {
        const {id, nombre, artista, precio, stock} = p;
        const div = document.createElement("div");
        div.classList.add("producto-card");
        
        if (stock === 0){
            carritoCont.classList.add("agotado");
        }

        div.innerHTML = `
            <h3>${nombre}</h3>
            <p class="precio">${precio}€</p>
            <p>Artista: ${artista}</p>
            <p>Stock: ${stock}</p>
            <button class="btn-add" data-id="${id}" ${stock === 0 ? 'disabled' : ''}>
                ${stock === 0 ? 'AGOTADO' : 'Añadir al carrito'}
            </button>
        `;
        listaVinilos.appendChild(div);
    });
}

function actualizarCarritoHTML(){
    limpiarHTML(carritoCont);
    let subtotal = 0;

    articulosCarrito.forEach(item =>{
        subtotal += item.precio * item.cantidad;
        const li = document.createElement("li");
        li.classList.add("carrito-items");
        li.innerHTML = `
            ${item.nombre} (x${item.cantidad})
            <button class="btn-remove" data-id="${item.id}">-</button>
        `;
        carritoCont.appendChild(li);
    });
    
    // Actualizamos el subtotal del carrito
    precioTot.textContent = `${subtotal.toFixed(2)}`;
    // Actualizamos el contador
    contadorCarr.textContent = articulosCarrito.reduce((acc, item) => acc + item.cantidad, 0);

    localStorage.setItem("carrito", JSON.stringify(articulosCarrito));
}

// Función para agregar vinilos del contenedor de vinilos escuchando el evento "click"
function agregarVinilo(){
    listaVinilos.addEventListener("click", (e) =>{
        if(e.target.classList.contains("btn-add")){
            const id = parseInt(e.target.getAttribute("data-id"));
            const vinilo = vinilosDB.find(p => p.id === id);

            if (vinilo && vinilo.stock > 0){
                vinilo.stock--;

                const existe = articulosCarrito.find(item => item.id === id);
                
                if(existe){
                    existe.cantidad++;
                }else{
                    articulosCarrito.push({ ...vinilo, cantidad: 1});
                }
            }
            aplicarFiltro();
            actualizarCarritoHTML();
        }
    });


}
// Función para eliminar Vinilos del contenedor del carrito escuchando el evento "click"
function eliminarVinilo(){
    carritoCont.addEventListener("click", (e) =>{
        if(e.target.classList.contains("btn-remove")){
            const id = parseInt(e.target.getAttribute('data-id'));
            const item = articulosCarrito.find(i => i.id === id);

            const prodOri = vinilosDB.find(p => p.id === id);
            prodOri.stock++;

            if(item.cantidad > 1) {
                item.cantidad--;
            } else {
                articulosCarrito = articulosCarrito.filter(i => i.id !== id);
            }
            aplicarFiltro();
            actualizarCarritoHTML();
        }
    });
}

filtroCat.addEventListener('change', (e) => {
    categoriaActual = e.target.value;
    aplicarFiltro();
});

// VAciar el carrito
btnVaciar.addEventListener('click', () => {
    articulosCarrito.forEach(item => {
        const vini = vinilosDB.find(p => p.id === item.id);
        if(vini) vini.stock += item.cantidad;
    });

    articulosCarrito = [];

    aplicarFiltro();
    actualizarCarritoHTML();
});

function limpiarHTML(contenedor) {
    while(contenedor.firstChild) {
        contenedor.removeChild(contenedor.firstChild);
    }
}
// Si el usuario carga la página con productos en el carrito,
// debemos restar ese stock del total disponible.
function sincronizarStorage() {
    articulosCarrito.forEach(item => {
        const vini = vinilosDB.find(p => p.id === item.id);
        if(vini) vini.stock -= item.cantidad;
    });
}

agregarVinilo();
eliminarVinilo();