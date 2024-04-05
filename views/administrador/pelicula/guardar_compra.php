<?php
// Incluir los archivos necesarios y crear instancias de las clases DAO
require_once '../../../dao/CompraDAO.php';
require_once '../../../dao/DetalleCompraDAO.php';

// Obtener los datos del formulario
$id_usuario = $_POST['id_usuario'];
$id_funcion = $_POST['id_funcion'];
$total = $_POST['total'];
$id_tipo_entrada = $_POST['id_tipo_entrada'];
$cantidad = $_POST['cantidad'];

// Crear una instancia de Compra y guardar los datos en la tabla compra
$compraDAO = new CompraDAO();
$compra = array(
    'id_usuario' => $id_usuario,
    'id_funcion' => $id_funcion,
    'total' => $total
);
$compraDAO->save($compra);

// Obtener el ID de la compra recién insertada
$id_compra = $compraDAO->getLastInsertId(); // Este método debería obtener el último ID insertado en la tabla compra

// Crear una instancia de DetalleCompra y guardar los datos en la tabla detalle_compra
$detalleCompraDAO = new DetalleCompraDAO();
foreach ($id_tipo_entrada as $key => $value) {
    $detalle = array(
        'id_compra' => $id_compra,
        'id_tipo_entrada' => $id_tipo_entrada[$key],
        'cantidad' => $cantidad[$key],
        // Agregar más campos según tus necesidades
    );
    $detalleCompraDAO->save($detalle);
}

echo "La compra se ha guardado correctamente.";
?>


