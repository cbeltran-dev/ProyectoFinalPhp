
<?php

require_once '../../../dao/ConexionDAO.php';
require_once '../../../dao/CompraDAO.php';

class CompraBL {

    function save($compra)
    {
        $database = new ConexionDAO();
        $db = $database->OpenConexion();
        try {

            $db->beginTransaction();

            $sql_compra = "INSERT INTO compra(id_usuario, id_funcion, total) VALUES (:id_usuario, :id_funcion, :total)";
            $stmt_compra = $db->prepare($sql_compra);
            $stmt_compra->bindParam(":id_usuario", $compra["id_usuario"], PDO::PARAM_INT);
            $stmt_compra->bindParam(":id_funcion", $compra["id_funcion"], PDO::PARAM_INT);
            $stmt_compra->bindParam(":total", $compra["total"], PDO::PARAM_STR);
            $stmt_compra->execute();

            $compra_id = $db->lastInsertId();

            $sql_detalle_compra = "INSERT INTO detalle_compra(id_compra, id_tipo_entrada, cantidad, subtotal, total) VALUES (:id_compra, :id_tipo_entrada, :cantidad, :subtotal, :total)";
            $stmt_detalle_compra = $db->prepare($sql_detalle_compra);

            foreach ($compra["detalles"] as $detalle_compra)
            {
                $stmt_detalle_compra->bindParam(":id_compra", $compra_id, PDO::PARAM_INT);
                $stmt_detalle_compra->bindParam(":id_tipo_entrada", $detalle_compra["id_tipo_entrada"], PDO::PARAM_INT);
                $stmt_detalle_compra->bindParam(":cantidad", $detalle_compra["cantidad"], PDO::PARAM_INT);
                $stmt_detalle_compra->bindParam(":subtotal", $detalle_compra["subtotal"], PDO::PARAM_STR);
                $stmt_detalle_compra->bindParam(":total", $detalle_compra["total"], PDO::PARAM_STR);
                $stmt_detalle_compra->execute();
            }


            $db->commit();

            echo "Compra guardada exitosamente. ID: " . $compra_id;
            return $compra_id;
        } catch (PDOException $ex) {

            $db->rollBack();
            echo "Error al guardar la Compra: " . $ex->getMessage();
            return false;
        }
    }

    function listarCompra()
    {
        $dao = new CompraDAO();
        try {
            return $dao->listar();
        } catch (Exception $ex) {

            echo $ex->getMessage();
        }
    }

    function buscarCompra($id)
    {
        $dao = new CompraDAO();
        try {
            return $dao->buscarCompra($id);
        } catch (Exception $ex) {

            echo $ex->getMessage();
        }
    }
    
    function buscarDetalleCompra($id)
    {
        $dao = new CompraDAO();
        try {
            return $dao->buscarDetalleCompra($id);
        } catch (Exception $ex) {

            echo $ex->getMessage();
        }
    }

}
