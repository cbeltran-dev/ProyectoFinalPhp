<?php

include_once '../../../BL/PeliculaBL.php';

$id=$_GET['id_pelicula'];
try {
    $bl = new PeliculaBL();
    $bl->eliminar($id);
    header('Location: ../pelicula/frmPelicula.php');
} catch (PDOException $exc) {
    echo $exc->getMessage();
}

