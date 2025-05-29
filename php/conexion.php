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

// La conexión a la base de datos está lista para usarse
?>
