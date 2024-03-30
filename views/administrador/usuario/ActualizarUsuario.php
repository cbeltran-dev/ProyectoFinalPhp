<?php

include '../../../BL/UsuarioBL.php';

$usuario = array(
    "nombre" => $_POST["nombre"],
    "apellido" => $_POST["apellido"],
    "nombre_usuario" => $_POST["nombre_usuario"],
    "correo" => $_POST["correo"],
    "clave" => $_POST["clave"],
    "telefono" => $_POST["telefono"],
    "dni" => $_POST["dni"],
    "id_usuario" => $_POST["id_usuario"],
    
);

$bl = new UsuarioBL();
$bl->actualizarUsuario($usuario);
header('Location: ../usuario/frmUsuario.php');
exit();

