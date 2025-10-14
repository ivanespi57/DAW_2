function procesar(event){
    event.preventDefault();

    let primera = document.getElementById("primera").value;
    let segunda = document.getElementById("segunda").value;

    if(primera == segunda){
        document.getElementById("res").textContent = "Los textos " + `"primera"` + "y" + `"segunda" son iguales`; 
    }else{
        document.getElementById("res").textContent = "Los textos " + `"primera"` + "y" + `"segunda" no son iguales`; 
    }
}