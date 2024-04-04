<?php

include 'ConexionDAO.php';
include_once '../entity/Compra.php';
class CompraDAO{
    
    function save($compra)
    {
        $database = new ConexionDAO();
        $db = $database->OpenConexion();
        try {
            $sql = "insert into compra(id_usuario, id_funcion, total) values (:id_usuario, :id_funcion, :total);";
            $stmt = $db->prepare($sql);

            $stmt->bindParam(":id_usuario", $compra["id_usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":id_funcion", $compra["id_funcion"], PDO::PARAM_STR);
            $stmt->bindParam(":total", $compra["total"], PDO::PARAM_STR);
            $stmt->execute();

            echo "Compra guardada exitosamente.";
        } catch (PDOException $ex) {
            echo "Error al guardar la Compra: " . $ex->getMessage();
        }
    }
    
    function listar() {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "SELECT * FROM COMPRA";
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
            $sql = "Select * from compra where id_compra = :id_compra";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_compra", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}

