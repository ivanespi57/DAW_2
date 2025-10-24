function convertirBase() {
    let entrada = prompt("Introduce un número con su prefijo:\n- 0b para binario\n- 0o para octal\n- 0x para hexadecimal\n- sin prefijo para decimal\n\nEjemplo: 0o123");

    if (!entrada) {
    console.log("No has introducido ningún valor.");
    return;
    }

    let base = 10;
    let valorDecimal;

    if (entrada.startsWith("0b")) {
    base = 2;
    valorDecimal = parseInt(entrada, 2);
    } else if (entrada.startsWith("0o")) {
    base = 8;
    valorDecimal = parseInt(entrada, 8);
    } else if (entrada.startsWith("0x")) {
    base = 16;
    valorDecimal = parseInt(entrada, 16);
    } else {
    valorDecimal = parseInt(entrada, 10);
    }

    if (isNaN(valorDecimal) || valorDecimal < 0) {
    console.log("Número no válido. Debe ser positivo y tener el formato correcto.");
    return;
    }

    let binario = "0b" + valorDecimal.toString(2);
    let octal = "0o" + valorDecimal.toString(8);
    let hexadecimal = "0x" + valorDecimal.toString(16).toUpperCase();
    let decimal = valorDecimal.toString(10);

    console.log("       CONVERSIÓN DE BASES      ");
    console.log("================================");
    console.log("Número introducido: " + entrada);
    console.log("Base detectada: " + base);
    console.log("--------------------------------");
    console.log(" Decimal: " + decimal);
    console.log("  Binario: " + binario);
    console.log(" Octal: " + octal);
    console.log(" Hexadecimal: " + hexadecimal);
    console.log("================================");
}