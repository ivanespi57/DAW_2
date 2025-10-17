function procesar() {
    let c1 = document.getElementById("cadena1").value;
    let c2 = document.getElementById("cadena2").value;
    let cadena = "";

    if (c1.length > c2.length) {
        cadena = c1;
    } else if (c2.length > c1.length) {
        cadena = c2;
    } else {
        cadena = c1;
    }

    document.getElementById("resultado").innerHTML = `Trabajamos sobre la cadena: "<b>${cadena}</b>"<br>`;

    let sinRepetir = "";

    for (let i = 0; i < cadena.length; i++) {
        let caracter = cadena[i];

        if (!sinRepetir.includes(caracter)) {
            sinRepetir += caracter;
        }
    }

    let resultadoFinal = sinRepetir.split("").join(", ");

    document.getElementById("resul").innerHTML += `Caracteres sin repetir: ${resultadoFinal}`;
}