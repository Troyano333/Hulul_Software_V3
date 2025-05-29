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

// Configurar la codificación de caracteres para evitar problemas con caracteres especiales
$conexion->set_charset("utf8");
?>
