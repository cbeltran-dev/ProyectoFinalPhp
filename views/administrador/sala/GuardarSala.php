<?php

include '../../../BL/SalaBL.php';

$sala = array(
    "id_sucursal"=> $_POST["cboSucursal"],
    "nombre" => $_POST["nombre"],
    "tipo_sala" => $_POST["tipo_sala"],
    "capacidad" => $_POST["capacidad"]
);

$bl = new SalaBL();
try {
    $bl->saved($sala);
    echo "Sala guardada exitosamente.";
} catch (Exception $e) {
    echo "Error al guardar la sala: " . $e->getMessage();
}


header('Location: ../sala/frmSala.php');
exit();
