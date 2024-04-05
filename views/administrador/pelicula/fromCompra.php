<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de Boletos de Cine</title>
</head>
<body>
    <header>
        <h1>Compra de Boletos de Cine</h1>
    </header>

    <form action="GuardarCompra.php" method="post">
        <label for="id_usuario">ID Usuario:</label>
        <input type="text" id="id_usuario" name="id_usuario" required>
        <br>

        <label for="id_funcion">ID Función:</label>
        <input type="text" id="id_funcion" name="id_funcion" required>
        <br>

        <label for="total">Total:</label>
        <input type="text" id="total" name="total" required>
        <br>

        <label for="fecha_compra">Fecha de Compra:</label>
        <input type="datetime" id="fecha_compra" name="fecha_compra" required>
        <br>

        <button type="submit">Guardar Compra</button>
    </form>
</body>
</html>
