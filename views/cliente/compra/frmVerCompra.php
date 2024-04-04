<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detalle de Compra</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #000;
                color: #fff;
            }

            .container {
                max-width: 800px;
                margin: auto;
                background-color: #222;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            }

            h1, h2 {
                color: #ff4d4d;
                margin-top: 0;
            }

            table {
                border-collapse: collapse;
                width: 100%;
                margin-top: 20px;
            }

            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #333;
                color: #fff;
            }

            tr:nth-child(even) {
                background-color: #444;
            }

            header, footer {
                background-color: #111;
                padding: 10px;
                text-align: center;
            }

            footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Confirmación de Compra</h1>
        </header>

        <div class="container">
            <?php
            include '../../../bl/CompraBL.php';

            if (isset($_GET['id_compra']))
            {
                $id_compra = $_GET['id_compra'];

                $compraBL = new CompraBL();

                $info_compra = $compraBL->buscarCompra($id_compra);

                foreach ($info_compra as $compra)
                {

                    $nombre_sucursal = $compra['nombre_sucursal'];
                    $nombre_pelicula = $compra['nombre_pelicula'];
                    $nombre_usuario = $compra['nombre_usuario'];
                    $tipo_sala = $compra['tipo_sala'];
                }
            }
            else
            {
                echo "No se proporcionó un ID de compra.";
                exit;
            }
            ?>
            <h2>Información de la Compra</h2>
            <p><strong>Cine:</strong> <?php echo $nombre_sucursal; ?></p>
            <p><strong>Película:</strong> <?php echo $nombre_pelicula; ?></p>
            <p><strong>Cliente:</strong> <?php echo $nombre_usuario; ?></p>
            <p><strong>Tipo de Sala:</strong><?php echo $tipo_sala//number_format($total, 2);  ?></p>

            <h2>Detalles de la Compra</h2>

            <table>
                <thead>
                    <tr>
                        <th>Tipo de Entrada</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $detalle_compra = $compraBL->buscarDetalleCompra($id_compra);
                    foreach ($detalle_compra as $detalle)
                    { ?>
                        <tr>
                            <td><?php echo $detalle['tipo_entrada']; ?></td>
                            <td><?php echo $detalle['cantidad']; ?></td>
                            <td>S./<?php echo number_format($detalle['precio_unitario'], 2); ?></td>
                            <td>S./<?php echo number_format($detalle['subtotal'], 2); ?></td>
                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>

        <footer>
            <p>Compra Realizada</p>
        </footer>
    </body>
</html>
