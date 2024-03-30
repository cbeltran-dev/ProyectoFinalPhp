<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Sala
 *
 * @author PC
 */
class Sala {
    private $id_sala;
    private $nombre;
    private $tipo_sala;
    private $capacidad;
    private $precio;
    private $estado;
    
    public function __construct() {
        
    }
    
    public function getId_sala() {
        return $this->id_sala;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getTipo_sala() {
        return $this->tipo_sala;
    }

    public function getCapacidad() {
        return $this->capacidad;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setId_sala($id_sala): void {
        $this->id_sala = $id_sala;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setTipo_sala($tipo_sala): void {
        $this->tipo_sala = $tipo_sala;
    }

    public function setCapacidad($capacidad): void {
        $this->capacidad = $capacidad;
    }

    public function setPrecio($precio): void {
        $this->precio = $precio;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }



}
