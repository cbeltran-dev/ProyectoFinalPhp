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
        <?php
        include_once '../../../BL/UsuarioBL.php';
        $id = $_GET['id_usuario'];
        $bl = new UsuarioBL();
        $usuario = $bl->buscarUsuario($id);
        foreach ($usuario as $usua)
        {
            ?>           
            <div class="register-container">
                <h2>Editar cliente <a style="color: red"><?php echo $usua['nombre_usuario'] ?> </a></h2>
                <form action="../LogicaPHP/ActualizarUsuario.php" method="POST">
                    <input type="hidden" value="<?php echo $id?>" name="id_usuario">
                    <div class="form-group">
                        <label for="username">Nombre de Usuario:</label>
                        <input type="text" id="username" value="<?php echo $usua['nombre_usuario'] ?>" name="nombreusuario" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electronico:</label>
                        <input type="email" id="email" value="<?php echo $usua['correo'] ?>" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" value="<?php echo $usua['clave'] ?>" name="clave" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Nombre:</label>
                        <input type="text" id="password" value="<?php echo $usua['nombre'] ?>" name="nombre" >
                    </div>
                    <div class="form-group">
                        <label for="password">Apellido:</label>
                        <input type="text" id="password" value="<?php echo $usua['apellido'] ?>" name="apellido" >
                    </div>
                    <div class="form-group">
                        <label for="password">DNI:</label>
                        <input type="text" id="password" value="<?php echo $usua['dni'] ?>" name="dni" >
                    </div>
                    <div class="form-group">
                        <label for="password">Telefono:</label>
                        <input type="text" id="password" value="<?php echo $usua['telefono'] ?>" name="telefono" >
                    </div>
                    <?php
                }
                ?> 
                <button type="submit">Actualizar Datos</button>
            </form>

        </div>

    </body>
</html>


