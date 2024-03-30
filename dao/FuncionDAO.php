<?php
include_once 'ConexionDAO.php';
include_once '../../../ENTITY/Funcion.php';
class FuncionDAO {

    function save($funcion)
    {
        $database = new ConexionDAO();
        $db = $database->OpenConexion();
        try {
            $sql = "INSERT INTO funcion (id_sala, id_pelicula, horario, asientos_disponibles) VALUES (:id_sala, :id_pelicula, :horario, :asientos_disponibles)";
            $stmt = $db->prepare($sql);

            $stmt->bindParam(":id_sala", $funcion["id_sala"], PDO::PARAM_STR);
            $stmt->bindParam(":id_pelicula", $funcion["id_pelicula"], PDO::PARAM_STR);
            $stmt->bindParam(":horario", $funcion["horario"], PDO::PARAM_STR);
            $stmt->bindParam(":asientos_disponibles", $funcion["asientos_disponibles"], PDO::PARAM_INT);

            $stmt->execute();

            echo "Función guardada exitosamente.";
        } catch (PDOException $ex) {
            echo "Error al guardar la función: " . $ex->getMessage();
        }
    }
    
    function listar() {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "SELECT f.id_funcion,f.id_sala,f.id_pelicula, s.nombre AS nombre_sala,
                    p.titulo AS nombre_pelicula,
                    f.horario,
                    f.asientos_disponibles
                    FROM funcion f
                    JOIN sala s ON f.id_sala = s.id_sala
                    JOIN pelicula p ON f.id_pelicula = p.id_pelicula
                    WHERE f.estado = '1';";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    function buscarId($id) {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "Select * from funcion where id_funcion = :id_funcion";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_funcion", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function actualizar($funcion)
    {
        $database = new ConexionDAO();
        $db = $database->OpenConexion();
        try {


            $sql = "UPDATE funcion SET  id_sala =:id_sala, id_pelicula =:id_pelicula, horario =:horario, asientos_disponibles = :asientos_disponibles  WHERE id_funcion =:id_funcion";

            $stmt = $db->prepare($sql);
            
            $stmt->bindParam(":id_sala", $funcion["id_sala"], PDO::PARAM_INT);
            $stmt->bindParam(":id_pelicula", $funcion["id_pelicula"], PDO::PARAM_INT);           
            $stmt->bindParam(":horario", $funcion["horario"], PDO::PARAM_STR);
            $stmt->bindParam(":asientos_disponibles", $funcion["asientos_disponibles"], PDO::PARAM_INT);
            $stmt->bindParam(":id_funcion", $funcion["id_funcion"], PDO::PARAM_INT);
            $stmt->execute();

            echo "sala actualizada exitosamente.";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function eliminar($id)
    {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "UPDATE funcion SET estado = 0 WHERE id_funcion = :id_funcion";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_funcion", $id);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
