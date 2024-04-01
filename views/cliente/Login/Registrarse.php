<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/styleregistro.css">
    
    
</head>
<body>

<div class="register-container">
    <h2>Registrarse</h2>
    <form action="procesar_registro.php" method="POST">
        <div class="form-group">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Correo Electronico:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Registrarse</button>
    </form>
    <div class="options">
        <a href="Login.php">Ya tengo una cuenta, iniciar sesión</a>
    </div>
</div>

</body>
</html>
