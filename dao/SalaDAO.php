<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include_once 'ConexionDAO.php';
include_once '../../../ENTITY/Sala.php';

class SalaDAO {

    function save($sala)
    {
        $database = new ConexionDAO();
        $db = $database->OpenConexion();
        try {
            $sql = "INSERT INTO sala (id_sucursal, nombre, tipo_sala, capacidad) VALUES (:id_sucursal, :nombre, :tipo_sala, :capacidad)";
            $stmt = $db->prepare($sql);

            $stmt->bindParam(":id_sucursal", $sala["id_sucursal"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $sala["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":tipo_sala", $sala["tipo_sala"], PDO::PARAM_STR);
            $stmt->bindParam(":capacidad", $sala["capacidad"], PDO::PARAM_INT);

            $stmt->execute();
        } catch (PDOException $ex) {

            echo "Error al guardar la sala: " . $ex->getMessage();
        }
    }

    function actualizar($sala)
    {
        $database = new ConexionDAO();
        $db = $database->OpenConexion();
        try {


            $sql = "UPDATE sala SET  nombre =:nombre, tipo_sala =:tipo_sala, capacidad =:capacidad  WHERE id_sala =:id_sala";

            $stmt = $db->prepare($sql);

            $stmt->bindParam(":nombre", $sala["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":tipo_sala", $sala["tipo_sala"], PDO::PARAM_STR);
            $stmt->bindParam(":capacidad", $sala["capacidad"], PDO::PARAM_INT);
            $stmt->bindParam(":id_sala", $sala["id_sala"], PDO::PARAM_INT);
            $stmt->execute();

            echo "sala actualizada exitosamente.";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function listar()
    {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "SELECT s.id_sala, su.id_sucursal, su.nombre AS nombre_sucursal, s.nombre, s.tipo_sala, s.capacidad FROM sala s INNER JOIN sucursal su ON s.id_sucursal = su.id_sucursal where s.estado = 1;";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    function buscarId($id)
    {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "SELECT s.id_sala, s.id_sucursal, su.nombre AS nombre_sucursal, s.nombre, s.tipo_sala, s.capacidad, s.estado FROM sala s INNER JOIN sucursal su ON s.id_sucursal = su.id_sucursal WHERE s.estado = 1 and s.id_sala = :id_sala;";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_sala", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function eliminar($id)
    {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "UPDATE sala SET estado = 0 WHERE id_sala = :id_sala";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_sala", $id);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function obtenerCapacidad($id)
    {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "SELECT capacidad FROM sala WHERE estado = 1 AND id_sala = :id_sala";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_sala", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['capacidad'];
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
   
}
