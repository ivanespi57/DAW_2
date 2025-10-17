function cifrar() {
    event.preventDefault();
    
    let texto = document.getElementById("texto").value;
    let desplazamiento = document.getElementById("desplazamiento").value;

    if (desplazamiento === "" || isNaN(desplazamiento)) {
    document.getElementById("resultado").textContent = "Introduce un número válido.";
    return;
    }

    desplazamiento = Math.trunc(Number(desplazamiento));

    let cifrado = "";

    for (let i = 0; i < texto.length; i++) {
    let codigo = texto.charCodeAt(i);
    let nuevoCodigo = codigo + desplazamiento;
    cifrado += String.fromCharCode(nuevoCodigo);
    }

    document.getElementById("resultado").textContent =
    `Tu texto "${texto}" se ha cifrado como "${cifrado}"`;
    
}