function dibujarTabla(event) {
    event.preventDefault();
    
    const filas = parseInt(document.getElementById('filas').value);
    const columnas = parseInt(document.getElementById('columnas').value);
    const nombre = "Ivan"; 

    let tabla = "<table border='1'>";
    for(let i = 0; i < filas; i++) {
        tabla += "<tr>";
        for(let j = 0; j < columnas; j++) {
            tabla += "<td>" + nombre + "</td>";
        }
        tabla += "</tr>";
    }
    tabla += "</table>";

    document.getElementById('tabla').innerHTML = tabla;
}