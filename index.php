<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CineMtropolitano</title>
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <header class="header">
            <div class="menu container">

                <h1 href="index.php" class="logo">CINE SISE</h1>
                <input type="checkbox" id="menu" />
                <label for="menu">
                    <img src="images/menu.png" class="menu-icono" alt="menu">
                </label>
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
            <div class="header-content container">
                <div class="header-1">
                    <img src="images/venom.png" alt="">
                    <div>                      
                        <a href="./VIEWS/Cliente/PeliculaInfo.php" class="button-link">Ver más</a>
                    </div> 
                </div>
                <div class="header-2">
                    <h1>Las Mejores <br> Películas</h1>
                    <img src="images/play.png" alt="">
                </div>
            </div>
        </header>
        <section class="movies container">
            <h2>Películas Más Vistas</h2>
            <hr>
            <div class="cinema-grid">
                <?php
                include './dao/ObtenerPeliculas.php';
                $objObpeli = new ObtenerPeliculas();
                $funcObtenerPelis = $objObpeli->obtenerPelis();
                $count = 0; // Contador para determinar cada 4 películas
                while ($row = $funcObtenerPelis->fetch(PDO::FETCH_ASSOC)) :
                    ?>  
                    <?php if ($count % 4 == 0) : ?>
                        <div class="cinema-row"> 
                        <?php endif; ?>
                        <div class="cinema-box"> 
                            <div class="cinema-card">
                                <img src="<?php echo $row['imagen_url']; ?>" alt="<?php echo $row['titulo']; ?>">
                                <div class="cinema-info">
                                    <h3><?php echo $row['titulo']; ?></h3>
                                    <p><?php echo $row['genero'] ?>, <?php echo $row['duracion'] ?>, <?php echo $row['clasificacion'] ?>.</p>              
                                    <div class="button-container">
                                        <a href="./VIEWS/Cliente/PeliculaInfo.php?id=<?php echo $row['id_pelicula']; ?>" class="button-link">Ver más</a>                                 
                                    </div>                             
                                </div>
                            </div>     
                        </div>

                        <?php $count++; ?>
                        <?php if ($count % 4 == 0) : ?>
                        </div> 
                    <?php endif; ?>
                <?php endwhile; ?>    
                <?php if ($count % 4 != 0) : ?>
                </div> 
            <?php endif; ?>               
        </div>
        <div class="load-more" id="load-more-1">Cargar más</div>
    </section>


    <footer class="footer container">  

        <h3>CINE METROPOLITANO</h3>
        <ul>
            <li><a href="#">INICIO</a></li>
            <li><a href="VIEWS/Cliente/Cine.php">CINES</a></li>
            <li><a href="index.php">PELICULAS</a></li>
            <li><a href="#">NOSOTROS</a></li>
            <li><a href="#">CONTACTO</a></li>
        </ul>

    </footer>

    <script src="script.js"></script>
</body>
</html>