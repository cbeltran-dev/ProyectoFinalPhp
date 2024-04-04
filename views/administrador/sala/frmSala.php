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
                <h1 class="mt-5 mb-4">Guardar Sala</h1>
                <form action="GuardarSala.php" method="post">
                    <div class="form-group">
                        <label for="cboSucursal">Sucursales:</label>
                        <select class="form-control" id="cboSucursal" name="cboSucursal" required>
                            <option value="">Seleccionar Sucursal</option>
                            <?php
                            include_once '../../../BL/SucursalBL.php';
                            $sucrusalbl = new SucursalBL();
                            $resultsucur = $sucrusalbl->listar();
                            foreach ($resultsucur as $objSala)
                            {
                                echo '<option value="' . $objSala['id_sucursal'] . '">' . $objSala['nombre'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo_sala">Tipo de Sala:</label>
                        <input type="text" class="form-control" id="tipo_sala" name="tipo_sala" placeholder="Ingresar Tipo de Sala" required>
                    </div>
                    <div class="form-group">
                        <label for="capacidad">Capacidad:</label>
                        <input type="number" class="form-control" id="capacidad" name="capacidad" placeholder="Ingresar Capacidad" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Guardar Sala</button>
                    </div>
                </form>
                <div class="container">
                    <h2>Listado de Salas</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sucursal</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo de Sala</th>
                                <th scope="col">Capacidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once '../../../BL/SalaBL.php';
                            $SalaBL = new SalaBL();
                            $resultado = $SalaBL->listarSalas();
                            $j = 1;
                            foreach ($resultado as $sala)
                            {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $j ?></th>
                                    <td><?php echo $sala['nombre_sucursal'] ?></td>
                                    <td><?php echo $sala['nombre'] ?></td>
                                    <td><?php echo $sala['tipo_sala'] ?></td>
                                    <td><?php echo $sala['capacidad'] ?></td>
                                    <td>
                                        <a id="editar" class="btn btn-success" href="frmActualizarSala.php?id_sala=<?php echo $sala['id_sala']; ?>">Editar</a>
                                        <a id="eliminar" class="btn btn-warning" href="EliminarSala.php?id_sala=<?php echo $sala['id_sala']; ?>">Eliminar</a>
                                    </td>
                                </tr>
                                <?php
                                $j++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <script src="../../../js/scrip_index3.js"></script>
    </body>
</html>