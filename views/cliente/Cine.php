<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../icons/favicon-32x32.png">
    <title>Cines</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/stylecines.css">
</head>
<body>
    <header class="header">
        <div class="menu container">
            <a href="#" class="logo">CINE CISE</a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="images/menu.png" class="menu-icono" alt="menu">
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="../../index.php">INICIO</a></li>
                    <li><a href="../../VIEWS/Cliente/Cine.php">CINES</a></li>
                    <li><a href="#">PELÍCULAS</a></li>
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
                    echo '<a href="./login/frmLogin.php" class="btn-1">Login</a>';
                }
                ?>
        </div>
    </header>

    <section class="cinemas container">
        <h2>Listado de Cines</h2>
        <hr>  
        <div class="cinema-grid">
              <?php
            include '../../DAO/ObtenerCines.php';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>  
            <div class="cinema-card">
                <div class="cinema-grid">                    
                    <img src=" <?php  echo "../../" . $row['imagen_url']; ?>" style="width: 200px !important; height: 200px !important;">
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
        <h3>CINE CISE</h3>
        <ul>
            <li><a href="../../index.php">INICIO</a></li>
            <li><a href="#">CINES</a></li>
            <li><a href="#">PELÍCULAS</a></li>
            <li><a href="#">NOSOTROS</a></li>
            <li><a href="#">CONTACTO</a></li>
        </ul>
    </footer>
</body>
</html>
