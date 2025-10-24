function crearPalabra() {
    let p1 = prompt("Introduce la primera palabra (mín 4 letras):").replace(/\s/g, '');
    let p2 = prompt("Introduce la segunda palabra (mín 5 letras):").replace(/\s/g, '');
    let p3 = prompt("Introduce la tercera palabra (mín 6 letras):").replace(/\s/g, '');

    if (!p1 || !p2 || !p3) {
        console.log("Operación cancelada.");
        return;
    }

    if(p1.length < 4 || p2.length < 5 || p3.length < 6) {
        console.log("Error: Introduce palabras con las longitudes mínimas: 1ª>=4, 2ª>=5, 3ª>=6");
        return;
    }

    let inicio = p1.slice(0,2).toUpperCase();

    let midIndex = Math.floor(p2.length / 2);
    let mid2 = (p2.length % 2 === 0) ? 
        p2.slice(midIndex-1, midIndex+1).toLowerCase() : 
        p2.slice(midIndex-1, midIndex+2).toLowerCase();

    let fin = p3.slice(-2).toUpperCase();

    let nuevaPalabra = inicio + mid2 + fin;

    console.log("Palabra resultante: " + nuevaPalabra);
}

