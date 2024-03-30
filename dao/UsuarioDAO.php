<?php

include_once 'ConexionDAO.php';
require_once '../../../ENTITY/Usuario.php';
class UsuarioDAO {
    
    function saveUsuario($usuario) {
        $database = new ConexionDAO();
        $db = $database->OpenConexion();
        try {
            $sql = "INSERT INTO usuario(id_rol,nombre,
                apellido,nombre_usuario,correo,clave,telefono,dni)VALUES".
                " (:id_rol,:nombre,:apellido,:nombre_usuario,:correo,:clave,:telefono,:dni)";
            
            $stmt = $db->prepare($sql);
                    
            $stmt->bindParam(":id_rol", $usuario["id_rol"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $usuario["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $usuario["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre_usuario", $usuario["nombre_usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":correo", $usuario["correo"], PDO::PARAM_STR);
            $stmt->bindParam(":clave", $usuario["clave"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $usuario["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":dni", $usuario["dni"], PDO::PARAM_STR);     
            
            $stmt->execute();

        } catch (PDOException $ex) {
            
            echo "Error al guardar la Usuario: " . $ex->getMessage();
            
        }
    }
    function actualizarUsuario($usuario) {
    $database = new ConexionDAO();
    $db =  $database->OpenConexion();
    try {
        

        $sql = "UPDATE usuario SET nombre = :nombre, apellido = :apellido, nombre_usuario = :nombre_usuario, correo = :correo,"
                . "clave = :clave, telefono = :telefono, dni = :dni  WHERE id_usuario = :id_usuario";

        $stmt = $db->prepare($sql);

            $stmt->bindParam(":nombre", $usuario["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $usuario["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre_usuario", $usuario["nombre_usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":correo", $usuario["correo"], PDO::PARAM_STR);
            $stmt->bindParam(":clave", $usuario["clave"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $usuario["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":dni", $usuario["dni"], PDO::PARAM_STR); 
            $stmt->bindParam(":id_usuario", $usuario["id_usuario"], PDO::PARAM_INT); 
            $stmt->execute();

        echo "Usuario actualizado exitosamente.";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
  }
  function listarUsuario() {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "SELECT usuario.id_usuario, usuario.nombre, usuario.apellido,
                usuario.nombre_usuario, usuario.clave, usuario.correo, 
                usuario.telefono, usuario.dni, usuario.estado, rol.nombre_rol
                FROM usuario
                INNER JOIN rol ON usuario.id_rol = rol.id_rol;";
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
            $sql = "SELECT usuario.id_usuario, usuario.nombre, usuario.apellido,
                usuario.nombre_usuario, usuario.clave, usuario.correo, 
                usuario.telefono, usuario.dni, usuario.estado, rol.nombre_rol
                FROM usuario
                INNER JOIN rol ON usuario.id_rol = rol.id_rol WHERE usuario.estado=1 AND usuario.id_usuario=:id_usuario;";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_usuario", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    function eliminarUsuario($id) {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "delete from usuario where id_usuario = :id_usuario";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_usuario", $id);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    
    
}
