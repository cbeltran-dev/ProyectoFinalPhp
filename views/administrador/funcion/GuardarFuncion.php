<<?php

include_once '../../../bl/SalaBL.php';
include '../../../BL/FuncionBL.php';
$salaBL2 = new SalaBL();
$idSala = $_POST["cboSala"];
$capacidad = $salaBL2->obtenerCapacidad($idSala);


$funcion = array(
    "id_sala"=> $_POST["cboSala"],
    "id_pelicula"=> $_POST["cboPelicula"],
    "horario" => $_POST["horario"],
    "asientos_disponibles" => $capacidad
    
);

$bl = new FuncionBL();
try {
    $bl->saved($funcion);
    echo "Sala guardada exitosamente.";
} catch (Exception $e) {
    echo "Error al guardar la sala: " . $e->getMessage();
}

header('Location: ../funcion/frmFuncion.php');
exit();


