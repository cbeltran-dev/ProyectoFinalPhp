<?php

require_once '../../../DAO/PeliculaDAO.php';
class PeliculaBL{
    function listar(){
        $dao = new PeliculaDAO();
        try{
            return $dao->listar();
        } catch (Exception $ex) {
            echo $ex->getMessage();

        }
    }
    function buscar($id) {
        $dao = new PeliculaDAO();
        try {
            return $dao->buscarId($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function saved($pelicula){
        $dao =new PeliculaDAO();
        try{
            $dao->save($pelicula);
        } catch (Exception $ex) {
            echo $ex->getMessage();

        }
    }
    
    function actualizar($pelicula){
        $dao=new PeliculaDAO();
        try{
            $dao->actualizar($pelicula);
        } catch (Exception $ex) {
            echo $ex->getMessage();

        }
    }
    
    function eliminar($id){
        $dao = new PeliculaDAO();
        try{
            $dao->eliminar($id);
        } catch (Exception $ex) {
            echo $ex->getMessage();

        }
    }
}