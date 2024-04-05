    <?php

    class DetalleCompra {

       private $id_detalle_compra;
       private $id_compra;
       private $id_tipo_entrada;
       private $cantidad;
       private $subtotal;
       private $total;
       private $estado;

       public function __construct() {

       }

       public function getId_detalle_compra() {
           return $this->id_detalle_compra;
       }

       public function getId_compra() {
           return $this->id_compra;
       }

       public function getId_tipo_entrada() {
           return $this->id_tipo_entrada;
       }

       public function getCantidad() {
           return $this->cantidad;
       }

       public function getSubtotal() {
           return $this->subtotal;
       }

       public function getTotal() {
           return $this->total;
       }

       public function getEstado() {
           return $this->estado;
       }

       public function setId_detalle_compra($id_detalle_compra): void {
           $this->id_detalle_compra = $id_detalle_compra;
       }

       public function setId_compra($id_compra): void {
           $this->id_compra = $id_compra;
       }

       public function setId_tipo_entrada($id_tipo_entrada): void {
           $this->id_tipo_entrada = $id_tipo_entrada;
       }

       public function setCantidad($cantidad): void {
           $this->cantidad = $cantidad;
       }

       public function setSubtotal($subtotal): void {
           $this->subtotal = $subtotal;
       }

       public function setTotal($total): void {
           $this->total = $total;
       }

       public function setEstado($estado): void {
           $this->estado = $estado;
       }

    }

