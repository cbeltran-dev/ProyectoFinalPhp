<?php

include '../../../bl/CompraBL.php';


if(isset($_GET['id_compra'])) {
    $id_compra = $_GET['id_compra'];
    
   
    $compraBL = new CompraBL();
    
  
    $info_compra = $compraBL->getCompraInfo($id_compra);
    
    if($info_compra) {
        
        $id_usuario = $info_compra['id_usuario'];
        $id_funcion = $info_compra['id_funcion'];
        $total = $info_compra['total'];
        
      
        $detalles = $info_compra['detalles'];
    } else {
        echo "No se encontró la compra especificada.";
        exit; 
    }
} else {
    echo "No se proporcionó un ID de compra.";
    exit; 
}
?>
