<?php

class ObtenerPeliculas{

    function obtenerPelis()
    {
        try {
            $pdo = new PDO("mysql:host=dbcine-isise-454f.a.aivencloud.com;port=14827;dbname=defaultdb",
                    "avnadmin", "AVNS_quR-7K725n_y2OwxlSu");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error al conectar: " . $e->getMessage());
        }
        $query = "SELECT id_pelicula, titulo, genero, sinopsis,duracion,clasificacion,imagen_url FROM pelicula WHERE estado=1";
        $stmt = $pdo->query($query);
        return $stmt;
    }

    function obtenerEstrenos()
    {
        try {
            $pdo = new PDO("mysql:host=dbcine-isise-454f.a.aivencloud.com;port=14827;dbname=defaultdb",
                    "avnadmin", "AVNS_quR-7K725n_y2OwxlSu");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error al conectar: " . $e->getMessage());
        }
        $query = "SELECT id_pelicula, titulo, genero, sinopsis,duracion,clasificacion,imagen_url FROM pelicula WHERE estreno = 1";
        $stmt = $pdo->query($query);
        return $stmt;
    }

}
