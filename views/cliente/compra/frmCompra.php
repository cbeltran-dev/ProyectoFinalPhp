<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Compra de Boletos de Cine</title>
        <link rel="stylesheet" href="../../../css/stylecompra.css">
        <link rel="stylesheet" href="../../../css/stylecines.css">
    </head>
    <style>

        .boton-comprar {
            display: inline-block;
            padding: 10px 20px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            background-color: red;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }


        .boton-comprar:hover {
            background-color: #ff3333;
            transition: background-color 0.3s, transform 0.5s ease-in-out;
            transform: scale(1.1);
        }
    </style>
    <body>
        <header>
            <h1>Compra de Boletos de Cine</h1>
        </header>
        <?php
        include_once '../../../dao/SucursalDAO.php';
        include_once '../../../bl/PeliculaBL.php';
        $id_usuario = $_GET['id_usuario'];
        $id_pelicula = $_GET["id"];
        $pelicompraBL = new PeliculaBL();
        $pelicompra = $pelicompraBL->buscar($id_pelicula);
        ?>

        <div class="banner-principal">
            <?php
            foreach ($pelicompra as $pelicompra1) {
                ?>
                <img src="<?php echo "../../../" . $pelicompra1['imagen_url']; ?>"alt="<?php echo $pelicompra1['titulo'] ?>">
                <h2 style="color:red; font-size: 30px;font-family: serif"><?php echo $pelicompra1['titulo'] ?></h2>
    <!--            <p><?php //echo $pelicompra1['clasificacion']  ?> | <?php //echo $pelicompra1['duracion']  ?> | Jue. 04 Abr. 2024</p>
                <p>Género: <?php //echo $pelicompra1['genero']  ?></p>-->
    <!--            <p>Sinopsis: La batalla épica continúa! La película de Legendary Pictures continúa el explosivo...</p>-->
                <p style="color:white; font-family: fantasy ">Fecha  :  <?php echo " " . date("d/m/Y") ?></p>
            <?php } ?>
        </div>

        <div class="filtro-sucursales" style="color:white; font-size: 30px;font-family: fantasy">
            <form id="sucursalForm" method="GET" action="">
                <label for="sucursal"  style="padding-bottom: 5%">Seleccionar : </label>

                <select id="sucursal" style="width: 350px ;margin-top: 15px;" name="cboSucursales" onchange="submitFormOnChange()">
                    <option>Seleccionar</option>
                    <?php
                    $sucrusalbl = new SucursalDAO();
                    $resultsucur = $sucrusalbl->filtrarSucursalPorPelicula($id_pelicula);
                    foreach ($resultsucur as $objSala) {
                        $selected = ($_GET['cboSucursales'] == $objSala['id_sucursal']) ? 'selected' : '';
                        echo '<option value="' . $objSala['id_sucursal'] . '" ' . $selected . '>' . $objSala['nombre'] . '</option>';
                    }
                    ?>
                </select>
                <input type="hidden" name="id" value="<?php echo $id_pelicula; ?>">
                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>"> <!-- Mantener id_usuario -->
            </form>
        </div>



        <div class="horarios-salas" id="horariosSalas">
            <?php
            if (isset($_GET['cboSucursales'])) {
                $id_sucursal = $_GET['cboSucursales'];
                $id_pelicula = $_GET['id']; // Obtener el id_pelicula de la URL
                $horario = $sucrusalbl->listarHorarios($id_sucursal, $id_pelicula);
                ?>
                <h2>Horarios y Salas</h2>
                <table>
                    <tr>
                        <th>Tipo de sala</th>
                        <th>Horario</th>
                        <th>Comprar entradas</th>
                    </tr>
                    <?php
                    foreach ($horario as $funcion) {
                        ?>
                        <tr>
                            <td><?php echo $funcion['tipo_sala'] ?></td>
                            <td><?php echo $funcion['horario'] ?></td>
                            <td><a href="frmRealizarCompra.php?id_usuario=<?php echo $id_usuario; ?>
                                   &id_pelicula=<?php echo $id_pelicula; ?>
                                   &id_funcion=<?php echo $funcion['id_funcion']; ?>
                                   &tipo_sala=<?php echo $funcion['tipo_sala']; ?>" 
                                   class="boton-comprar">Comprar</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <?php
            }
            ?>
        </div>

        <script>
            document.getElementById('sucursal').addEventListener('change', function () {
                var formData = new FormData(document.getElementById('sucursalForm'));
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            document.getElementById('horariosSalas').innerHTML = xhr.responseText;
                        } else {
                            // Manejar errores si es necesario
                        }
                    }
                };
                xhr.open('POST', true);
                xhr.send(formData);
            });



            function submitFormOnChange() {
                document.getElementById('sucursalForm').submit();
            }
        </script>
    </body>
</html>
