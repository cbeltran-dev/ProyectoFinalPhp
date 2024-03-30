<?php

include_once '../../../BL/UsuarioBL.php';

$id_rol = $_POST["cbo_rol"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$nombre_usuario = $_POST["nombre_usuario"];
$correo = $_POST["correo"];
$clave = $_POST["clave"];
$telefono = $_POST["telefono"];
$dni = $_POST["dni"];

$usuario = array(
    "id_rol" => $id_rol,
    "nombre" => $nombre,
    "apellido" => $apellido,
    "nombre_usuario" => $nombre_usuario,
    "correo" => $correo,
    "clave" => $clave,
    "telefono" => $telefono,
    "dni" => $dni,
        
);

$bl = new UsuarioBL();
$bl->savedUsuario($usuario);

header('Location: ../usuario/frmUsuario.php');
exit();


