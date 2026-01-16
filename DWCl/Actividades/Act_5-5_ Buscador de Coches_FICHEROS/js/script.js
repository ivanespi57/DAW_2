const marca = document.querySelector("#marca");
const anyo = document.querySelector("#anyo");
const min = document.querySelector("#minimo");
const max = document.querySelector("#maximo");
const puertas = document.querySelector("#puertas");
const trans = document.querySelector("#transmision");
const color = document.querySelector("#color");
const list = document.getElementById("resultado");

const datosBusqueda = {
    marca: '',
    anyo: '',
    min: '',
    max: '',
    puertas: '',
    trans: '',
    color: ''
}

document.addEventListener("DOMContentLoaded", function(){

    coches.forEach(coche => {
        const divc = document.createElement("div");
        divc.classList.add("coche");
        divc.innerHTML = `<p>${coche.marca} ${coche.modelo} -  AÑO: ${coche.anyo} - ${coche.precio}€ - ${coche.puertas} PUERTAS - COLOR: ${coche.color} - ${coche.transmision}</p>`;
        list.appendChild(divc);
    });
});

for(let i = 2015; i <= 2025; i++){
    const op = document.createElement("option");
    op.value = i;
    op.textContent = i;
    anyo.appendChild(op);
}

// Evento para el selector de marca
marca.addEventListener('change', (e) => {
 // Guardamos el valor seleccionado en nuestro objeto global
 datosBusqueda.marca = e.target.value;
 // IMPORTANTE: Cada vez que el usuario cambie algo,
 // debemos volver a filtrar para actualizar los resultados
 filtrarCoche();
});
// Evento para el selector de año
anyo.addEventListener('change', (e) => {
 datosBusqueda.anyo = e.target.value;

 filtrarCoche(); // *Paso 5
});
// Repetir para el resto de selectores... 
min.addEventListener('change', (e) => {
 datosBusqueda.min = e.target.value;

 filtrarCoche(); // *Paso 5
});
max.addEventListener('change', (e) => {
 datosBusqueda.max = e.target.value;

 filtrarCoche(); // *Paso 5
});
puertas.addEventListener('change', (e) => {
 datosBusqueda.puertas = e.target.value;

 filtrarCoche(); // *Paso 5
});
trans.addEventListener('change', (e) => {
 datosBusqueda.trans = e.target.value;

 filtrarCoche(); // *Paso 5
});
color.addEventListener('change', (e) => {
 datosBusqueda.color = e.target.value;

 filtrarCoche(); // *Paso 5
});