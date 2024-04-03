
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
        
    </head>
    <body id="body">
        <main>
            <div class="container">
                <h1 class="mt-5 mb-4">Formulario de Funciones</h1>
                <form action="GuardarFuncion.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="cine" class="col-sm-2 col-form-label">Cine:</label>
                        <div class="col-sm-10">
                            <select class="form-control" aria-label="cboCine" name="cboCine"  >
                                <option>Seleccionar Sala</option>
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
                    </div>
                    
                    <div class="form-group row">
                        <label for="Funciones" class="col-sm-2 col-form-label">funciones:</label>
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
            </div>
        </main>
        <script src="../../../js/scrip_index3.js"></script>
    </body>
</html>






