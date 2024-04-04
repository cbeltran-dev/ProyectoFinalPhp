<?php

include '../../../bl/CompraBL.php';
// No es necesario incluir DetalleCompraBL ya que los detalles de compra se guardarán dentro de la misma función save

// Obtener los datos del formulario
$cantidad_adulto = $_POST['adulto'];
$cantidad_nino = $_POST['nino'];
$id_usuario = $_POST['id_usuario'];
$id_funcion = $_POST['id_funcion'];
$tipo_sala = $_POST['tipo_sala'];

// Mapeo de precios a IDs de tipo de entrada
$precios_tipos_entrada = array(
    "Adulto 2D" => 15.00,
    "Nino 2D" => 13.00,
    "Adulto 3D" => 30.00,
    "Nino 3D" => 20.00
);

// Calcular el total de la compra
$total = 0;

// Calcular el total de adultos y niños por tipo de entrada y sumarlos al total general
if ($cantidad_adulto > 0) {
    $total += $cantidad_adulto * $precios_tipos_entrada[($tipo_sala == '2D') ? "Adulto 2D" : "Adulto 3D"];
}
if ($cantidad_nino > 0) {
    $total += $cantidad_nino * $precios_tipos_entrada[($tipo_sala == '2D') ? "Nino 2D" : "Nino 3D"];
}

// Crear un array con los datos de la compra y los detalles de la compra
$compra = array(
    "id_usuario" => $id_usuario,
    "id_funcion" => $id_funcion,
    "total" => $total,
    "detalles" => array() // Inicializar un array para los detalles de la compra
);

// Insertar los detalles de la compra en el array
if ($cantidad_adulto > 0) {
    $compra["detalles"][] = array(
        "id_tipo_entrada" => ($tipo_sala == '2D') ? 1 : 3, // ID para adulto según tipo de sala
        "cantidad" => $cantidad_adulto,
        "subtotal" => $cantidad_adulto * $precios_tipos_entrada[($tipo_sala == '2D') ? "Adulto 2D" : "Adulto 3D"],
        "total" => $cantidad_adulto * $precios_tipos_entrada[($tipo_sala == '2D') ? "Adulto 2D" : "Adulto 3D"]
    );
}
if ($cantidad_nino > 0) {
    $compra["detalles"][] = array(
        "id_tipo_entrada" => ($tipo_sala == '2D') ? 2 : 4, // ID para niño según tipo de sala
        "cantidad" => $cantidad_nino,
        "subtotal" => $cantidad_nino * $precios_tipos_entrada[($tipo_sala == '2D') ? "Nino 2D" : "Nino 3D"],
        "total" => $cantidad_nino * $precios_tipos_entrada[($tipo_sala == '2D') ? "Nino 2D" : "Nino 3D"]
    );
}

// Guardar la compra y los detalles de la compra utilizando la función save
$compraBL = new CompraBL();
$id_compra = $compraBL->save($compra); // Suponiendo que el método save() devuelve el ID de la compra insertada

// Verificar si la compra se guardó correctamente
if ($id_compra) {
     header('Location: ../compra/frmVerCompra.php?id_compra=' . $id_compra);
} else {
    echo "Error al guardar la Compra";
}
?>
