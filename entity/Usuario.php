<?php
class Usuario {
        
    private $id_usuario;
    private $id_rol;
    private $nombre;
    private $apellido;
    private $nombre_usuario;
    private $clave;
    private $correo;
    private $telefono;
    private $dni;
    private $estado;
    
    public function __construct() {
        
    }

    
    
    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function getId_rol() {
        return $this->id_rol;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    public function getClave() {
        return $this->clave;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setId_usuario($id_usuario): void {
        $this->id_usuario = $id_usuario;
    }

    public function setId_rol($id_rol): void {
        $this->id_rol = $id_rol;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido): void {
        $this->apellido = $apellido;
    }

    public function setNombre_usuario($nombre_usuario): void {
        $this->nombre_usuario = $nombre_usuario;
    }

    public function setClave($clave): void {
        $this->clave = $clave;
    }

    public function setCorreo($correo): void {
        $this->correo = $correo;
    }

    public function setTelefono($telefono): void {
        $this->telefono = $telefono;
    }

    public function setDni($dni): void {
        $this->dni = $dni;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }


    
}
