function empezar() {

    class Punto {
        constructor(nombre, x, y) {
            this.nombre = nombre;
            this.x = x;
            this.y = y;
        }

        mostrar() {
            alert(`Las coordenadas de "${this.nombre}" son (${this.x}, ${this.y})`);
        }

        copiar(nuevoNombre) {
            return new Punto(nuevoNombre, this.x, this.y);
        }

        cambiar(x, y) {
            this.x = x;
            this.y = y;
        }

        static iguales(p1, p2) {
            return p1.x === p2.x && p1.y === p2.y;
        }

        static sumar(p1, p2, nombre) {
            return new Punto(nombre, p1.x + p2.x, p1.y + p2.y);
        }

        static distancia(p1, p2) {
            let dx = p2.x - p1.x;
            let dy = p2.y - p1.y;
            return Math.sqrt(dx * dx + dy * dy);
        }
    }

    let x1 = prompt("Introduce la coordenada X del punto1 (entre -6 y 6):");
    if (x1 === null){
         return alert("Has cancelado. El programa NO seguirá.");
    }
    let y1 = prompt("Introduce la coordenada Y del punto1 (entre -6 y 6):");
    if (y1 === null){
         return alert("Has cancelado. El programa NO seguirá.");
    }

    x1 = parseInt(x1);
    y1 = parseInt(y1);

    if (isNaN(x1) || isNaN(y1) || x1 < -6 || x1 > 6 || y1 < -6 || y1 > 6) {
        alert("Valor fuera de rango o incorrecto. Programa detenido.");
        return;
    }

    let punto1 = new Punto("punto1", x1, y1);
    punto1.mostrar();

    let punto2 = punto1.copiar("punto2");
    punto2.mostrar();

    let cambiar = confirm("¿Quieres cambiar las coordenadas del punto2?");

    if (cambiar) {
        let x2 = prompt("Nueva coordenada X para punto2:");
        if (x2 === null){
            return alert("Has cancelado. Programa detenido.");
        }
        let y2 = prompt("Nueva coordenada Y para punto2:");
        if (y2 === null){
            return alert("Has cancelado. Programa detenido.");
        }

        x2 = parseInt(x2);
        y2 = parseInt(y2);
        punto2.cambiar(x2, y2);
        alert(`Nuevas coordenadas del punto2:\n(${punto2.x}, ${punto2.y})`);

        if (Punto.iguales(punto1, punto2)) {
            let xAleatorio = Math.floor(Math.random() * 13) - 6;
            let yAleatorio = Math.ceil(Math.random() * 13) - 6;
            let punto3 = Punto.sumar(punto1, new Punto("", xAleatorio, yAleatorio), "punto3");
            alert(`Como los puntos eran iguales, se ha creado el punto3:\n(${punto3.x}, ${punto3.y})`);
            let d = Punto.distancia(punto1, punto3).toFixed(2);
            alert(`La distancia entre ${punto1.nombre} y ${punto3.nombre} es ${d}`);
        } else {
            let d = Punto.distancia(punto1, punto2).toFixed(2);
            alert(`La distancia entre ${punto1.nombre} y ${punto2.nombre} es ${d}`);
        }

    } else {
        let xAleatorio = Math.floor(Math.random() * 13) - 6;
        let yAleatorio = Math.ceil(Math.random() * 13) - 6;
        let punto3 = Punto.sumar(punto1, new Punto("", xAleatorio, yAleatorio), "punto3");
        alert(`No se modificó punto2. Se ha creado el punto3:\n(${punto3.x}, ${punto3.y})`);
        let d = Punto.distancia(punto1, punto3).toFixed(2);
        alert(`La distancia entre ${punto1.nombre} y ${punto3.nombre} es ${d}`);
    }
}
