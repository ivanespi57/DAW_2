<?php
function pedirTexto($mensaje) {
    echo $mensaje;
    return trim(fgets(STDIN));
}

function pedirNumero($mensaje) {
    echo $mensaje;
    return intval(trim(fgets(STDIN)));
}

function crearPedido(&$pedidos) {
    $num = pedirNumero("Introduce número de pedido: ");
    $cliente = pedirTexto("Nombre del cliente: ");
    $pedidos[$num] = ['cliente' => $cliente, 'platos' => []];
    echo "Pedido $num creado para $cliente.\n";
}

function anadirPlato(&$pedidos) {
    $num = pedirNumero("Número de pedido al que añadir plato: ");
    if (!isset($pedidos[$num])) {
        echo "Pedido no encontrado.\n";
        return;
    }
    $nombre = pedirTexto("Nombre del plato: ");
    $precio = floatval(pedirTexto("Precio del plato: "));
    $pedidos[$num]['platos'][] = ['nombre' => $nombre, 'precio' => $precio];
    echo "Plato '$nombre' añadido al pedido $num.\n";
}

function verPedido($pedidos) {
    $num = pedirNumero("Número de pedido a mostrar: ");
    if (!isset($pedidos[$num])) {
        echo "Pedido no encontrado.\n";
        return;
    }
    $pedido = $pedidos[$num];
    echo "Pedido $num - Cliente: {$pedido['cliente']}\n";
    $total = 0;
    foreach ($pedido['platos'] as $p) {
        echo "- {$p['nombre']} : {$p['precio']} €\n";
        $total += $p['precio'];
    }
    echo "Total: $total €\n";
}

function listarPedidos($pedidos) {
    if (empty($pedidos)) {
        echo "No hay pedidos.\n";
        return;
    }
    foreach ($pedidos as $num => $pedido) {
        echo "Pedido $num - Cliente: {$pedido['cliente']}, Platos: ".count($pedido['platos'])."\n";
    }
}

$pedidos = [];

do {
    echo "\n===== MENÚ PEDIDOS =====\n";
    echo "1. Crear pedido\n";
    echo "2. Añadir plato a un pedido\n";
    echo "3. Ver detalle de un pedido\n";
    echo "4. Listar todos los pedidos\n";
    echo "5. Salir\n";

    $op = pedirNumero("Elige una opción: ");

    switch($op) {
        case 1: crearPedido($pedidos); break;
        case 2: anadirPlato($pedidos); break;
        case 3: verPedido($pedidos); break;
        case 4: listarPedidos($pedidos); break;
        case 5: echo "Saliendo...\n"; exit;
        default: echo "Opción inválida.\n";
    }
} while(true);
?>
