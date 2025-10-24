function cifrar() {
    let texto = prompt("Introduce el texto que quieres cifrar:");
    let desplazamiento = prompt("Introduce el número de desplazamiento:");

    let cifrado = "";

    for (let i = 0; i < texto.length; i++) {
        let codigo = texto.charCodeAt(i);
        let nuevoCodigo = codigo + Number(desplazamiento);
        cifrado += String.fromCharCode(nuevoCodigo);
    }

    console.log("Tu texto \"" + texto + "\" se ha cifrado como \"" + cifrado + "\".");
}
