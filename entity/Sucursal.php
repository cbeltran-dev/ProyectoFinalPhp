<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Sucursal
 *
 * @author PC
 */
class Sucursal {
    //put your code here
    private $id_sucursal;
    private $nombre;
    private $direccion;
    private $telefono;
    private $estado;
    
    public function __construct() {
        
    }

    
    public function getId_sucursal() {
        return $this->id_sucursal;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setId_sucursal($id_sucursal): void {
        $this->id_sucursal = $id_sucursal;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setDireccion($direccion): void {
        $this->direccion = $direccion;
    }

    public function setTelefono($telefono): void {
        $this->telefono = $telefono;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }


}
