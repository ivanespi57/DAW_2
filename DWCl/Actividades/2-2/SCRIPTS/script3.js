function procesar() {
    let c1 = prompt("Introduce la primera cadena:");
    let c2 = prompt("Introduce la segunda cadena:");
    let cadena = "";

    if (c1.length > c2.length) {
        cadena = c1;
    } else if (c2.length > c1.length) {
        cadena = c2;
    } else {
        cadena = c1;
    }

    alert('Trabajamos sobre la cadena: "' + cadena + '"');

    let sinRepetir = "";

    for (let i = 0; i < cadena.length; i++) {
        let caracter = cadena[i];
        if (!sinRepetir.includes(caracter)) {
            sinRepetir += caracter;
        }
    }

    let resultadoFinal = sinRepetir.split("").join(", ");
    alert("Caracteres sin repetir: " + resultadoFinal);
}
