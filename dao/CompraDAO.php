<?php

include_once 'ConexionDAO.php';
include_once '../../../entity/Compra.php';

class CompraDAO {

    function save($compra)
    {
        $database = new ConexionDAO();
        $db = $database->OpenConexion();
        try {
            // Inicia una transacción
            $db->beginTransaction();

            // Inserta la compra
            $sql_compra = "INSERT INTO compra(id_usuario, id_funcion, total) VALUES (:id_usuario, :id_funcion, :total)";
            $stmt_compra = $db->prepare($sql_compra);
            $stmt_compra->bindParam(":id_usuario", $compra["id_usuario"], PDO::PARAM_INT);
            $stmt_compra->bindParam(":id_funcion", $compra["id_funcion"], PDO::PARAM_INT);
            $stmt_compra->bindParam(":total", $compra["total"], PDO::PARAM_STR);
            $stmt_compra->execute();

            // Obtiene el ID de la compra insertada
            $compra_id = $db->lastInsertId();

            // Inserta los detalles de la compra
            $sql_detalle_compra = "INSERT INTO detalle_compra(id_compra, id_tipo_entrada, cantidad, subtotal, total) VALUES (:id_compra, :id_tipo_entrada, :cantidad, :subtotal, :total)";
            $stmt_detalle_compra = $db->prepare($sql_detalle_compra);

            // Suponiendo que los detalles de la compra están en un array asociativo $detalle_compra
            foreach ($compra["detalles"] as $detalle_compra)
            {
                $stmt_detalle_compra->bindParam(":id_compra", $compra_id, PDO::PARAM_INT);
                $stmt_detalle_compra->bindParam(":id_tipo_entrada", $detalle_compra["id_tipo_entrada"], PDO::PARAM_INT);
                $stmt_detalle_compra->bindParam(":cantidad", $detalle_compra["cantidad"], PDO::PARAM_INT);
                $stmt_detalle_compra->bindParam(":subtotal", $detalle_compra["subtotal"], PDO::PARAM_STR);
                $stmt_detalle_compra->bindParam(":total", $detalle_compra["total"], PDO::PARAM_STR);
                $stmt_detalle_compra->execute();
            }

            // Confirma la transacción
            $db->commit();

            echo "Compra guardada exitosamente. ID: " . $compra_id;
            return $compra_id; // Devuelve el ID de la compra insertada
        } catch (PDOException $ex) {
            // Cancela la transacción en caso de error
            $db->rollBack();
            echo "Error al guardar la Compra: " . $ex->getMessage();
            return false; // Retorna false en caso de error
        }
    }

    function listar()
    {
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

    function buscarId($id)
    {
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

    function buscarCompra($id)
    {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {

            $sql = "CALL ObtenerCompra(:id_compra)";

            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_compra", $id);
            $stmt->execute();

            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function buscarDetalleCompra($id)
    {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {

            $sql = "CALL ObtenerDetallecompra(:id_compra);";

            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_compra", $id);
            $stmt->execute();

            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
