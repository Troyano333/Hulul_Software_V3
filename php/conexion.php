<?php
date_default_timezone_set("America/Bogota");

// Configuración de la base de datos PostgreSQL
$host = "dpg-d0sci38dl3ps73d4hh20-a"; // El host proporcionado por Render
$username = "root"; // Tu usuario (usualmente proporcionado por Render)
$password = ""; // Deja la contraseña vacía si no tienes una
$database = "trabajando_db"; // Nombre de la base de datos

// Crear la conexión usando PDO para PostgreSQL
try {
    $dsn = "pgsql:host=$host;port=5432;dbname=$database"; // Usamos el puerto 5432 para PostgreSQL
    $conexion = new PDO($dsn, $username, $password); // Deja la contraseña vacía
    // Configurar el manejo de errores
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Configuración de la codificación de caracteres
    $conexion->exec("SET NAMES 'UTF8'");
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Si la conexión fue exitosa, continúa con la lógica de la aplicación
?>
