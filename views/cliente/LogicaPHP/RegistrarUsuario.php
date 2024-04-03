<?php

include_once '../../../bl/UsuarioBL.php';


$usuario = array(
    "id_rol" => $_POST["rol"],
    "nombre_usuario" => $_POST["nombreusuario"],
    "correo" => $_POST["correo"],
    "clave" => $_POST["clave"],
    "nombre" => null,
    "apellido" => null,
    "telefono" => null,
    "dni" => null,
);

$bl = new UsuarioBL();
$bl->savedUsuario($usuario);

header('Location: ../login/frmLogin.php');
exit();
