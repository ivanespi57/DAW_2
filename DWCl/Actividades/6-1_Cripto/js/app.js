document.addEventListener("DOMContentLoaded", () => {

    const formulario = document.getElementById("formulario");
    const moneda = document.getElementById("moneda");
    const criptomonedas = document.getElementById("criptomonedas");
    const resultado = document.getElementById("resultado");

    cargarCriptos();

    formulario.addEventListener("submit", consultarPrecio);

    // cargar criptomonedas

    async function cargarCriptos() {
        try {

            const respuesta = await fetch("https://min-api.cryptocompare.com/data/top/mktcapfull?limit=10&tsym=USD");
            const datos = await respuesta.json();

            datos.Data.forEach(elemento => {

                const { FullName, Name } = elemento.CoinInfo;

                const option = document.createElement("option");
                option.value = Name;
                option.textContent = FullName;

                criptomonedas.appendChild(option);
            });

        } catch (error) {
            mostrarError("Error al cargar criptomonedas");
        }
    }

    // formulario

    async function consultarPrecio(e) {
        e.preventDefault();

        resultado.innerHTML = "";

        if (moneda.value === "" || criptomonedas.value === "") {
            mostrarError("Debes seleccionar moneda y criptomoneda");
            return;
        }

        try {

            const url = `https://min-api.cryptocompare.com/data/pricemultifull?fsyms=${criptomonedas.value}&tsyms=${moneda.value}`;

            const respuesta = await fetch(url);
            const datos = await respuesta.json();

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

        } catch (error) {
            mostrarError("No se han podido obtener los datos");
        }
    }

    // errores

    function mostrarError(texto) {

        if (document.querySelector(".error")) return;

        const div = document.createElement("div");
        div.classList.add("error");
        div.textContent = texto;

        formulario.appendChild(div);

        setTimeout(() => {
            div.remove();
        }, 2000);
    }

});
