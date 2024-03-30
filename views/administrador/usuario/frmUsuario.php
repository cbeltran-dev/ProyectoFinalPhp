<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario Usuario</title>
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
                <h1 class="mt-5 mb-4">Formulario de Usuarios</h1>
                <form action="GuardarUsuario.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="cbo_rol" class="col-sm-2 col-form-label"> Rol:</label>
                        <div class="col-sm-10">                       
                            <select class="form-control" aria-label="cbo_rol" name="cbo_rol" >
                                <option>Seleccionar</option>
                                <?php
                                include_once '../../../bl/RolBL.php';
                                $rolbl = new RolBL();
                                $resrol = $rolbl->listar();
                                foreach ($resrol as $rol)
                                {
                                    ?>
                                    <option value="<?php echo $rol['id_rol'] ?>"><?php echo $rol['nombre_rol'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar Nombre" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellido" class="col-sm-2 col-form-label">Apellidos:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresar Apellidos" required>
                        </div>
                    </div> <div class="form-group row">
                        <label for="nombre_usuario" class="col-sm-2 col-form-label">Nombre Usuario:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Ingresar NombreUsuario" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="correo" class="col-sm-2 col-form-label">Correo:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese Email" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="clave" class="col-sm-2 col-form-label">Clave:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingresar Password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefono" class="col-sm-2 col-form-label"> Telefono:</label>
                        <div class="col-sm-10">
                            <input type="text" id="telefono" class="form-control" name="telefono" placeholder="Ingresar Telefono" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dni" class="col-sm-2 col-form-label"> Dni:</label>
                        <div class="col-sm-10">
                            <input type="text" id="dni" class="form-control" name="dni" placeholder="Ingresar Dni" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="container">
                <h2>Listado de Usuarios</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">NombreUsuario</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Clave</th>
                            <th scope="col">Telefono</th> 
                            <th scope="col">Dni</th> 
                            <th scope="col">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../../../BL/UsuarioBL.php';
                        $UsuarioBL = new UsuarioBL();
                        $resultado = $UsuarioBL->listarUsuario();
                        $j = 1;
                        foreach ($resultado as $usuario)
                        {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $j ?></th>
                                <td><?php echo $usuario['nombre_rol'] ?></td>
                                <td><?php echo $usuario['nombre'] ?></td>
                                <td><?php echo $usuario['apellido'] ?></td>
                                <td><?php echo $usuario['nombre_usuario'] ?></td>                        
                                <td><?php echo $usuario['correo'] ?></td>
                                <td><?php echo $usuario['clave'] ?></td>
                                <td><?php echo $usuario['telefono'] ?></td>
                                <td><?php echo $usuario['dni'] ?></td>
                                <td>
                                    <a id="editar" class="btn btn-success" href="frmActualizarUsuario.php?id_usuario=<?php echo $usuario['id_usuario']; ?>">Editar</a>
                                    <a id="eliminar" class="btn btn-warning" href="EliminarUsuario.php?id_usuario=<?php echo $usuario['id_usuario']; ?>">Eliminar</a>
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