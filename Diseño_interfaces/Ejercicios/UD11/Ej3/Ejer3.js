const form = document.getElementById("formulario");
const nombre = document.getElementById("nombre");
const email = document.getElementById("email");
const err = document.getElementById("errores");

form.addEventListener("submit", function(){
    event.preventDefault();

    err.innerHTML = "";

    let siErr = false;

    if(nombre.value.trim().length < 2){
        err.innerHTML += "<p>El nombre debe tener al menos 2 caractéres</p>";
        siErr = true;
    }

    if(!email.value.includes("@")){
        err.innerHTML += "<p>El emil debe tener @</p>";
        siErr = true;
    }

    if(nombre.value.trim() === "" || email.value.trim() === ""){
        err.innerHTML += "<p>Todos los campos son obligatorios</p>";
        siErr = true;
    }

    if(!siErr){
        err.innerHTML = "<p class='exito'>Formulario válido</p>";
        form.reset();
    }
});