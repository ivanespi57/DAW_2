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
};

document.addEventListener("DOMContentLoaded", () => {
    mostrarCoches(coches);
    llenarAnios();
});

marca.addEventListener("change", e => {
    datosBusqueda.marca = e.target.value;
    filtrarCoche();
});

anyo.addEventListener("change", e => {
    datosBusqueda.anyo = e.target.value;
    filtrarCoche();
});

min.addEventListener("change", e => {
    datosBusqueda.min = e.target.value;
    filtrarCoche();
});

max.addEventListener("change", e => {
    datosBusqueda.max = e.target.value;
    filtrarCoche();
});

puertas.addEventListener("change", e => {
    datosBusqueda.puertas = e.target.value;
    filtrarCoche();
});

trans.addEventListener("change", e => {
    datosBusqueda.trans = e.target.value;
    filtrarCoche();
});

color.addEventListener("change", e => {
    datosBusqueda.color = e.target.value;
    filtrarCoche();
});

function filtrarCoche() {
    const resultado = coches
        .filter(filtrarMarca)
        .filter(filtrarAnyo)
        .filter(filtrarMin)
        .filter(filtrarMax)
        .filter(filtrarPuertas)
        .filter(filtrarTrans)
        .filter(filtrarColor);

    resultado.length ? mostrarCoches(resultado) : noResultado();
}

function filtrarMarca(coche) {
    return datosBusqueda.marca ? coche.marca === datosBusqueda.marca : coche;
}

function filtrarAnyo(coche) {
    return datosBusqueda.anyo ? coche.anyo === parseInt(datosBusqueda.anyo) : coche;
}

function filtrarMin(coche) {
    return datosBusqueda.min ? coche.precio >= parseInt(datosBusqueda.min) : coche;
}

function filtrarMax(coche) {
    return datosBusqueda.max ? coche.precio <= parseInt(datosBusqueda.max) : coche;
}

function filtrarPuertas(coche) {
    return datosBusqueda.puertas ? coche.puertas === parseInt(datosBusqueda.puertas) : coche;
}

function filtrarTrans(coche) {
    return datosBusqueda.trans ? coche.transmision === datosBusqueda.trans : coche;
}

function filtrarColor(coche) {
    return datosBusqueda.color ? coche.color === datosBusqueda.color : coche;
}

function mostrarCoches(coches) {
    limpiarHTML();
    coches.forEach(coche => {
        const div = document.createElement("div");
        div.classList.add("coche");
        div.innerHTML = `
            <p>${coche.marca} ${coche.modelo} - AÑO: ${coche.anyo} - ${coche.precio}€ - ${coche.puertas} PUERTAS - COLOR: ${coche.color} - ${coche.transmision}</p>
        `;
        list.appendChild(div);
    });
}

function limpiarHTML() {
    while (list.firstChild) {
        list.removeChild(list.firstChild);
    }
}

function noResultado() {
    limpiarHTML();
    const div = document.createElement("div");
    div.classList.add("alerta", "error");
    div.textContent = "No hay resultados con esa selección";
    list.appendChild(div);
}

function llenarAnios() {
    const actual = new Date().getFullYear();
    for (let i = actual; i >= actual - 9; i--) {
        const op = document.createElement("option");
        op.value = i;
        op.textContent = i;
        anyo.appendChild(op);
    }
}
