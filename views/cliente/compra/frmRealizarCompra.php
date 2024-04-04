<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Compra de Boletos de Cine</title>
        <link rel="stylesheet" href="../../../css/stylecompra.css">
    </head>
    <style>
        .boton-container {
            text-align: center; 
            margin-top: 20px
        }
        
        .boton-comprar {
            display: inline-block;
            padding: 6px 15px;
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
            transform: scale(1.03); 
            cursor: pointer; 
        }
    </style>
    <body>
        <header>
            <h1>Boletería: Seleccionar Cantidad</h1>
        </header>
        <?php
        include_once '../../../dao/SucursalDAO.php';
        include_once '../../../bl/PeliculaBL.php';

        $id_pelicula = $_GET['id_pelicula'];
        $pelicompraBL = new PeliculaBL();
        $pelicompra = $pelicompraBL->buscar($id_pelicula);
        ?>
        <div class="banner-principal">
            <?php
            foreach ($pelicompra as $pelicompra1)
            {
                ?>
                <img src="<?php echo "../../../" . $pelicompra1['imagen_url']; ?>"alt="<?php echo $pelicompra1['titulo'] ?>">
                <h2><?php echo $pelicompra1['titulo'] ?></h2>
                <p><?php echo $pelicompra1['clasificacion'] ?> | <?php echo $pelicompra1['duracion'] ?> | Jue. 04 Abr. 2024</p>
                <p>Género: <?php echo $pelicompra1['genero'] ?></p>
    <!--            <p>Sinopsis: La batalla épica continúa! La película de Legendary Pictures continúa el explosivo...</p>-->
            <?php } ?>
        </div>
        <form style="text-align: center" action="RealizarCompra.php" method="post">
            <div class="selector-entrada">
                <h2 style="text-align: center;">Tipo de Entrada</h2>
                <div class="cantidad-container">
                    <label for="adulto" class="label-a">Adulto:</label>
                    <button type="button" onclick="decrementar('adulto')">-</button>
                    <input type="number" id="adulto" name="adulto" value="0" min="0">
                    <button type="button" onclick="incrementar('adulto')">+</button>
                </div>
                <div class="cantidad-container">
                    <label for="niño" class="label-n">Niño:</label>
                    <button type="button" onclick="decrementar('niño')">-</button>
                    <input type="number" id="niño" name="nino" value="0" min="0">
                    <button type="button" onclick="incrementar('niño')">+</button>
                </div>
                <div>
                    <input type="hidden" name="id_usuario" value="<?php echo $_GET['id_usuario'] ?>">
                    <input type="hidden" name="id_pelicula" value="<?php echo $id_pelicula ?>">
                    <input type="hidden" name="id_funcion" value="<?php echo $_GET['id_funcion'] ?>">
                    <input type="hidden" name="tipo_sala" value="<?php echo $_GET['tipo_sala'] ?>">
                </div>
                <div class="boton-container boton-comprar">
                    <button class="boton-comprar" type="submit">CONFIRMAR COMPRA</button>
                </div>
            </div>

        </form>
        <script>
            function incrementar(tipo) {
                const input = document.getElementById(tipo);
                input.stepUp();
            }

            function decrementar(tipo) {
                const input = document.getElementById(tipo);
                input.stepDown();
            }
        </script>
    </body>
</html>
