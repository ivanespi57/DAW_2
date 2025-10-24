function convertirBase() {
    let entrada = prompt("Introduce un número con su prefijo:\n- 0b para binario\n- 0o para octal\n- 0x para hexadecimal\n- sin prefijo para decimal\n\nEjemplo: 0o123");

    if (!entrada) {
        console.log("No has introducido ningún valor.");
        return;
    }

    let valorDecimal;

    if (entrada.startsWith("0b")) {
        valorDecimal = parseInt(entrada.slice(2), 2);
    } else if (entrada.startsWith("0o")) {
        valorDecimal = parseInt(entrada.slice(2), 8);
    } else if (entrada.startsWith("0x")) {
        valorDecimal = parseInt(entrada.slice(2), 16);
    } else {
        valorDecimal = parseInt(entrada, 10);
    }

    if (isNaN(valorDecimal) || valorDecimal < 0) {
        console.log("Número no válido. Debe ser positivo y tener el formato correcto.");
        return;
    }

    console.log("====== CONVERSIÓN DE BASES ======");
    console.log("Número introducido: " + entrada);
    console.log("---------------------------------");
    console.log("Decimal: " + valorDecimal);
    console.log("Binario: " + valorDecimal.toString(2));
    console.log("Octal: " + valorDecimal.toString(8));
    console.log("Hexadecimal: " + valorDecimal.toString(16).toUpperCase());
    console.log("=================================");
}
