<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Compra</title>
</head>
<body>
    <h2>Formulario de Compra</h2>
    <form action="guardar_compra.php" method="POST">
        <!-- Campos para la compra -->
        <label for="id_usuario">ID Usuario:</label>
        <input type="text" id="id_usuario" name="id_usuario" required><br>

        <label for="id_funcion">ID Función:</label>
        <input type="text" id="id_funcion" name="id_funcion" required><br>

        <label for="total">Total:</label>
        <input type="text" id="total" name="total" required><br>

        <!-- Campos para los detalles de la compra -->
        <h3>Detalles de la Compra</h3>
        <label for="id_tipo_entrada">ID Tipo de Entrada:</label>
        <input type="text" id="id_tipo_entrada" name="id_tipo_entrada[]" required><br>

        <label for="cantidad">Cantidad:</label>
        <input type="text" id="cantidad" name="cantidad[]" required><br>

        <!-- Puedes agregar más campos para los detalles de la compra según tus necesidades -->

        <input type="submit" value="Guardar Compra">
    </form>
</body>
</html>
