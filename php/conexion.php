<?php
date_default_timezone_set("America/Bogota");

// Configuración de la base de datos PostgreSQL
$host = "dpg-d0sci38dl3ps73d4hh20-a"; // El host proporcionado por Render
$username = "trabajando_db_user"; // El nombre de usuario proporcionado
$password = "zLqUK4eqdnHtfSSqW7EpjSxVYIyiqYL2"; // La contraseña proporcionada
$database = "trabajando_db"; // Nombre de la base de datos

// Crear la conexión usando PDO para PostgreSQL
try {
    $dsn = "pgsql:host=$host;port=5432;dbname=$database"; // Usamos el puerto 5432 para PostgreSQL
    $conexion = new PDO($dsn, $username, $password); // Usamos el nombre de usuario y la contraseña proporcionados
    // Configurar el manejo de errores
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Configuración de la codificación de caracteres
    $conexion->exec("SET NAMES 'UTF8'");
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Si la conexión fue exitosa, continúa con la lógica de la aplicación
?>
