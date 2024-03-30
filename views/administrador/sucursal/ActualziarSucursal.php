<?php

include '../../../BL/SucursalBL.php';

$sucursal = array(
    "nombre" => $_POST["nombre"],
    "direccion" => $_POST["direccion"],
    "telefono" => $_POST["telefono"],
    "id_sucursal" => $_POST["id_sucursal"]
    
    
);

$bl = new SucursalBL();
$bl->actualizar($sucursal);
header('Location: ../sucursal/frmSucursal.php');
exit();

