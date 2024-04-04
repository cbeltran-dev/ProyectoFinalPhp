
<?php
include_once 'ConexionDAO.php';
include_once '../../../entity/DetalleCompra.php';


class DetalleCompraDAO {
  function listarDetalleCompra() {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "select * from detalle_compra";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    function buscarDetalleCompra($id) {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "select * from detalle_compra where id_detalle_compra = :id_detalle";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_detalle", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    function saveDetalleCompra($detalle) {
        $database = new ConexionDAO();
        $db = $database->OpenConexion();
        try {
            $sql = "INSERT INTO detalle_compra (id_compra, id_tipo_entrada,cantidad,subtotal,total) VALUES (:id_compra, :id_tipo_entrada.:cantidad,:subtotal,:total)";
            $stmt = $db->prepare($sql);

            $stmt->bindParam(":id_compra", $rol["id_compra"], PDO::PARAM_STR);
            $stmt->bindParam(":id_tipo_entrada", $rol["id_tipo_entrada"], PDO::PARAM_STR); 
            $stmt->bindParam(":cantidad", $rol["cantidad"], PDO::PARAM_STR); 
            $stmt->bindParam(":subtotal", $rol["subtotal"], PDO::PARAM_STR); 
            $stmt->bindParam(":total", $rol["total"], PDO::PARAM_STR); 
            $stmt->execute();


        } catch (PDOException $ex) {

            echo "Error al guardar DetalleCompra: " . $ex->getMessage();

        }
    }

}
