<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Pedido</title>
</head>
<body>
    <h1>Realizar Pedido</h1>

    <?php
    
    if (isset($_GET['playera'])) {
        
        $playera = $_GET['playera'];

       
        echo '<img src="imagenes/' . $playera . '.jpg" alt="' . $playera . '" width="275" height="390">';

        
        echo '
            <form action="procesar_pedido.php" method="post">
                <input type="hidden" name="producto" value="' . $playera . '">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required>
                <label for="correo">Correo:</label>
                <input type="email" name="correo" required>
                <button type="submit">Hacer Pedido</button>
            </form>
        ';
    } else {
        
        echo '<p>Error: No se ha seleccionado ninguna playera.</p>';
    }
    ?>
</body>
</html>