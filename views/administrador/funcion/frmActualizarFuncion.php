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
            include_once '../../../BL/FuncionBL.php';

            $id = $_GET['id_funcion'];
            $bl = new FuncionBL();
            $buscarFuncion = $bl->buscarFuncion($id);
            ?>
            <div class="container">
                <?php
                foreach ($buscarFuncion as $fun)
                {
                    ?>
                    <h1 class="mt-5 mb-4">Editar Funcion: </h1>
                    <form action="ActualizarFuncion.php" method="post">

                        <input type="hidden" name="id_funcion" value="<?php echo $fun ['id_funcion'] ?>">

                        <div class="form-group row">
                            <label for="Sala" class="col-sm-2 col-form-label">Sala:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="cboSala">
                                    <?php
                                    include_once '../../../BL/SalaBL.php';
                                    $blSala = new SalaBL();
                                    $lstSalas = $blSala->listarSalas();
                                    foreach ($lstSalas as $sala) :
                                        ?>
                                        <?php
                                        $selected = ($sala['id_sala'] == $_GET['id_sala']) ? 'selected' : '';
                                        $disabled = ($sala['id_sala'] == $_GET['id_sala']) ? 'disabled' : '';
                                        ?>
                                        <option value="<?php echo $sala['id_sala']; ?>" <?php echo $selected; ?>><?php echo $sala['nombre']; ?></option>
                                    <?php endforeach; ?>
                                    <?php if (!isset($_GET['id_sala'])) : ?>

                                        <?php foreach ($lstSala as $sala) : ?>
                                            <option value="<?php echo $sala['id_sala']; ?>"><?php echo $sala['nombre']; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Pelicula" class="col-sm-2 col-form-label">Película:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="cboPelicula">
                                    <?php
                                    include_once '../../../BL/PeliculaBL.php';
                                    $blpelicula = new PeliculaBL();
                                    $lstPeliculas = $blpelicula->listar();
                                    foreach ($lstPeliculas as $pelicula) : ?>
                                        <?php
                                        $selected = ($pelicula['id_pelicula'] == $_GET['id_pelicula']) ? 'selected' : '';
                                        $disabled = ($pelicula['id_pelicula'] == $_GET['id_pelicula']) ? 'disabled' : '';
                                        ?>
                                        <option value="<?php echo $pelicula['id_pelicula']; ?>" <?php echo $selected; ?>><?php echo $pelicula['titulo']; ?></option>
                                    <?php endforeach; ?>
                                    <?php if (!isset($_GET['id_pelicula'])) : ?>
                                        
                                        <?php foreach ($lstPelicula as $pelicula) : ?>
                                            <option value="<?php echo $pelicula['id_pelicula']; ?>"><?php echo $pelicula['titulo']; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="horario" class="col-sm-2 col-form-label">Horario:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="horario" name="horario" value="<?php echo $fun['horario'] ?>">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="asientos" class="col-sm-2 col-form-label">Asientos Disponibles:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="asientos" name="asientos" value="<?php echo $fun['asientos_disponibles'] ?>">
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


