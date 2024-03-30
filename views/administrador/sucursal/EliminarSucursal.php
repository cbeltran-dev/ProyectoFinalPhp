<?php

include_once '../../../BL/SucursalBL.php';

$id=$_GET['id_sucursal'];
try {
    $bl = new SucursalBL();
    $bl->eliminar($id);
    header('Location: ../sucursal/frmSucursal.php');

} catch (PDOException $exc) {
    echo $exc->getMessage();
}


