<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../../icons/favicon-32x32.png">
        <title>Películas</title>
        <link rel="stylesheet" href="../../css/style.css">

    </head>
    <style>
        .cinema-card {
            display: flex;
            margin-bottom: 30px;
            padding-left: 250px
        }

        .cinema-image {
            flex: 0 0 auto;
            margin-right: 20px;
        }

        .cinema-image img {
            width: 200px;
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
    <body>
        <header class="header2">
            <div class="menu container">
                <a href="../../index.php"><h1 class="logo">CINE SISE</h1></a>
                <input type="checkbox" id="menu" />
                <label for="menu"></label>
                <nav class="navbar">
                    <ul>
                        <li><a href="../../index.php">INICIO</a></li>
                        <li><a href="../cliente/Cine.php">CINES</a></li>                       
                        <li><a href="#">NOSOTROS</a></li>
                        <li><a href="#">CONTACTO</a></li>
                    </ul>
                </nav>
                <?php
                session_start();
                if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true)
                {
                    
                    echo '<a href="./login/frmActualizarCliente.php?id_usuario=' . $_SESSION["id_usuario"] . '" class="btn-1" style="margin-left:-129px">Cuenta</a>';
                    echo '<a href="./LogicaPHP/Logout.php" class="btn-1" style="margin-left:-200px">Logout</a>';
                    
                }
                else
                {
                    echo '<a href="Login/Login.php" class="btn-1">Login</a>';
                }
                ?>
                
            </div>
            <?php
            include '../../dao/ObtenerPeliculas.php';
            $id = $_GET['id'];
            $peli = new ObtenerPeliculas();
            $result = $peli->BuscarPelicula($id);
            foreach ($result as $p)
            {
                ?>
                <iframe width="1350" height="415" src="<?php echo $p['trailer_url'] ?>" frameborder="0" allowfullscreen></iframe>

            </header>
            <div class="cinema-card">
                <div class="cinema-image">
                    <img src="<?php echo "../../" . $p['imagen_url']; ?>" style="width :300px; height:400px;" >
                </div>
                <div class="cinema-info">
                    <h1><?php echo $p['titulo']; ?></h1>
                    <p><strong>Género:</strong> <?php echo $p['genero']; ?></p>
                    <p style="margin-right: 350px;"><strong>Sinopsis:</strong> <?php echo $p['sinopsis']; ?></p>
                    <a href="compra/frmCompra.php" class="load-more" id="load-more-1" style="position: absolute;top: 30%;left: 41.5%;">Comprar</a>
                </div>
<?php } ?>
        </div>
    </body>
    <footer class="footer container">  

        <h3>CINE SISE</h3>
        <ul>
            <li><a href="../../index.php">INICIO</a></li>
            <li><a href="../cliente/Cine.php">CINES</a></li>
            <li><a href="index.php">PELICULAS</a></li>
            <li><a href="#">NOSOTROS</a></li>
            <li><a href="#">CONTACTO</a></li>
        </ul>

    </footer>
</html>


