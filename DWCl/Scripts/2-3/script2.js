function calcularCuenta() {
  const iva = 0.10;
  const descuento = 0.15;

  const menu1 = 12.5;
  const menu2 = 18.75;
  const menu3 = 25;
  const menuNino = 8;

  let total = parseInt(prompt("Número total de comensales:"));
  let mayores = parseInt(prompt("Número de adultos:"));
  let ninos = parseInt(prompt("Número de niños:"));
  let m1 = parseInt(prompt("Número de menús tipo 1 (adultos):"));
  let m2 = parseInt(prompt("Número de menús tipo 2 (adultos):"));

  if (isNaN(total) || total <= 0) {
    console.log("Introduce un número de comensales válido.");
    return;
  }

  if (mayores + ninos > total) {
    console.log("La suma de mayores y niños no puede superar el total.");
    return;
  }

  let adultos = total - ninos;
  let m3 = adultos - (m1 + m2);


  if (m3 < 0) {
    console.log("Has puesto más menús de los que hay adultos.");
    return;
  }

  let precioAdultos = (m1 * menu1) + (m2 * menu2) + (m3 * menu3);
  let descuentoTotal = mayores * ((precioAdultos / adultos) * descuento);
  let subtotal = precioAdultos + (ninos * menuNino) - descuentoTotal;
  let totalConIVA = subtotal * (1 + iva);

  console.log("Total comensales: " + total);
  console.log("Adultos: " + adultos + " | Niños: " + ninos);
  console.log("Subtotal: " + subtotal.toFixed(2) + " €");
  console.log("IVA (10%): " + (subtotal * iva).toFixed(2) + " €");
  console.log("Total a pagar: " + totalConIVA.toFixed(2) + " €");
}