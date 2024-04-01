<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../stylelogin.css">
    <link rel="stylesheet" href="../../../css/stylelogin.css">
    <link rel="stylesheet" href="../../../css/style.css">
</head>
<body>

<div class="login-container">
    <h2>Iniciar Sesión</h2>
    <form action="Procesarlogin.php" method="POST">
        <div class="form-group">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Iniciar Sesión</button> <br>

        <div class="options"><br>
            <a href="Registrarse.php">Registrarse</a> <br>
            <a href="../Cambiarcontrasena.php">Olvidé mi contraseña</a>
        </div>
    </form>
</div>

</body>
</html>
