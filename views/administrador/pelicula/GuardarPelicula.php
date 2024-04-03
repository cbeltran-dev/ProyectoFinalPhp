<?php
include_once '../../../bl/peliculaBL.php';

$genero = $_POST["genero"];
$titulo = $_POST["titulo"];
$sinopsis = $_POST["sinopsis"];
$duracion = $_POST["duracion"];
$clasificacion = $_POST["clasificacion"];
$estreno = $_POST["cboEstreno"];
$trailer = $_POST["trailer_url"];

$pelicula = array(
    "genero" => $genero,
    "titulo" => $titulo,
    "sinopsis" => $sinopsis,
    "duracion" => $duracion,
    "clasificacion" => $clasificacion,
    "estreno" => $estreno,
    "trailer_url" => $trailer
);

$bl = new PeliculaBL();
$bl->saved($pelicula);

header('Location: ../pelicula/frmPelicula.php');
exit();





