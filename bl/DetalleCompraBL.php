<?php

require_once '../../../dao/DetalleCompraDAO.php'; 
class DetalleCompraBL {

       function saved($detalle){
        $dao =new DetalleCompraDAO();
        try{
            $dao->saveDetalleCompra($detalle);
        } catch (Exception $ex) {
            echo $ex->getMessage();

        }
    }

    function listarDetalle(){
        $dao = new DetalleCompraDAO();
        try{
            return $dao->listarDetalleCompra();
        } catch (Exception $ex) {

            echo $ex->getMessage();
        }
    }
    function buscarCompra($id){
        $dao = new DetalleCompraDAO();
        try{
            return $dao->buscarDetalleCompra($id);
        } catch (Exception $ex) {

            echo $ex->getMessage();
        }
    } 
}

