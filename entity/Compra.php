<?php

class Compra {
    private $id_compra;
    private $id_usuario;
    private $id_funcion;
    private $fecha_compra;
    private $total;
    private $estado;

    public function __construct() {

    }

    public function getId_compra() {
        return $this->id_compra;
    }

    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function getId_funcion() {
        return $this->id_funcion;
    }

    public function getFecha_compra() {
        return $this->fecha_compra;
    }

    public function getTotal() {
        return $this->total;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setId_compra($id_compra): void {
        $this->id_compra = $id_compra;
    }

    public function setId_usuario($id_usuario): void {
        $this->id_usuario = $id_usuario;
    }

    public function setId_funcion($id_funcion): void {
        $this->id_funcion = $id_funcion;
    }

    public function setFecha_compra($fecha_compra): void {
        $this->fecha_compra = $fecha_compra;
    }

    public function setTotal($total): void {
        $this->total = $total;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }




}
