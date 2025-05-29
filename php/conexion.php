<?php
// Configuración de la base de datos
$host = "dpg-d0sci38dl3ps73d4hh20-a"; // El host proporcionado por Render
$username = "root"; // Tu usuario
$password = ""; // Tu contraseña (vacía si no tienes)
$database = "trabajando_db"; // Nombre de la base de datos

// Conexión con MySQL usando mysqli
$conexion = new mysqli($host, $username, $password, $database);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar fechas
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
