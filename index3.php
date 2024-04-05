<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineMetropolitano</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stylecines.css">
</head>
<body>
    <!-- Tu contenido HTML existente -->
    <!-- Aquí colocaremos el carrusel de películas -->
    <section class="movies container">
        <h2>Películas Más Vistas</h2>
        <hr>
        <div class="cinema-grid" id="movie-carousel">
            <?php
            include './dao/ObtenerPeliculas.php';
            $objObpeli = new ObtenerPeliculas();
            $funcObtenerPelis = $objObpeli->obtenerPelis();
            while ($row = $funcObtenerPelis->fetch(PDO::FETCH_ASSOC)) :
            ?>  
            <div class="cinema-box"> 
                <div class="cinema-card">
                    <img src="<?php echo $row['imagen_url']; ?>" alt="<?php echo $row['titulo']; ?>">
                    <a href="./VIEWS/Cliente/PeliculaInfo.php?id=<?php echo $row['id_pelicula']; ?>" class="button-link">Ver más</a>
                </div>                
            </div>
            <?php endwhile; ?>    
        </div>
    </section>
    <!-- Fin del carrusel de películas -->

    <!-- Resto de tu HTML -->

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#movie-carousel').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
</body>
</html>
