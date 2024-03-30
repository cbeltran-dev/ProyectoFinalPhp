<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario Sala</title>
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
            include_once '../../../BL/UsuarioBL.php';
            $id = $_GET['id_usuario'];
            $bl = new UsuarioBL();
            $usuario = $bl->buscarUsuario($id);
            ?>
            <div class="container">
                <h1 class="mt-5 mb-4">Actualizar Usuario</h1>
                <form action="ActualizarUsuario.php" method="post" enctype="multipart/form-data">
                    <?php
                    foreach ($usuario as $usua)
                    {
                        ?>  
                        <input type="hidden" name="id_usuario" value="<?php echo $usua ['id_usuario'] ?>">
                        <div class="form-group row">
                            <label for="rol" class="col-sm-2 col-form-label">Rol:</label> 
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre_rol" name="nombre_rol" value="<?php echo $usua['nombre_rol'] ?>"  required disabled style="font-weight: bold;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usua['nombre'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido" class="col-sm-2 col-form-label">Apellido:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="apllido" name="apellido" value="<?php echo $usua['apellido'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sinopsis" class="col-sm-2 col-form-label">NombreUsuario:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="<?php echo $usua['nombre_usuario'] ?>" required>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="correo" class="col-sm-2 col-form-label">Correo:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $usua['correo'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="clave" class="col-sm-2 col-form-label">Clave:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="clave" name="clave" value="<?php echo $usua['clave'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefono" class="col-sm-2 col-form-label">Telefono:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $usua['telefono'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dni" class="col-sm-2 col-form-label">Dni:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $usua['dni'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                            </div>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </main>
        <script src="../../../js/scrip_index3.js"></script>
    </body>
</html>