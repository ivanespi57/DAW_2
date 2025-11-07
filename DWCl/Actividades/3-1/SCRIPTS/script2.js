function empezar(){
    class Persona {
        static contadorPersonas = 0;

        constructor(nombre, apellido, edad) {
            Persona.contadorPersonas++;
            this._idPersona = Persona.contadorPersonas;
            this._nombre = nombre;
            this._apellido = apellido;
            this._edad = edad;
        }

        get idPersona() {
            return this._idPersona;
        }

        get nombre() {
            return this._nombre;
        }

        get apellido() {
            return this._apellido;
        }

        get edad() {
            return this._edad;
        }

        set nombre(nuevoNombre) {
            this._nombre = nuevoNombre;
        }

        set apellido(nuevoApellido) {
            this._apellido = nuevoApellido;
        }

        set edad(nuevaEdad) {
            this._edad = nuevaEdad;
        }

        toString() {
            return `Persona ${this._idPersona}: ${this._nombre} ${this._apellido}, ${this._edad} años`;
        }
    }

    class Empleado extends Persona {
        static contadorEmpleados = 0;

        constructor(nombre, apellido, edad, sueldo) {
            super(nombre, apellido, edad);
            Empleado.contadorEmpleados++;
            this._idEmpleado = Empleado.contadorEmpleados;
            this._sueldo = sueldo;
        }

        get idEmpleado() {
            return this._idEmpleado;
        }

        get sueldo() {
            return this._sueldo;
        }

        set sueldo(nuevoSueldo) {
            this._sueldo = nuevoSueldo;
        }

        toString() {
            return super.toString() + ` | Empleado ${this._idEmpleado}: Sueldo ${this._sueldo}€`;
        }
    }

    class Cliente extends Persona {
        static contadorClientes = 0;

        constructor(nombre, apellido, edad, fechaRegistro) {
            super(nombre, apellido, edad);
            Cliente.contadorClientes++;
            this._idCliente = Cliente.contadorClientes;
            this._fechaRegistro = fechaRegistro;
        }

        get idCliente() {
            return this._idCliente;
        }

        get fechaRegistro() {
            return this._fechaRegistro;
        }

        set fechaRegistro(nuevaFecha) {
            this._fechaRegistro = nuevaFecha;
        }

        toString() {
            return super.toString() + ` | Cliente ${this._idCliente}: Fecha registro ${this._fechaRegistro}`;
        }
    }

    let p1 = new Persona("Iván", "Espí", 21);
    let p2 = new Persona("Carmen", "García", 19);

    let e1 = new Empleado("Carlos", "López", 25, 1500);
    let e2 = new Empleado("Marta", "Ruiz", 30, 1800);

    let c1 = new Cliente("Ana", "Pérez", 35, "10/06/2024");
    let c2 = new Cliente("Jorge", "Martínez", 40, "02/10/2024");

    console.log(p1.toString());
    console.log(p2.toString());
    console.log(e1.toString());
    console.log(e2.toString());
    console.log(c1.toString());
    console.log(c2.toString());
}