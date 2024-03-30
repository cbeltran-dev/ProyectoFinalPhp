
<?php

include_once '../../../BL/FuncionBL.php';

$id=$_GET['id_funcion'];
try {
    $bl = new FuncionBL();
    $bl->eliminar($id);
    header('Location: ../funcion/frmFuncion.php');
    exit();
} catch (PDOException $exc) {
    echo $exc->getMessage();
}


