<?php
// conexión con la base de datos
try {
    $pdo = new PDO("mysql:host=dbcine-isise-454f.a.aivencloud.com;port=14827;dbname=defaultdb",
            "avnadmin", "AVNS_quR-7K725n_y2OwxlSu");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar: " . $e->getMessage());
}

//  consulta SQL para seleccionar los datos de los cines

$query = "SELECT id_sucursal, nombre, direccion, telefono, imagen_url FROM sucursal where estado = 1";
$stmt = $pdo->query($query);
?>