<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CineMtropolitano</title>
        <!--        <link rel="stylesheet" href="css/stylecines.css">-->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header class="header">
            <div class="menu container">
                <a href="#" class="logo">CINE METROPOLITANO</a>
                <input type="checkbox" id="menu" />
                <label for="menu">
                    <img src="images/menu.png" class="menu-icono" alt="menu">
                </label>
                <nav class="navbar">
                    <ul>
                        <li><a href="index.php">INICIO</a></li>
                        <li><a href="../../VIEWS/Cliente/Cine.php">CINES</a></li>
                        <li><a href="../../index.php">PELÍCULAS</a></li>
                        <li><a href="#">NOSOTROS</a></li>
                        <li><a href="#">CONTACTO</a></li>
                    </ul>
                </nav>
                <a href="../../VIEWS/Cliente/Login.php" class="btn-1">Login</a>
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
                                <a href="./VIEWS/Cliente/PeliculaInfo.php?id=<?php echo $row['id_pelicula']; ?>" class="button-link">Ver más</a>
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



    <section class="cinemas container">
        <h2>Listado de Cines</h2>
        <hr>

        <div class="cinema-grid">
            <?php
            include './dao/ObtenerCines.php';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
                ?>  
                <div class="cinema-card">
                    <div class="cinema-grid">                    
                        <img src="<?php echo $row['imagen_url']; ?>" alt="<?php echo $row['nombre']; ?>">
                        <div class="cinema-info">
                            <h3><?php echo $row['nombre']; ?></h3>
                            <p>Dirección: <?php echo $row['direccion']; ?></p>
                            <p>Teléfono: <?php echo $row['telefono']; ?></p>
                        </div>
                    </div>                   
                </div> 

            <?php endwhile; ?>                   
        </div>
    </section>


    <footer class="footer container">  
        <h3>CINE METROPOLITANO</h3>
        <ul>
            <li><a href="index.php">INICIO</a></li>
            <li><a href="views/cliente/Cine.php">CINES</a></li>
            <li><a href="index.php">PELÍCULAS</a></li>
            <li><a href="#">NOSOTROS</a></li>
            <li><a href="#">CONTACTO</a></li>
        </ul>
    </footer>
</body>
</html>
