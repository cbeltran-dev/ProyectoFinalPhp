<?php

include '../../../bl/CompraBL.php';

// Obtener los datos del formulario
$id_usuario = $_POST['id_usuario'];
$id_funcion = $_POST['id_funcion'];
$fecha_compra = $_POST['fecha_compra']; // Asegúrate de que el nombre coincida con el formulario
$total = $_POST['total'];


// Crear un array con los datos de la compra
$compra = array(
    "id_usuario" => $id_usuario,
    "id_funcion" => $id_funcion,
    "fecha_compra" => $fecha_compra, // Asegúrate de que el campo coincida con la base de datos
    "total" => $total
   
);

// Guardar la compra utilizando la capa de lógica de negocio (CompraBL)
$compraBL = new CompraBL();
$compraBL->saved($compra);
?>


