function generarCadenas(event) {
    event.preventDefault();

    let base = document.getElementById('base6').value;
    let num = parseInt(document.getElementById('num6').value);

    let vacias = 0;
    let resultado = "";

    for (let i = 0; i < num; i++) {
        let longitud = Math.floor(Math.random() * 11); 
        if (longitud === 0) {
            resultado += '"" ';
            vacias++;
        } else {
            let cadena = "";
            for (let j = 0; j < longitud; j++) {
                let indice = Math.floor(Math.random() * base.length);
                cadena += base[indice];
            }
            resultado += cadena + " ";
        }
    }

    resultado += "\nNúmero de cadenas vacías: " + vacias;
    document.getElementById('resultado6').innerText = resultado;
}