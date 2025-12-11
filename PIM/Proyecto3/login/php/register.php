<?php
session_start();
header("Content-Type: application/json");

// 1. Conexión DB
$servername = "localhost";
$username   = "ivan";
$password   = "1234";
$dbname     = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Error DB: ".$conn->connect_error]);
    exit;
}

// 2. Recibir JSON
$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data["user"], $data["pass"])) {
    echo json_encode(["success" => false, "message" => "Datos incompletos"]);
    exit;
}

$user = $data["user"];
$pass = $data["pass"];

// 3. Generar el código automáticamente (base36)
$ref = microtime(true) * 10000;
$digits = str_split("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ");
$base = count($digits);
$output = "";

while ($ref > 0) {
    $output .= $digits[$ref % $base];
    $ref = floor($ref / $base);
}
$codigo = strrev($output);

// 4. Comprobar usuario existente
$check = $conn->prepare("SELECT user FROM usuarios WHERE user = ?");
$check->bind_param("s", $user);
$check->execute();
$res = $check->get_result();

if ($res->num_rows > 0) {
    echo json_encode(["success" => false, "message" => "El usuario ya existe"]);
    exit;
}

// 5. Encriptar contraseña
$hash = password_hash($pass, PASSWORD_DEFAULT);

// 6. Insertar usuario
$sql = $conn->prepare("INSERT INTO usuarios (user, password, codigo) VALUES (?, ?, ?)");
$sql->bind_param("sss", $user, $hash, $codigo);

if ($sql->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Registrado correctamente",
        "codigo"  => $codigo // <-- Devuelvo el código generado
    ]);
} else {
    echo json_encode(["success" => false, "message" => "Error BD: " . $conn->error]);
}
exit;
?>
