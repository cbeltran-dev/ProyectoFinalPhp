<?php

include '../../../BL/PeliculaBL.php';

$pelicula = array(
    "titulo" => $_POST["titulo"],
    "genero" => $_POST["genero"],
    "sinopsis" => $_POST["sinopsis"],
    "duracion" => $_POST["duracion"],
    "clasificacion" => $_POST["clasificacion"],
    "trailer_url" => $_POST["trailer_url"],
    "id_pelicula" => $_POST["id_pelicula"],
    
);

$bl = new PeliculaBL();
$bl->actualizar($pelicula);
header('Location: ../pelicula/frmPelicula.php');
exit();
