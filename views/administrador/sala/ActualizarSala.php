<?php
include '../../../BL/SalaBL.php';

$sala = array(
    "nombre" => $_POST["nombre"],
    "tipo_sala" => $_POST["tipo_sala"],
    "capacidad" => $_POST["capacidad"],
    "id_sala" => $_POST["id_sala"]
);


$bl = new SalaBL();
$bl->actualizar($sala);

header('Location: ../sala/frmSala.php');
exit();
