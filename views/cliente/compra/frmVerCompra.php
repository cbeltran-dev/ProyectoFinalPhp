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

        h1,
        h2 {
            color: #ff4d4d;
            margin-top: 0;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
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

        header {
            background-color: #111;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }

        footer {
            background-color: #111;
            padding: 10px;
            text-align: center;
            color: #fff;
        }

        .total {
            margin-top: 20px;
            text-align: center;
            color: #fff;
            font-size: 24px;
        }

        .centered {
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #ff4d4d;
            text-decoration: none;
            margin-bottom: 40px;
            background-color: transparent;
            border: 2px solid #ff4d4d;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn:hover {
            background-color: #ff4d4d;
            color: #fff;
        }
    </style>
</head>

<body>
    <header>
        <h1>CINE SISE</h1>
        <h2 style="margin-bottom: 5px; margin-top: -20px; color: white;" >Confirmación de Compra</h2>
    </header>

    <div class="container">
        <?php
        include '../../../bl/CompraBL.php';

        if (isset($_GET['id_compra'])) {
            $id_compra = $_GET['id_compra'];

            $compraBL = new CompraBL();

            $info_compra = $compraBL->buscarCompra($id_compra);

            foreach ($info_compra as $compra) {

                $nombre_sucursal = $compra['nombre_sucursal'];
                $nombre_pelicula = $compra['nombre_pelicula'];
                $nombre_usuario = $compra['nombre_usuario'];
                $tipo_sala = $compra['tipo_sala'];
                $total = $compra['total'];
            }
        } else {
            echo "No se proporcionó un ID de compra.";
            exit;
        }
        ?>
       <h2 class="centered">Información General</h2>
        <p class="centered"><strong>Cine:</strong> <?php echo $nombre_sucursal; ?></p>
        <p class="centered"><strong>Película:</strong> <?php echo $nombre_pelicula; ?></p>
        <p class="centered"><strong>Cliente:</strong> <?php echo $nombre_usuario; ?></p>
        <p class="centered"><strong>Tipo de Sala:</strong><?php echo $tipo_sala //number_format($total, 2);  
                                                            ?></p>

        
        <h2 class="centered">Detalles de la Compra</h2>
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
                foreach ($detalle_compra as $detalle) { ?>
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

    <div class="total">
        <p><strong>Total de la Compra:</strong> S./<?php echo number_format($total, 2); ?></p>
        <a href="../../../index.php" class="btn">Regresar</a>
    </div>

    <footer>
        <p>Compra Realizada</p>
    </footer>
</body>

</html>
