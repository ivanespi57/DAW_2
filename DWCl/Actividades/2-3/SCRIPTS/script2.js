function calcularCuenta() {
  const IVA = 0.10;
  const DESCUENTO = 0.15;

  const MENU1 = 12.5;
  const MENU2 = 18.75;
  const MENU3 = 25;
  const MENU_NINOS = 8;

  let total = parseInt(prompt("Número total de comensales:"));
  let mayores = parseInt(prompt("Número de mayores de 65 años:"));
  let ninos = parseInt(prompt("Número de niños:"));

  if (isNaN(total) || total <= 0) {
    console.log("Introduce un número de comensales válido.");
    return;
  }

  if (mayores + ninos > total) {
    console.log("La suma de mayores y niños no puede superar el total.");
    return;
  }

  let adultos = total - ninos;

  let m1 = parseInt(prompt("Número de menús tipo 1 (precio " + MENU1 + " €):"));
  let m2 = parseInt(prompt("Número de menús tipo 2 (precio " + MENU2 + " €):"));
  let m3 = parseInt(prompt("Número de menús tipo 3 (precio " + MENU3 + " €):"));


  if (m1 + m2 + m3 !== adultos) {
    console.log("La suma de menús de adultos no coincide con el número de adultos.");
    return;
  }

  let precioAdultos = (m1 * MENU1) + (m2 * MENU2) + (m3 * MENU3);
  let precioNinos = ninos * MENU_NINOS;

  let mayoresRestantes = mayores;
  let descuento = 0;

  let d1 = Math.min(mayoresRestantes, m1);
  descuento += d1 * MENU1 * DESCUENTO;
  mayoresRestantes -= d1;

  let d2 = Math.min(mayoresRestantes, m2);
  descuento += d2 * MENU2 * DESCUENTO;
  mayoresRestantes -= d2;

  let d3 = Math.min(mayoresRestantes, m3);
  descuento += d3 * MENU3 * DESCUENTO;

  let subtotal = (precioAdultos + precioNinos) - descuento;
  let totalConIVA = subtotal * (1 + IVA);

  console.log("           FACTURA FINAL         ");
  console.log("================================");
  console.log(" Total comensales: " + total);
  console.log("   Adultos: " + adultos);
  console.log("   Mayores de 65: " + mayores);
  console.log("   Niños: " + ninos);
  console.log("--------------------------------");
  console.log("  Menú tipo 1 (" + m1 + " uds) ........ " + (m1 * MENU1).toFixed(2) + " €");
  console.log("  Menú tipo 2 (" + m2 + " uds) ........ " + (m2 * MENU2).toFixed(2) + " €");
  console.log("  Menú tipo 3 (" + m3 + " uds) ........ " + (m3 * MENU3).toFixed(2) + " €");
  console.log(" Menú infantil (" + ninos + " uds) ..... " + (precioNinos).toFixed(2) + " €");
  console.log("--------------------------------");
  console.log(" Descuento mayores ............. -" + descuento.toFixed(2) + " €");
  console.log("--------------------------------");
  console.log("Subtotal ......................... " + subtotal.toFixed(2) + " €");
  console.log("IVA (10%) ........................ " + (subtotal * IVA).toFixed(2) + " €");
  console.log("================================");
  console.log(" TOTAL A PAGAR: " + totalConIVA.toFixed(2) + " €");
}