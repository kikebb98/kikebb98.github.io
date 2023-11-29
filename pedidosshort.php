<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Pedido de Shorts</title>
</head>
<body>
    <h1>Realizar Pedido de Shorts</h1>

    <?php
    // Verifica si se ha enviado el parámetro "short" a través de la URL
    if (isset($_GET['short'])) {
        // Obtiene el nombre del short desde la URL
        $short = $_GET['short'];

        // Muestra la imagen del short seleccionado
        echo '<img src="imagenes/' . $short . '.jpg" alt="' . $short . '">';

        // Agrega un formulario para realizar el pedido
        echo '
            <form action="procesar_pedido.php" method="post">
                <input type="hidden" name="producto" value="' . $short . '">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required>
                <label for="correo">Correo:</label>
                <input type="email" name="correo" required>
                <button type="submit">Hacer Pedido</button>
            </form>
        ';
    } else {
        // Si no se proporciona un nombre de short, muestra un mensaje de error
        echo '<p>Error: No se ha seleccionado ningún short.</p>';
    }
    ?>
</body>
</html>