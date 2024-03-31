<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../../../DAO/ConexionDAO.php';

    $username = $_POST["username"];
    $password = $_POST["password"];

    $conexionDAO = new ConexionDAO();
    $conexion = $conexionDAO->OpenConexion();

    if ($conexion) {
        try {
            $sql = "SELECT id_usuario, id_rol, nombre, apellido FROM usuario WHERE nombre_usuario = :username AND clave = :password";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();
            
            if ($stmt->rowCount() == 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION["id_usuario"] = $row["id_usuario"];
                $_SESSION["id_rol"] = $row["id_rol"];
                $_SESSION["nombre"] = $row["nombre"];
                $_SESSION["apellido"] = $row["apellido"];
                
                
                if ($_SESSION["id_rol"] == 1) {
                    header("Location: ../../Administrador/PagePrincipal.php");
                } elseif ($_SESSION["id_rol"] == 2) {
                    header("Location: ../../../index.php");
                }
                exit();
            } else {
                $error = "Usuario o contraseña incorrectos.";
                header("Location: login.php?error=$error");
                exit();
            }
        } catch (PDOException $ex) {
            echo "Error de consulta: " . $ex->getMessage();
        }

        $conexionDAO->cerrarConexion();
    } else {
        $error = "Error al conectar a la base de datos.";
        header("Location: login.php?error=$error");
        exit();
    }
}


