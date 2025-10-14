function calcularDobles(event) {
    event.preventDefault();

    let numero = parseInt(document.getElementById("numero").value);
    let veces = parseInt(document.getElementById("veces").value) || 3;

    let resultado = `Número inicial: ${numero} | Veces: ${veces}<br>`;
    let valor = numero;

    for (let i = 1; i <= veces; i++) {
        valor *= 2;
        resultado += `Doble ${i}: ${valor}<br>`;
    }

    document.getElementById("res3").innerHTML = resultado;
}
