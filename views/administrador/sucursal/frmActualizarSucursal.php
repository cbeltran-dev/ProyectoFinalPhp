<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario de Películas</title>
        <!-- Enlaces a los archivos JS de Bootstrap (jQuery y Popper.js) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- Enlace al archivo CSS de Bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/estilosadmin.css"></link>
        <SCript src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></SCript>
    </head>
    <body id="body">
        <header>
            <div class="icon__menu">
                <i class="fas fa-bars" id="btn_open"></i>
            </div>
        </header>
        <div class="menu__side" id="menu_side">
            <div class="name__page">
                <a href="../PagePrincipal.php"><i  class="fab fa-youtube"></i></a>
                <h4>CINE SISE</h4>
            </div>
            <div class="options__menu">           
                <a href="../pelicula/frmPelicula.php" class ="selected">
                    <div class="option">
                        <i class="fas fa-home" title="pelicula"></i>
                        <h4>Pelicula</h4>
                    </div>           
                </a>
                <a href="../funcion/frmFuncion.php">
                    <div class="option">
                        <i class="far fa-file" title="Funcion"></i>
                        <h4>Funcion</h4>
                    </div>           
                </a>
                <a href="../sucursal/frmSucursal.php">
                    <div class="option">
                        <i class="fas fa-video" title="Sucursal"></i>
                        <h4>Sucursal</h4>
                    </div>           
                </a>
                <a href="../sala/frmSala.php">
                    <div class="option">
                        <i class="far fa-sticky-note" title="Sala"></i>
                        <h4>Sala</h4>
                    </div>           
                </a>
                <a href="../usuario/frmUsuario.php">
                    <div class="option">
                        <i class="far fa-id-badge" title="Usuario"></i>
                        <h4>Usuario</h4>
                    </div>           
                </a>
            </div>
        </div>
        <main>
            <?php
            include_once '../../../BL/SucursalBL.php';
            $id = $_GET['id_sucursal'];
            $bl = new SucursalBL();
            $sucursal = $bl->buscar($id);
            ?>
            <div class="container">
                <?php
                    foreach ($sucursal as $sucu)
                    {
                        ?>
                <h1 class="mt-5 mb-4">Editar Sucursal: <?PHP echo $sucu['nombre']?></h1>
                <form action="ActualziarSucursal.php" method="post">
                    
                         <input type="hidden" name="id_sucursal" value="<?php echo $sucu ['id_sucursal'] ?>">
                        <div class="form-group row">
                            <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $sucu['nombre'] ?>" placeholder="Ingresar Nombre" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="direccion" class="col-sm-2 col-form-label">Direccion</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $sucu['direccion'] ?>" placeholder="Ingresar la direccion" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefono" class="col-sm-2 col-form-label">Telefono:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $sucu['telefono'] ?>" placeholder="Ingresar Telefono" required>
                            </div>
                        </div>        
                    <?php } ?>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Actualzar</button>
                        </div>
                    </div>
                </form>
        </main>
        <script src="../../../js/scrip_index3.js"></script>
    </body>
</html>
