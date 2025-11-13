const nuevoItem = document.getElementById("nuevo-item");
const agregar = document.getElementById("agregar");
const list = document.getElementById("lista");

function agregarItem(){
    const txt = nuevoItem.value.trim();

    if(txt === ""){
        alert("Por favor, escribe un producto");
        return;
    }

    const item = document.createElement("li");

    const txtSpan = document.createElement("span");
    txtSpan.innerText = txt;

    const botonEliminar = document.createElement("button");
    botonEliminar.innerText = "Eliminar";
    botonEliminar.className = "eliminar";

    botonEliminar.addEventListener("click", function(){
        list.removeChild(item);
    });

    item.appendChild(txtSpan);
    item.appendChild(botonEliminar);

    list.appendChild(item);
     
    nuevoItem.value = "";
    nuevoItem.focus();
}

agregar.addEventListener("click", agregarItem);

nuevoItem.addEventListener("keydown", function(event){
    if(event.key === "Enter"){
        agregarItem();
    }
})