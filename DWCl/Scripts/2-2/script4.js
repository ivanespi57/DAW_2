function crearPalabra(event) {
    event.preventDefault();

    let p1 = document.getElementById('palabra1').value.replace(/\s/g, '');
    let p2 = document.getElementById('palabra2').value.replace(/\s/g, '');
    let p3 = document.getElementById('palabra3').value.replace(/\s/g, '');

    if(p1.length < 4 || p2.length < 5 || p3.length < 6) {
        alert("Introduce palabras con las longitudes mínimas: 1ª>=4, 2ª>=5, 3ª>=6");
        return;
    }

    let inicio = p1.slice(0,2).toUpperCase();

    let midIndex = Math.floor(p2.length / 2);
    let mid2 = (p2.length % 2 === 0) ? 
        p2.slice(midIndex-1, midIndex+1).toLowerCase() : 
        p2.slice(midIndex-1, midIndex+2).toLowerCase();

    let fin = p3.slice(-2).toUpperCase();

    let nuevaPalabra = inicio + mid2 + fin;
    document.getElementById('resultado4').innerText = "Palabra resultante: " + nuevaPalabra;
}