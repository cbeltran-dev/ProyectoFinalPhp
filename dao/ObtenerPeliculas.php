<?php

    try {
    $pdo = new PDO("mysql:host=dbcine-isise-454f.a.aivencloud.com;port=14827;dbname=defaultdb",
            "avnadmin", "AVNS_quR-7K725n_y2OwxlSu");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar: " . $e->getMessage());
}
    $query = "SELECT id_pelicula, titulo, genero, sinopsis,duracion,clasificacion,imagen_url FROM pelicula";
    $stmt = $pdo->query($query);

?>