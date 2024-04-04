<?php

include '../../../bl/CompraBL.php';



$cantidad_adulto = $_POST['adulto'];
$cantidad_nino = $_POST['nino'];
$id_usuario = $_POST['id_usuario'];
$id_funcion = $_POST['id_funcion'];
$tipo_sala = $_POST['tipo_sala'];


$precios_tipos_entrada = array(
    "Adulto 2D" => 15.00,
    "Nino 2D" => 13.00,
    "Adulto 3D" => 30.00,
    "Nino 3D" => 20.00
);


$total = 0;


if ($cantidad_adulto > 0) {
    $total += $cantidad_adulto * $precios_tipos_entrada[($tipo_sala == '2D') ? "Adulto 2D" : "Adulto 3D"];
}
if ($cantidad_nino > 0) {
    $total += $cantidad_nino * $precios_tipos_entrada[($tipo_sala == '2D') ? "Nino 2D" : "Nino 3D"];
}


$compra = array(
    "id_usuario" => $id_usuario,
    "id_funcion" => $id_funcion,
    "total" => $total,
    "detalles" => array() 
);


if ($cantidad_adulto > 0) {
    $compra["detalles"][] = array(
        "id_tipo_entrada" => ($tipo_sala == '2D') ? 1 : 3, 
        "cantidad" => $cantidad_adulto,
        "subtotal" => $cantidad_adulto * $precios_tipos_entrada[($tipo_sala == '2D') ? "Adulto 2D" : "Adulto 3D"],
        "total" => $cantidad_adulto * $precios_tipos_entrada[($tipo_sala == '2D') ? "Adulto 2D" : "Adulto 3D"]
    );
}
if ($cantidad_nino > 0) {
    $compra["detalles"][] = array(
        "id_tipo_entrada" => ($tipo_sala == '2D') ? 2 : 4, 
        "cantidad" => $cantidad_nino,
        "subtotal" => $cantidad_nino * $precios_tipos_entrada[($tipo_sala == '2D') ? "Nino 2D" : "Nino 3D"],
        "total" => $cantidad_nino * $precios_tipos_entrada[($tipo_sala == '2D') ? "Nino 2D" : "Nino 3D"]
    );
}


$compraBL = new CompraBL();
$id_compra = $compraBL->save($compra);


if ($id_compra) {
     header('Location: ../compra/frmVerCompra.php?id_compra=' . $id_compra);
} else {
    echo "Error al guardar la Compra";
}
?>
