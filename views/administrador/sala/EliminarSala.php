<?php

include_once '../../../BL/SalaBL.php';

$id=$_GET['id_sala'];
try {
    $bl = new SalaBL();
    $bl->eliminar($id);
    header('Location: ../sala/frmSala.php');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}

