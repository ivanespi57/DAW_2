document.addEventListener("DOMContentLoaded", () => {
    cargarCriptos();

    formulario.addEventListener("submit", consultarPrecio);
});

const formulario = document.getElementById("formulario");
const moneda = document.getElementById("moneda");
const criptomonedas = document.getElementById("criptomonedas");
const resultado = document.getElementById("resultado");

// CARGAR CRIPTOMONEDAS
function cargarCriptos() {

    const url = "https://min-api.cryptocompare.com/data/top/mktcapfull?limit=10&tsym=USD";

    fetch(url)
        .then(respuesta => respuesta.json())
        .then(datos => {

            datos.Data.forEach(cripto => {

                const { FullName, Name } = cripto.CoinInfo;

                const option = document.createElement("option");
                option.value = Name;
                option.textContent = FullName;

                criptomonedas.appendChild(option);
            });

        })
        .catch(() => mostrarError("Error al cargar criptomonedas"));
}

// VALIDACIÓN
function consultarPrecio(e) {
    e.preventDefault();

    if (moneda.value === "" || criptomonedas.value === "") {
        mostrarError("Debes seleccionar moneda y criptomoneda");
        return;
    }

    obtenerDatos();
}

// CONSULTAR API
function obtenerDatos() {

    limpiarResultado();

    const url = `https://min-api.cryptocompare.com/data/pricemultifull?fsyms=${criptomonedas.value}&tsyms=${moneda.value}`;

    fetch(url)
        .then(respuesta => respuesta.json())
        .then(datos => {

            const info = datos.DISPLAY[criptomonedas.value][moneda.value];

            const {
                PRICE,
                HIGHDAY,
                LOWDAY,
                CHANGEPCT24HOUR,
                LASTUPDATE
            } = info;

            resultado.innerHTML = `
                <p>Precio: <strong>${PRICE}</strong></p>
                <p>Máximo día: ${HIGHDAY}</p>
                <p>Mínimo día: ${LOWDAY}</p>
                <p>Cambio 24h: ${CHANGEPCT24HOUR}%</p>
                <p>Última actualización: ${LASTUPDATE}</p>
            `;
        })
        .catch(() => mostrarError("No se han podido obtener los datos"));
}

// ERRORES
function mostrarError(mensaje) {

    if (document.querySelector(".error")) return;

    const div = document.createElement("div");
    div.classList.add("error");
    div.textContent = mensaje;

    formulario.appendChild(div);

    setTimeout(() => {
        div.remove();
    }, 2000);
}

// LIMPIAR RESULTADOS
function limpiarResultado() {
    resultado.innerHTML = "";
}
