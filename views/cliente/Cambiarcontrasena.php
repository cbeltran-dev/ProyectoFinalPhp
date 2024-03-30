<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="../../css/stylecontraseña.css">
   <link rel="stylesheet" href="../../css/style.css">


    
</head>
<body>

<div class="password-reset-container">
    <h2>RECUPERAR CONTRASEÑA</h2>
    <form action="procesar_recuperacion.php" method="POST">
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <button type="submit">Enviar Enlace de Recuperación</button>
    </form>
    <div class="options">
        <a href="Login.php">Volver al Inicio de Sesión</a>
    </div>
</div>

</body>
</html>

