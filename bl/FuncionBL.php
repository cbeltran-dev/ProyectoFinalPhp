<?php
require_once '../../../dao/FuncionDAO.php';    

class FuncionBL {
    function saved($funcion){
        $dao =new FuncionDAO();
        try{
            $dao->save($funcion);
        } catch (Exception $ex) {
            echo $ex->getMessage();

        }
    }
    
    function listarFunciones(){
        $dao = new FuncionDAO();
        try{
            return $dao->listar();
        } catch (Exception $ex) {

            echo $ex->getMessage();
        }
    }
    function buscarFuncion($id){
        $dao = new FuncionDAO();
        try{
            return $dao->buscarId($id);
        } catch (Exception $ex) {

            echo $ex->getMessage();
        }
    }
    
    function actualizar($funcion){
        $dao=new FuncionDAO();
        try{
            $dao->actualizar($funcion);
        } catch (Exception $ex) {
            echo $ex->getMessage();

        }
    }
    
    function eliminar($id)
    {
        $dao = new FuncionDAO();
        try {
            $dao->eliminar($id);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
