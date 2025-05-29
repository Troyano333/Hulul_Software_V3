<?php
// Conexión a la base de datos en Render
$host = "dpg-d0sci38dl3ps73d4hh20-a"; // Host proporcionado por Render
$username = "root"; // Tu usuario
$password = ""; // Tu contraseña (vacía si no tienes)
$database = "trabajando_db"; // Nombre de la base de datos

$conexion = new mysqli($host, $username, $password, $database);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consultar las fechas distintas
$consulta = $conexion->query("SELECT DISTINCT fecha FROM reservas");
$fechas = [];

// Almacenar las fechas obtenidas en un array
while ($fila = $consulta->fetch_assoc()) {
    $fechas[] = $fila['fecha'];
}

// Establecer el tipo de contenido a JSON
header('Content-Type: application/json');

// Enviar las fechas en formato JSON
echo json_encode($fechas);

// Cerrar la conexión
$conexion->close();
?>
