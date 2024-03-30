<?php

class Pelicula {

    private $id_pelicula;
    private $genero;
    private $titulo;
    private $sinopsis;
    private $duracion;
    private $director;
    private $fecha_creacion;
    private $clasificacion;
    private $imagen_url;
    private $estado;
    
    public function __construct() {
        
    }

    public function getId_pelicula() {
        return $this->id_pelicula;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getSinopsis() {
        return $this->sinopsis;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    public function getDirector() {
        return $this->director;
    }

    public function getFecha_creacion() {
        return $this->fecha_creacion;
    }

    public function getClasificacion() {
        return $this->clasificacion;
    }

    public function getImagen_url() {
        return $this->imagen_url;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setId_pelicula($id_pelicula): void {
        $this->id_pelicula = $id_pelicula;
    }

    public function setGenero($genero): void {
        $this->genero = $genero;
    }

    public function setTitulo($titulo): void {
        $this->titulo = $titulo;
    }

    public function setSinopsis($sinopsis): void {
        $this->sinopsis = $sinopsis;
    }

    public function setDuracion($duracion): void {
        $this->duracion = $duracion;
    }

    public function setDirector($director): void {
        $this->director = $director;
    }

    public function setFecha_creacion($fecha_creacion): void {
        $this->fecha_creacion = $fecha_creacion;
    }

    public function setClasificacion($clasificacion): void {
        $this->clasificacion = $clasificacion;
    }

    public function setImagen_url($imagen_url): void {
        $this->imagen_url = $imagen_url;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }


}
