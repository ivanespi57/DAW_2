function contarCaracter(event) {
    event.preventDefault();

    let texto = document.getElementById('texto5').value;
    let char = document.getElementById('char5').value;

    let contador = 0;
    for (let i = 0; i < texto.length; i++) {
        if (texto[i] === char) {
            contador++;
        }
    }

    document.getElementById('resultado5').innerText =
        "El carácter '" + char + "' aparece " + contador + " veces.";
}