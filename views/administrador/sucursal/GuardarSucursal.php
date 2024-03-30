<?php
include_once '../../../bl/SucursalBL.php';

$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];

$sucursal = array(
    "nombre" => $nombre,
    "direccion" => $direccion,
    "telefono" => $telefono
);

$bl = new SucursalBL();
$bl->saved($sucursal);
header('Location: ../sucursal/frmSucursal.php');
exit();
