
function proces(){
    const formulario = document.getElementById("form").innerHTML;
    const result = document.getElementById("result").innerHTML;
    let salarioAct = document.getElementById("salarioAct").innerHTML;
    let numHijos;
    let nombre = document.getElementById("nom").value;
    let edad;
    let salarioFin;

    document.getElementById("Nombre").innerHTML = nombre;

    let mensaje;
    mensaje = nombre;

    document.getElementById("res").textContent = mensaje;
}
