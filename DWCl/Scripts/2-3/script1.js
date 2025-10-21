function multi(event){
    event.preventDefault();
    
    let num = parseFloat(document.getElementById("num").value); 
    
    if (num === 1 || num === 0 || num === -1) {
        document.getElementById("result").innerHTML = "No puedes usar 1, 0 ni -1.";
        return;
    }

    let contador = 0;
    let v = num;

    while(v < Infinity){
        let x = v;
        v = v * num;
        contador++;
        
        document.getElementById("result").innerHTML = num + " x " + x + " = " + v + "<br>Se ha multiplicado " + contador + " veces.";
    }

}
    
        
