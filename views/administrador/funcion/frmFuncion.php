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
            <div class="container">
                <h1 class="mt-5 mb-4">Formulario de Funciones</h1>
                <form action="GuardarFuncion.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="sucursal" class="col-sm-2 col-form-label">Sala:</label>
                        <div class="col-sm-10">
                            <select class="form-control" aria-label="cboSala" name="cboSala" >
                                <option>Seleccionar Sala</option>
                                <?php
                                include_once '../../../bl/SalaBL.php';
                                $salaBL = new SalaBL();
                                $lstSala = $salaBL->listarSalas();
                                foreach ($lstSala as $sala)
                                {
                                    ?>
                                    <option value="<?php echo $sala['id_sala'] ?>"><?php echo $sala['nombre'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pelicula" class="col-sm-2 col-form-label">Pelicula:</label>
                        <div class="col-sm-10">
                            <select class="form-control" aria-label="cboPelicula" name="cboPelicula" >
                                <option>Seleccionar Pelicula</option>
                                <?php
                                include_once '../../../bl/PeliculaBL.php';
                                $peliculaBL = new PeliculaBL();
                                $lstPelicula = $peliculaBL->listar();
                                foreach ($lstPelicula as $pelicula)
                                {
                                    ?>
                                    <option value="<?php echo $pelicula['id_pelicula'] ?>"><?php echo $pelicula['titulo'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <label for="horario" class="col-sm-2 col-form-label">Horario:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="duracion" name="horario" placeholder="Ingresar horario" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Guardar Función</button>
                        </div>
                    </div>
                </form>

                <h2>Listado de Funciones</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>                       
                            <th scope="col">Sala</th>
                            <th scope="col">Pelicula</th>
                            <th scope="col">Horario</th>
                            <th scope="col">Asientos Disponibles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once '../../../bl/FuncionBL.php';
                        $funcionBL = new FuncionBL();
                        $lstFuncion = $funcionBL->listarFunciones();
                        $j = 1;
                        foreach ($lstFuncion as $funcion)
                        {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $j ?></th>
                                <td><?php echo $funcion['nombre_sala'] ?></td>
                                <td><?php echo $funcion['nombre_pelicula'] ?></td>
                                <td><?php echo $funcion['horario'] ?></td>
                                <td><?php echo $funcion['asientos_disponibles'] ?></td>
                                <td>
                                    <a id="editar" class="btn btn-success" href="frmActualizarFuncion.php?id_funcion=<?php echo $funcion['id_funcion']; ?>&id_sala=<?php echo $funcion['id_sala']; ?>&id_pelicula=<?php echo $funcion['id_pelicula']; ?>">Editar</a>
                                    <a id="eliminar" class="btn btn-warning" href="EliminarFuncion.php?id_funcion=<?php echo $funcion['id_funcion']; ?>">Eliminar</a>
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




