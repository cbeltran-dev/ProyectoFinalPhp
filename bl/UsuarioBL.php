<?php

 include_once '../../../DAO/UsuarioDAO.php';
class UsuarioBL{
    
    function listarUsuario(){
        $dao = new UsuarioDAO();
        try{
            return $dao->listarUsuario();
        } catch (Exception $ex) {

            echo $ex->getMessage();
        }
    }
    function buscarUsuario($id) {
        $dao = new UsuarioDAO();
        try {
            return $dao->buscarId($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
     function savedUsuario($usuario){
        $dao =new UsuarioDAO();
        try{
            $dao->saveUsuario($usuario);
        } catch (Exception $ex) {
            echo $ex->getMessage();

        }
    }
    function actualizarUsuario($usuario){
        $dao=new UsuarioDAO();
        try{
            $dao->actualizarUsuario($usuario);
        } catch (Exception $ex) {
            echo $ex->getMessage();

        }
    }
    function eliminarUsuario($id){
        $dao = new UsuarioDAO();
        try{
            $dao->eliminarUsuario($id);
        } catch (Exception $ex) {
            echo $ex->getMessage();

        }
    }
    
    
}
