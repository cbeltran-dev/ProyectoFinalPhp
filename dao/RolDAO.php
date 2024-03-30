<?php

include 'ConexionDAO.php';
include_once '../../ENTITY/Rol.php';
class RolDAO {
    
    function saveRol($rol) {
        $database = new ConexionDAO();
        $db = $database->OpenConexion();
        try {
            $sql = "INSERT INTO rol (nombre_rol, descripcion) VALUES (:nombre_rol, :descripcion)";
            $stmt = $db->prepare($sql);
      
            $stmt->bindParam(":nombre_rol", $rol["nombre_rol"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $rol["descripcion"], PDO::PARAM_STR);        
            $stmt->execute();

            
        } catch (PDOException $ex) {
            
            echo "Error al guardar Rol: " . $ex->getMessage();
            
        }
    }
    function actualizarRol($rol) {
    $database = new ConexionDAO();
    $db =  $database->OpenConexion();
    try {
        

        $sql = "UPDATE rol SET nombre_rol = :nombre_rol, descripcion = :descripcion WHERE id_rol = :id_rol";

        $stmt = $db->prepare($sql);

            $stmt->bindParam(":nombre_rol", $rol["nombre_rol"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $rol["descripcion"], PDO::PARAM_STR);        
           
        
        $stmt->execute();

        echo "Rol Actualizado exitosamente.";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
  }
  
  function listarRol() {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "select * from rol";
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
            $sql = "select * from rol where id_rol = :id_rol";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_rol", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function eliminarRol($id) {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "delete from rol where id_rol = :id_rol";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_srol", $id);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
