<?php

include_once '../../../BL/UsuarioBL.php';

$id=$_GET['id_usuario'];
try {
    $bl = new UsuarioBL();
    $bl->eliminarUsuario($id);
    header('Location: ../usuario/frmUsuario.php');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}

