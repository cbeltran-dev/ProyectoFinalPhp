<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../../icons/favicon-32x32.png">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../stylelogin.css">
    <link rel="stylesheet" href="../../../css/stylelogin.css">
    <link rel="stylesheet" href="../../../css/style.css">
</head>

<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>          
        <form action="../LogicaPHP/ProcesarLogin.php" method="POST">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit">Iniciar Sesión</button> 
            <?php
            if (isset($_SESSION["error_message"])) {
                echo '<a style=" margin-bottom: -22px; color: red; text-align: center; display: block;" class="error-message">' . $_SESSION["error_message"] . '</a>';
                unset($_SESSION["error_message"]); // Limpiar el mensaje de error
            }
            ?>
            <div style="marg" class="options"><br>
                <a href="frmRegistrarse.php">Registrarse</a> <br>
                <a href="../Cambiarcontrasena.php">Olvidé mi contraseña</a>
            </div>
        </form>
    </div>
</body>
</html>

