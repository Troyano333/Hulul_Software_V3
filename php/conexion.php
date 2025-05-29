<?php
date_default_timezone_set("America/Bogota");

// Configuración de la base de datos
$host = "dpg-d0sci38dl3ps73d4hh20-a"; // El host proporcionado por Render
$username = "root"; // Tu usuario
$password = ""; // Tu contraseña (vacía si no tienes)
$database = "trabajando_db"; // Nombre de la base de datos

// Crear la conexión usando PDO
try {
    $dsn = "mysql:host=$host;dbname=$database";
    $conexion = new PDO($dsn, $username, $password);
    // Configurar el manejo de errores
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Configuración de la codificación de caracteres
    $conexion->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Consultar fechas
$consulta = $conexion->query("SELECT DISTINCT fecha FROM reservas");
$fechas = [];

// Almacenar las fechas obtenidas en un array
while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $fechas[] = $fila['fecha'];
}

// Establecer el tipo de contenido a JSON
header('Content-Type: application/json');

// Enviar las fechas en formato JSON
echo json_encode($fechas);

// Cerrar la conexión
$conexion = null;
?>
