function introPalab() {
    let palabras = [];
    let palabra = prompt("Escribe una palabra (deja vacío o cancela para salir):");

    while (palabra !== null && palabra.trim() !== "") {
        palabras.push(palabra.trim());
        palabra = prompt("Escribe otra (deja vacío o cancela para salir):");
    }

    let limpias = [];

    for (let i = 0; i < palabras.length; i++) {
        let p = palabras[i];

        let tieneNumero = false;
        for (let letra of p) {
            if (letra >= "0" && letra <= "9") {
                tieneNumero = true;
                break;
            }
        }

        let tieneEspacio = p.includes(" ");

        if (!tieneNumero && !tieneEspacio) {
            limpias.push(p);
        }
    }

    limpias.sort();
    limpias.reverse();

    for (let i = 0; i < limpias.length; i++) {
        console.log("El elemento " + (i + 1) + " es: " + limpias[i]);
    }
}
