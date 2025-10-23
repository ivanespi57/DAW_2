function convertirBase() {
    let numTexto = document.getElementById("numBase").value.trim();
    let result = document.getElementById("resultBase");
    let num;

    if (numTexto.startsWith("0b")) {
        num = parseInt(numTexto, 2);
    } else if (numTexto.startsWith("0o")) {
        num = parseInt(numTexto, 8);
    } else if (numTexto.startsWith("0x")) {
        num = parseInt(numTexto, 16);
    } else {
        num = parseInt(numTexto, 10);
    }

    if (isNaN(num) || num < 0) {
        resultBase.innerHTML = "Número no válido o negativo.";
        return;
    }

    document.getElementById("resultBase").innerHTML =
        "Número introducido: " + numTexto + "<br>" +
        "Decimal: " + num + "<br>" +
        "Binario: 0b" + num.toString(2) + "<br>" +
        "Octal: 0o" + num.toString(8) + "<br>" +
        "Hexadecimal: 0x" + num.toString(16).toUpperCase();
}
