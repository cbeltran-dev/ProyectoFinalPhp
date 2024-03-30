<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require '../../../dao/SalaDAO.php';

class SalaBL {

    function listarSalas()
    {
        $dao = new SalaDAO();
        try {
            return $dao->listar();
        } catch (Exception $ex) {

            echo $ex->getMessage();
        }
    }

    function buscar($id)
    {
        $dao = new SalaDAO();
        try {
            return $dao->buscarId($id);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function saved($sala)
    {
        $dao = new SalaDAO();
        try {
            $dao->save($sala);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function actualizar($sala)
    {
        $dao = new SalaDAO();
        try {
            $dao->actualizar($sala);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function eliminar($id)
    {
        $dao = new SalaDAO();
        try {
            $dao->eliminar($id);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function obtenerCapacidad($id)
    {
        $dao = new SalaDAO();
        try {
            return $dao->obtenerCapacidad($id);
        } catch (Exception $ex) {
            echo $ex->getMessage();

            return 0;
        }
    }

    
}    