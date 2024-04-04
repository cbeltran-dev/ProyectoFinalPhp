<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Compra de Boletos de Cine</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: black;
                color: white;
                margin: 0;
                padding: 0;
            }
            header {
                background-color: #222;
                padding: 20px;
                text-align: center;
            }
            .banner-principal {
                width: calc(33.333% - 20px);
                float: left;
                padding: 20px;
            }
            .filtro-sucursales, .horarios-salas, .selector-entrada {
                width: calc(33.333% - 20px);
                float: left;
                margin: 20px 10px;
                padding: 20px;
                background-color: #222;
                border-radius: 10px;
            }
            .filtro-sucursales select, .selector-entrada input[type="number"] {
                width: 40px;
                padding: 10px;
                border: 1px solid #555;
                border-radius: 5px;
                font-size: 16px;
                background-color: #333;
                color: white;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border-bottom: 1px solid #555;
                padding: 10px;
                text-align: left;
            }
            th {
                background-color: #333;
            }
            td {
                background-color: #444;
            }
            .cantidad-container {
                display: flex;
                padding: 10px 10px;
                align-items: center;
            }
            .cantidad-container button {
                background-color: #333;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                margin: 0 5px;
            }
            .label-a {
                padding-left: 40px;
                padding-right: 100px;
            }
            .label-n {
                padding-left: 40px;
                padding-right: 112px;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Compra de Boletos de Cine</h1>
        </header>

        <div class="banner-principal">
            <img src="../../administrador/uploads/660a30b5936dc_Spectral.jpg" alt="Godzilla vs. Kong: El nuevo imperio">
            <h2>Godzilla vs. Kong: El nuevo imperio</h2>
            <p>M14 | 115 min | Mié. 03 Abr. 2024</p>
            <p>Género: Acción/Aventura</p>
            <p>Sinopsis: La batalla épica continúa! La película de Legendary Pictures continúa el explosivo...</p>
        </div>

        <div class="filtro-sucursales">
            <label for="sucursal">Sucursal:</label>
            <select id="sucursal" style="width: 350px">
                <option value="">Se     leccionar Sucursal</option>
                <?php
                include_once '../../../dao/SucursalDAO.php';
                $id_pelicula = $_GET["id"];
                $sucrusalbl = new SucursalDAO();
                $resultsucur = $sucrusalbl->listasucur($id_pelicula);
                foreach ($resultsucur as $objSala) {
                    echo '<option value="' . $objSala['id_sucursal'] . '">' . $objSala['nombre'] . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="selector-entrada">
            <h2>Tipo de Entrada</h2>
            <div class="cantidad-container">
                <label for="adulto" class="label-a">Adulto:</label>
                <button onclick="decrementar('adulto')">-</button>
                <input type="number" id="adulto" name="adulto" value="0" min="0">
                <button onclick="incrementar('adulto')">+</button>
            </div>
            <div class="cantidad-container">
                <label for="niño" class="label-n">Niño:</label>
                <button onclick="decrementar('niño')">-</button>
                <input type="number" id="niño" name="niño" value="0" min="0">
                <button onclick="incrementar('niño')">+</button>
            </div>
        </div>
        <div class="horarios-salas">
            <h2>Horarios y Salas</h2>
            <table>
                <tr>
                    <th>Tipo de sala</th>
                    <th>Horario</th>
                    <th>Comprar entradas</th>
                </tr>
                <?php
                
                $horario = $sucrusalbl->listasucur($id_pelicula);
                foreach ($horario as $uwu) {
                    

                    echo '<tr>';

                    echo '<td>' . $uwu['tipo_sala'] . '</td>';
                    echo '<td>' . $uwu['horario'] . '</td>';

                    echo '</tr>';
                }
                ?>
            </table>
        </div>



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