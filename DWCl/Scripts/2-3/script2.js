function calcularCuenta() {
  const iva = 0.10;
  const descuentoMayores = 0.15;

  const menu1 = 12.50;
  const menu2 = 18.75;
  const menu3 = 25.00;
  const menuNino = 8.00;

  // Obtener datos
  const total = parseInt(document.getElementById("total").value);
  const mayores = parseInt(document.getElementById("mayores").value);
  const ninos = parseInt(document.getElementById("ninos").value);
  const menu1Adultos = parseInt(document.getElementById("menu1").value);
  const menu2Adultos = parseInt(document.getElementById("menu2").value);

  const resultado = document.getElementById("resultado");

  // Validar datos
  if (isNaN(total) || total <= 0) {
    resultado.innerHTML = "⚠️ Introduce el número total de comensales.";
    return;
  }

  if (mayores + ninos > total) {
    resultado.innerHTML = "❌ Error: la suma de mayores y niños no puede superar el total.";
    return;
  }

  const adultos = total - ninos;
  const menu3Adultos = adultos - (menu1Adultos + menu2Adultos);

  if (menu3Adultos < 0) {
    resultado.innerHTML = "❌ Error: has elegido más menús de adultos que los que hay.";
    return;
  }

  // Calcular descuento (siguiendo el orden menú 1 -> 2 -> 3)
  let descuentoTotal = 0;
  let mayoresRestantes = mayores;

  const menus = [
    { precio: menu1, cantidad: menu1Adultos },
    { precio: menu2, cantidad: menu2Adultos },
    { precio: menu3, cantidad: menu3Adultos }
  ];

  for (let m of menus) {
    if (mayoresRestantes > 0) {
      let aplicados = Math.min(m.cantidad, mayoresRestantes);
      descuentoTotal += aplicados * m.precio * descuentoMayores;
      mayoresRestantes -= aplicados;
    }
  }

  // Calcular totales
  let totalSinIVA =
    (menu1Adultos * menu1) +
    (menu2Adultos * menu2) +
    (menu3Adultos * menu3) +
    (ninos * menuNino) -
    descuentoTotal;

  let totalIVA = totalSinIVA * iva;
  let totalConIVA = totalSinIVA + totalIVA;

  resultado.innerHTML = `
    <h3>💰 FACTURA FINAL</h3>
    <p>Total comensales: ${total}</p>
    <p>Adultos: ${adultos} | Niños: ${ninos}</p>
    <p>Menú del Día (${menu1Adultos}): ${(menu1Adultos * menu1).toFixed(2)} €</p>
    <p>Menú Especial (${menu2Adultos}): ${(menu2Adultos * menu2).toFixed(2)} €</p>
    <p>Menú Premium (${menu3Adultos}): ${(menu3Adultos * menu3).toFixed(2)} €</p>
    <p>Menú Infantil (${ninos}): ${(ninos * menuNino).toFixed(2)} €</p>
    <hr>
    <p>Descuento mayores: -${descuentoTotal.toFixed(2)} €</p>
    <p>Subtotal sin IVA: ${totalSinIVA.toFixed(2)} €</p>
    <p>IVA (10%): ${totalIVA.toFixed(2)} €</p>
    <h2>TOTAL A PAGAR: ${totalConIVA.toFixed(2)} €</h2>
  `;
}
