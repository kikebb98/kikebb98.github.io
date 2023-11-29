<?php
// Conexión a la base de datos (ajusta según tu configuración)
$conexion = new mysqli("localhost", "root", "", "tiendadeportiva");

// Verifica si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $producto = $_POST['producto'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    // Inserta el pedido en la base de datos
    $sql = "INSERT INTO pedidos (nombre_producto, correo_comprador, nombre_comprador) VALUES ('$producto', '$correo', '$nombre')";

    if ($conexion->query($sql) === TRUE) {
        // Envía el correo electrónico
        $asunto = "Pedido procesado";
        $mensaje = "Gracias por tu pedido en Tienda Deportiva El Kikie. Hemos recibido tu solicitud. Hacemos el mayor esfuerzo en ofrecer un servicio de primera, tu producto está en camino. ¡Gracias por elegirnos!";
        
        // Configuración para enviar correos a través de Gmail usando PHPMailer
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kikedeportivos@gmail.com'; // Tu dirección de correo de Gmail
        $mail->Password = 'Deportivos098_'; // Tu contraseña de Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('kikedeportivos@gmail.com', 'Tienda Deportiva El Kikie');
        $mail->addAddress($correo, $nombre);

        $mail->Subject = $asunto;
        $mail->Body = $mensaje;

        if (!$mail->send()) {
            echo "Error al enviar el correo: " . $mail->ErrorInfo;
        } else {
            echo "Pedido procesado con éxito. Se ha enviado un correo de confirmación.";
        }
    } else {
        echo "Error al procesar el pedido: " . $conexion->error;
    }

    // Cierra la conexión a la base de datos
    $conexion->close();
} else {
    // Si no se envió el formulario, redirige a la página principal
    header("Location: camisas.html");
    exit();
}
?>