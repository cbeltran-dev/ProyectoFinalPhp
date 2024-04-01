<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CineMtropolitano</title>
        <link rel="stylesheet" href="../../css/style.css">

    </head>
    <body>
        <h1>Detalles de la Película</h1>

        <?php
        // Aquí debes obtener la información de la película desde tu base de datos
        // Supongamos que tienes un arreglo $pelicula con los detalles de la película
        // Por ejemplo:
        $pelicula = array(
            'titulo' => 'Título de la Película',
            'genero' => 'Género',
            'descripcion' => 'Descripción de la película',
            'trailer' => 'enlace_al_trailer'
        );
        ?>

        <h2><?php echo $pelicula['titulo']; ?></h2>
        <p><strong>Género:</strong> <?php echo $pelicula['genero']; ?></p>
        <p><strong>Descripción:</strong> <?php echo $pelicula['descripcion']; ?></p>

        <!-- Aquí incluimos el trailer de la película -->
        <iframe width="560" height="315" src="<?php echo $pelicula['trailer']; ?>" frameborder="0" allowfullscreen></iframe>

    </body>
</html>


