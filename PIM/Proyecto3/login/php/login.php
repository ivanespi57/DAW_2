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
    echo json_encode(["success" => false, "message" => "Error DB: " . $conn->connect_error]);
    exit;
}

// 2. Recibir JSON
$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data["user"], $data["pass"])) {
    echo json_encode(["success" => false, "message" => "Datos inválidos"]);
    exit;
}

$user = $data["user"];
$pass = $data["pass"];

// 3. Buscar usuario
$sql = $conn->prepare("SELECT password, codigo FROM usuarios WHERE user = ?");
$sql->bind_param("s", $user);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows === 0) {
    echo json_encode(["success" => false, "message" => "Usuario no encontrado"]);
    exit;
}

$row = $result->fetch_assoc();

// 4. Verificar contraseña
if (!password_verify($pass, $row["password"])) {
    echo json_encode(["success" => false, "message" => "Contraseña incorrecta"]);
    exit;
}

// 5. LOGIN CORRECTO
$_SESSION["user"] = $user;
$_SESSION["autenticado"] = true;

echo json_encode([
    "success" => true,
    "message" => "Login correcto"
]);
exit;

?>
