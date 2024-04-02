<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CineMtropolitano</title>
        <link rel="stylesheet" href="../../css/style.css">
        <style>
            .cinema-card {
    display: flex;
    margin-bottom: 20px;
    padding-left: 200px
}

.cinema-image {
    flex: 0 0 auto;
    margin-right: 20px;
}

.cinema-image img {
    width: 200px; /* Ajusta el ancho según tus preferencias */
    height: auto;
}

.cinema-info {
    flex: 1;
}

.cinema-info h1 {
    font-size: 24px;
    margin-top: 0;
}

.cinema-info p {
    margin-top: 0;
    margin-bottom: 10px;
}
        </style>
    </head>
    
    <body>
        <header class="header2">
            <div class="menu container">
                <a href="../../index.php"><h1 class="logo">CINE SISE</h1></a>
                <input type="checkbox" id="menu" />
                <label for="menu"></label>
                <nav class="navbar">
                    <ul>
                        <li><a href="#">INICIO</a></li>
                        <li><a href="VIEWS/Cliente/Cine.php">CINES</a></li>
                        <li><a href="#">PELICULAS</a></li>
                        <li><a href="#">NOSOTROS</a></li>
                        <li><a href="#">CONTACTO</a></li>
                    </ul>
                </nav>
                <a href="VIEWS/Cliente/Login/Login.php" class="btn-1">Login</a>
            </div>  
            <iframe width="1350" height="415" src="https://www.youtube.com/embed/W15nBjRO5U4" frameborder="0" allowfullscreen></iframe>

        </header>

        <?php
        include '../../dao/ObtenerPeliculas.php';
        $id = $_GET['id'];
        $peli = new ObtenerPeliculas();
        $result = $peli->BuscarPelicula($id);
        foreach ($result as $p) {
            ?>
            <div class="cinema-card">
                <div class="cinema-image">
                    <img src="<?php echo "../../" . $p['imagen_url']; ?>" alt="">
                </div>
                <div class="cinema-info">
                    <h1><?php echo $p['titulo']; ?></h1>
                    <p><strong>Género:</strong> <?php echo $p['genero']; ?></p>
                    <p><strong>Sinopsis:</strong> <?php echo $p['sinopsis']; ?></p> 
                </div>
            <?php } ?>
        </div>
    </body>
</html>


