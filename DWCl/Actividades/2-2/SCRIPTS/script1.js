function procesar() {
    let primera = prompt("Escribe la primera cadena de texto:");
    let segunda = prompt("Escribe la segunda cadena de texto:");

    if (primera === null || segunda === null) {
        console.log("Operación cancelada por el usuario.");
        return;
    }

    if (primera === segunda) {
        alert("Los textos \"" + primera + "\" y \"" + segunda + "\" son iguales.");
    } else {
        alert("Los textos \"" + primera + "\" y \"" + segunda + "\" no son iguales.");
    }
}

