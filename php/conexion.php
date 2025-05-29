<?php
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
    echo "Conexión exitosa!";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
