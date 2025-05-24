<?php
date_default_timezone_set("America/Bogota");

// Conexión
$conexion = new mysqli("localhost", "root", "", "trabajando_db");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Verificar datos obligatorios
if (
    !isset($_POST['nombre'], $_POST['apellido'], $_POST['zonaSeleccionada'], $_POST['email'], $_POST['telefono'], $_POST['eventoSeleccionado'], $_POST['fechaEvento'], $_POST['horaEvento'], $_POST['lugar'])
) {
    die("error: Faltan datos obligatorios.");
}

// Obtener datos y sanitizar
$nombre = $conexion->real_escape_string($_POST['nombre']);
$apellido = $conexion->real_escape_string($_POST['apellido']);
$tipo_palco = $conexion->real_escape_string($_POST['zonaSeleccionada']);
$email = $conexion->real_escape_string($_POST['email']);
$telefono = $conexion->real_escape_string($_POST['telefono']);
$evento = $conexion->real_escape_string($_POST['eventoSeleccionado']);
$fecha = $conexion->real_escape_string($_POST['fechaEvento']);
$hora = $conexion->real_escape_string($_POST['horaEvento']);
$lugar = $conexion->real_escape_string($_POST['lugar']);

// Validar que la fecha y hora no sean pasadas
$fecha_actual = date("Y-m-d");
$hora_actual = date("H:i");
if ($fecha < $fecha_actual || ($fecha == $fecha_actual && $hora <= $hora_actual)) {
    die("error: No puedes reservar para una fecha y hora pasada.");
}

// Verificar si existe reserva para fecha, hora, lugar y tipo de palco
$verificar = $conexion->prepare("SELECT COUNT(*) FROM reservas WHERE fecha_reserva = ? AND hora_reserva = ? AND lugar = ? AND tipo_palco = ?");
if ($verificar === false) {
    die('Error en la consulta SQL de verificación: ' . $conexion->error);
}

$verificar->bind_param("ssss", $fecha, $hora, $lugar, $tipo_palco);
$verificar->execute();
$verificar->bind_result($count);
$verificar->fetch();
$verificar->close();

if ($count > 0) {
    die("error: Ya existe una reserva en esa fecha, hora, lugar y tipo de palco.");
}

// Insertar reserva
$stmt = $conexion->prepare("INSERT INTO reservas (nombre, apellido, tipo_palco, email, telefono, fecha_reserva, hora_reserva, lugar, evento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    die('Error en la consulta SQL de inserción: ' . $conexion->error);
}

$stmt->bind_param("sssssssss", $nombre, $apellido, $tipo_palco, $email, $telefono, $fecha, $hora, $lugar, $evento);

if ($stmt->execute()) {
    // Redirigir con datos para confirmación
    header("Location: ../confirmacion_pago.html?nombre=" . urlencode($nombre) .
        "&apellido=" . urlencode($apellido) .
        "&evento=" . urlencode($evento) .
        "&fecha=" . urlencode($fecha) .
        "&hora=" . urlencode($hora) .
        "&lugar=" . urlencode($lugar) .
        "&palco=" . urlencode($tipo_palco));
    exit;
} else {
    die("error: " . $stmt->error);
}

$stmt->close();
$conexion->close();
?>
