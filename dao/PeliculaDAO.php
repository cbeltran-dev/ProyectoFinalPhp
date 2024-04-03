<?php

include_once 'ConexionDAO.php';
include_once '../../../entity/Pelicula.php';

class PeliculaDAO
{

    function save($pelicula)
    {
        $database = new ConexionDAO();
        $db = $database->OpenConexion();
        try {

            $imagen_url = $this->guardarImagen();
            $rutaBaseDatos = "./views/administrador/uploads/" . $imagen_url;

            $sql = "INSERT INTO pelicula (genero, titulo, sinopsis, duracion, clasificacion, imagen_url, estreno, trailer_url)" .
                " VALUES (:genero, :titulo, :sinopsis, :duracion, :clasificacion, :imagen_url, :estreno, :trailer_url)";
            $stmt = $db->prepare($sql);

            $stmt->bindParam(":genero", $pelicula["genero"], PDO::PARAM_STR);
            $stmt->bindParam(":titulo", $pelicula["titulo"], PDO::PARAM_STR);
            $stmt->bindParam(":sinopsis", $pelicula["sinopsis"], PDO::PARAM_STR);
            $stmt->bindParam(":duracion", $pelicula["duracion"], PDO::PARAM_STR);
            $stmt->bindParam(":clasificacion", $pelicula["clasificacion"], PDO::PARAM_STR);
            $stmt->bindParam(":imagen_url", $rutaBaseDatos, PDO::PARAM_STR);
            $stmt->bindParam(":estreno", $pelicula["estreno"], PDO::PARAM_STR);
            $stmt->bindParam(":trailer_url", $pelicula["trailer_url"], PDO::PARAM_STR);

            $stmt->execute();
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
    }

    function guardarImagen()
    {
        $rutaGuardarFoto = "../../../views/administrador/uploads/";
        $nombreUnicoArchivo = uniqid() . "_" . $_FILES["imagen_url"]["name"];
        $rutaCompleta = $rutaGuardarFoto . $nombreUnicoArchivo;

        move_uploaded_file($_FILES["imagen_url"]["tmp_name"], $rutaCompleta);

        return $nombreUnicoArchivo;
    }


    function actualizar($pelicula)
    {
        $database = new ConexionDAO();
        $db = $database->OpenConexion();
        try {
            

            $sql = "UPDATE pelicula SET genero = :genero, titulo = :titulo, sinopsis = :sinopsis, duracion = :duracion, clasificacion = :clasificacion, trailer_url = :trailer_url WHERE id_pelicula = :id_pelicula";

            $stmt = $db->prepare($sql);

            $stmt->bindParam(":genero", $pelicula["genero"], PDO::PARAM_STR);
            $stmt->bindParam(":titulo", $pelicula["titulo"], PDO::PARAM_STR);
            $stmt->bindParam(":sinopsis", $pelicula["sinopsis"], PDO::PARAM_STR);
            $stmt->bindParam(":duracion", $pelicula["duracion"], PDO::PARAM_STR);
            $stmt->bindParam(":clasificacion", $pelicula["clasificacion"], PDO::PARAM_STR);
            $stmt->bindParam(":trailer_url", $pelicula["trailer_url"], PDO::PARAM_STR);
            $stmt->bindParam(":id_pelicula", $pelicula["id_pelicula"], PDO::PARAM_INT);

            $stmt->execute();

            echo "Película actualizada exitosamente.";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function listar()
    {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "select * from pelicula where estado = 1;";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    function buscarId($id)
    {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "select * from pelicula where id_pelicula = :id_pelicula";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_pelicula", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function eliminar($id)
    {
        $database = new ConexionDAO();
        $db = $database->openConexion();
        try {
            $sql = "UPDATE pelicula SET estado = 0 WHERE id_pelicula = :id_pelicula";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_pelicula", $id);
            $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
}
