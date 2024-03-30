<?php
include '../../../BL/FuncionBL.php';

$funcion = array(
    "id_sala" => $_POST["cboSala"],
    "id_pelicula" => $_POST["cboPelicula"],
    "horario" => $_POST["horario"],
    "asientos_disponibles" => $_POST["asientos"],
    "id_funcion" => $_POST["id_funcion"]
    
);


$bl = new FuncionBL();
$bl->actualizar($funcion);
header('Location: ../funcion/frmFuncion.php');
exit();


