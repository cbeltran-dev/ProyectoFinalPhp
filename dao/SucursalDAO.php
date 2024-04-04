
<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include 'ConexionDAO.php';
include_once '../../../ENTITY/Sucursal.php';

class SucursalDAO {

    function save($sucursal) {
        $database = new ConexionDAO();
        $db = $database->OpenConexion();
        try {
            $imagen_cine = $this->guardarImagen();
            $rutaBaseDatos = "./views/Administrador/uploads/" . $imagen_cine;

            $sql = "INSERT INTO sucursal (nombre, direccion, telefono, imagen_url) VALUES (:nombre, :direccion, :telefono, :imagen_url)";
            $stmt = $db->prepare($sql);

            $stmt->bindParam(":nombre", $sucursal["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $sucursal["direccion"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $sucursal["telefono"], PDO::PARAM_INT);
            $stmt->bindParam(":imagen_url", $rutaBaseDatos, PDO::PARAM_STR);

            $stmt->execute();
        } catch (PDOException $ex) {
            throw new Exception("Error al guardar la sucursal: " . $ex->getMessage());
        }
    }

    function guardarImagen() {
        $rutaGuardarFoto = "../../../views/administrador/uploads/";
        $nombreUnicoArchivo = uniqid() . "_" . $_FILES["imagen_url"]["name"];
        $rutaCompleta = $rutaGuardarFoto . $nombreUnicoArchivo;

        move_uploaded_file($_FILES["imagen_url"]["tmp_name"], $rutaCompleta);

        return $nombreUnicoArchivo;
    }

    function actualizar($sucursal) {
        $database = new ConexionDAO();
        $db = $database->OpenConexion();
        try {


            $sql = "UPDATE sucursal SET nombre = :nombre, direccion = :direccion, telefono = :telefono  WHERE id_sucursal = :id_sucursal";

            $stmt = $db->prepare($sql);

            $stmt->bindParam(":nombre", $sucursal["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $sucursal["direccion"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $sucursal["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":id_sucursal", $sucursal["id_sucursal"], PDO::PARAM_INT);

            $stmt->execute();

            echo "sucursal actualizada exitosamente.";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function listar() {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "select * from sucursal where estado = 1";
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
            $sql = "select * from sucursal where id_sucursal = :id_sucursal";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_sucursal", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function eliminar($id) {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "UPDATE sucursal SET estado = 0 WHERE id_sucursal = :id_sucursal";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_sucursal", $id);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    FUNCTION listarHorarios($id_sucursal, $id_pelicula) {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "
                 SELECT DISTINCT f.horario, sa.tipo_sala
                 FROM sucursal s
                 INNER JOIN sala sa ON s.id_sucursal = sa.id_sucursal
                 INNER JOIN funcion f ON sa.id_sala = f.id_sala
                 WHERE f.id_pelicula = :id_pelicula and s.id_sucursal =:id_sucursal";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_pelicula", $id_pelicula);
            $stmt->bindParam(":id_sucursal", $id_sucursal);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    FUNCTION filtrarSucursalPorPelicula($id) {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "
                 SELECT DISTINCT s.id_sucursal, s.nombre
                 FROM sucursal s
                 INNER JOIN sala sa ON s.id_sucursal = sa.id_sucursal
                 INNER JOIN funcion f ON sa.id_sala = f.id_sala
                 WHERE f.id_pelicula = :id_pelicula";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_pelicula", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

}
