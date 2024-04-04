<?php


class ObtnerCompra {

    function ObtenerListadeSala($id_sucursal, $id_pelicula) {
        try {
            $pdo = new PDO("mysql:host=dbcine-isise-454f.a.aivencloud.com;port=14827;dbname=defaultdb",
                    "avnadmin", "AVNS_quR-7K725n_y2OwxlSu");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT DISTINCT s.tipo_sala as TipoSala, f.horario as Horario, f.id_pelicula
                    FROM funcion f
                    INNER JOIN sala s ON s.id_sala = f.id_sala
                    INNER JOIN sucursal su ON su.id_sucursal = s.id_sucursal
                    WHERE su.id_sucursal = :id_sucursal and f.id_pelicula= :id_pelicula";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_sucursal', $id_sucursal);
            $stmt->bindParam(':id_pelicula', $id_pelicula);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

}


