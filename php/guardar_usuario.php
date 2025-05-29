<?php
// Iniciar la sesión para manejar el mensaje
session_start();

// Incluir la conexión
include_once 'conexion.php';

// Configuración de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';

// Obtener los datos del formulario
$nombre = $_POST["nombre"];
$cedula = $_POST["cedula"];
$direccion = $_POST["direccion"];
$celular = $_POST["celular"];
$correo = $_POST["email"];
$clave = $_POST["contrasena"];

// Verificar si el correo ya está registrado
$sql_check = "SELECT * FROM usuarios WHERE email = '$correo'";
$result_check = $conexion->query($sql_check);

if ($result_check->num_rows > 0) {
    // El correo ya está registrado
    $_SESSION['mensaje_error'] = "El correo electrónico ya está registrado. Por favor, utiliza otro correo.";
    header("Location: ../formulario_registro.html");
    exit();
} else {
    // Insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, cedula, direccion, celular, email, contrasena) 
            VALUES ('$nombre', '$cedula', '$direccion', '$celular', '$correo', '$clave')";

    if ($conexion->query($sql) === TRUE) {
        echo "Registro exitoso.";

        // Configuración de PHPMailer para enviar el correo de bienvenida
        $mail = new PHPMailer(true);
        $correoEnviado = false;

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'eldiosapolo10@gmail.com';
            $mail->Password = 'runrhestxkqnhpcx';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('eldiosapolo10@gmail.com', 'Hulul Software');
            $mail->addAddress($correo, $nombre);
            $mail->Subject = '¡Bienvenido a Hulul Software!';

            // Cuerpo del mensaje
            $mail->Body = "Tu mensaje de bienvenida en HTML";

            $mail->isHTML(true);

            // Enviar el correo
            $mail->send();
            echo " Correo enviado.";
            $correoEnviado = true;
        } catch (Exception $e) {
            echo "Error: {$mail->ErrorInfo}";
        }

        if ($correoEnviado) {
            header("Location: https://hulul-software.onrender.com/eventos.html");
            exit();
        }

    } else {
        echo "Error en la base de datos: " . $conexion->error;
    }
}

$conexion->close();
?>
