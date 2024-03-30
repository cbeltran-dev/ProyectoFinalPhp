<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require '../../../DAO/SucursalDAO.php';
class SucursalBL{
    function listar(){
        $dao = new SucursalDAO();
        try{
            return $dao->listar();
        } catch (Exception $ex) {

            echo $ex->getMessage();
        }
    }
    
    function buscar($id) {
        $dao = new SucursalDAO();
        try {
            return $dao->buscarId($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function saved($sucursal){
        $dao =new SucursalDAO();
        try{
            $dao->save($sucursal);
        } catch (Exception $ex) {
            echo $ex->getMessage();

        }
    }
    
    function actualizar($sucursal){
        $dao=new SucursalDAO();
        try{
            $dao->actualizar($sucursal);
        } catch (Exception $ex) {
            echo $ex->getMessage();

        }
    }
    
    function eliminar($id){
        $dao = new SucursalDAO();
        try{
            $dao->eliminar($id);
        } catch (Exception $ex) {
            echo $ex->getMessage();

        }
    }
}
