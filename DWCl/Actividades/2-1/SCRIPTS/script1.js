
function procesar(event){
    event.preventDefault();

    let salarioAct = parseInt(document.getElementById("salarioAct").value);
    let numHijos = parseInt(document.getElementById("numHijos").value);
    let edad = parseInt(document.getElementById("ed").value);
    let salarioFin;
    const famNum = numHijos > 2;

    if(salarioAct < 1000 && edad < 30 && numHijos > 0){
        salarioFin = 1200;
        document.getElementById("res").textContent = "Resultado: " + salarioFin;
    }

    if(salarioAct < 1000 && edad < 30 && numHijos == 0){
        salarioFin = (salarioAct *= 1.05);
        
        document.getElementById("res").textContent = "Resultado: " + salarioFin;
    }

    if((edad >= 30 && edad <= 45) && salarioAct < 1250 && numHijos == 2){
        salarioFin = (salarioAct *= 1.10);

        document.getElementById("res").textContent = "Resultado: " + salarioFin;
    }

    if ((edad >= 30 && edad <= 45) && salarioAct < 1250 && famNum) {
        salarioFin = (salarioAct *= 1.15);

        document.getElementById("res").textContent = "Resultado: " + salarioFin;
    }

    if (edad > 45 && salarioAct < 2000){
        salarioFin = (salarioAct *= 1.15);

        document.getElementById("res").textContent = "Resultado: " + salarioFin;
    }
}
