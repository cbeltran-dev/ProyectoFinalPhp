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
            <div class="container">
                <h1 class="mt-5 mb-4">Formulario de Películas</h1>
                <form action="GuardarPelicula.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="genero" class="col-sm-2 col-form-label">Género:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="genero" name="genero" placeholder="Ingresar Género" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="titulo" class="col-sm-2 col-form-label">Título:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingresar Título" required>
                        </div>
                    </div> <div class="form-group row">
                        <label for="sinopsis" class="col-sm-2 col-form-label">Sinopsis:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sinopsis" name="sinopsis" placeholder="Ingresar Sinopsis" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="duracion" class="col-sm-2 col-form-label">Duración:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="duracion" name="duracion" placeholder="Ingresar Duración" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="clasificacion" class="col-sm-2 col-form-label">Clasificación:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="clasificacion" name="clasificacion" placeholder="Ingresar Clasificación" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="imagen_url" class="col-sm-2 col-form-label">Imagen de Portada:</label>
                        <div class="col-sm-10">
                            <input type="file" id="imagen_url" name="imagen_url" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Guardar Película</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="container">
                <h2>Listado de Películas</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Género</th>
                            <th scope="col">Título</th>
                            <th scope="col">Sinopsis</th>
                            <th scope="col">Duración</th>
                            <th scope="col">Clasificación</th>
                            <th scope="col">Imagen de Portada</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once '../../../BL/PeliculaBL.php';
                        $PeliculaBL = new PeliculaBL();
                        $resultado = $PeliculaBL->listar();
                        $j = 1;
                        foreach ($resultado as $pelicula)
                        {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $j ?></th>
                                <td><?php echo $pelicula['genero'] ?></td>
                                <td><?php echo $pelicula['titulo'] ?></td>
                                <td><?php echo $pelicula['sinopsis'] ?></td>
                                <td><?php echo $pelicula['duracion'] ?></td>
                                <td><?php echo $pelicula['clasificacion'] ?></td>
                                <td><img src="<?php echo "../../." . $pelicula['imagen_url'] ?>"alt="Imagen de Portada" style="width: 100px; height: 100px;"></td>
                                <td>
                                    <a id="editar" class="btn btn-success" href="frmActualizarPelicula.php?id_pelicula=<?php echo $pelicula['id_pelicula']; ?>">Editar</a>
                                    <a id="eliminar" class="btn btn-warning" href="EliminarPelicula.php?id_pelicula=<?php echo $pelicula['id_pelicula']; ?>">Eliminar</a>
                                </td>
                            </tr>
                            <?php
                            $j++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
        <script src="../../../js/scrip_index3.js"></script>
    </body>
</html>