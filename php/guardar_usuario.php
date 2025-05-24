<?php
include_once 'conexion.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';

$nombre = $_POST["nombre"];
$cedula = $_POST["cedula"];
$direccion = $_POST["direccion"];
$celular = $_POST["celular"];
$correo = $_POST["email"];
$clave = $_POST["contrasena"];

// Insertar los datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, cedula, direccion, celular, email, contrasena) 
        VALUES ('$nombre', '$cedula', '$direccion', '$celular', '$correo', '$clave')";

if ($conexion->query($sql) === TRUE) {
    echo "Registro exitoso.";

    // Configurar PHPMailer para enviar el correo de bienvenida
    $mail = new PHPMailer(true);
    $correoEnviado = false; // Variable para verificar si el correo se envió correctamente

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'eldiosapolo10@gmail.com';  // Usa la dirección de correo de Gmail
        $mail->Password = 'runrhestxkqnhpcx'; // Contraseña de aplicación de Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('eldiosapolo10@gmail.com', 'Tu Empresa');
        $mail->addAddress($correo, $nombre);
        $mail->Subject = '¡Bienvenido!';
        $mail->Body = "Hola $nombre,\n\nGracias por registrarte. ¡Bienvenido a nuestro sistema!\n\nSaludos,\nTu Empresa";

        $mail->send();
        echo " Correo enviado.";
        $correoEnviado = true; // Si el correo fue enviado correctamente
    } catch (Exception $e) {
        echo " Pero no se pudo enviar el correo. Error: {$mail->ErrorInfo}";
    }

    // Verificar si tanto el registro como el correo fueron exitosos
    if ($correoEnviado) {
        // Redirigir a eventos.html si todo fue exitoso
        header("Location: http://localhost:8080/hulul_software_v2/eventos.html");
            exit();
 // Detener la ejecución después de la redirección
    }

} else {
    echo "Error en la base de datos: " . $conexion->error;
}

$conexion->close();
?>
