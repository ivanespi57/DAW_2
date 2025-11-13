const tit = document.getElementById("titulo");
tit.innerText = "Hola Mundo!";

const descripcion = document.querySelector(".descripcion");
descripcion.innerText = "Texto modificado con JavaScript";

tit.style.color = "blue";

const boton = document.getElementById("cambiar");

boton.addEventListener("click", function(){
    if(tit.style.color === "blue"){
        tit.style.color = "red";
        tit.innerText = "Texto cambiado!";
    }else{
        tit.style.color = "blue";
        tit.innerText = "Hola Mundo!";
    }
});
