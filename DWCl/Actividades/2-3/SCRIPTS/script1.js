function multi(){
    
    let num = parseFloat(prompt("Introduce un número (no entre -1 y 1):"));
    
    if (isNaN(num) || (num > -1 && num < 1)) {
        alert("Número no válido.");
    } else {
        let v = num;
        let contador = 0;
    
        while (isFinite(v)) {
            v = v * num;
            contador++;
            console.log(num + " x " + (v / num) + " = " + v);
        }
    
        console.log("Se ha llegado al infinito tras " + contador + " multiplicaciones.");
    }
}