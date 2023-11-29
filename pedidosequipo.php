<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Pedido de Equipo</title>
</head>
<body>
    <h1>Realizar Pedido de Equipo</h1>

    <?php
    // Verifica si se ha enviado el parámetro "equipo" a través de la URL
    if (isset($_GET['equipo'])) {
        // Obtiene el nombre del equipo desde la URL
        $equipo = $_GET['equipo'];

        // Muestra la imagen del equipo seleccionado
        echo '<img src="imagenes/' . $equipo . '.jpg" alt="' . $equipo . '">';

        // Agrega un formulario para realizar el pedido
        echo '
            <form action="procesar_pedido.php" method="post">
                <input type="hidden" name="producto" value="' . $equipo . '">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required>
                <label for="correo">Correo:</label>
                <input type="email" name="correo" required>
                <button type="submit">Hacer Pedido</button>
            </form>
        ';
    } else {
        // Si no se proporciona un nombre de equipo, muestra un mensaje de error
        echo '<p>Error: No se ha seleccionado ningún equipo.</p>';
    }
    ?>
</body>
</html>