<?php


class Funcion {
    
    private $id_funcion;
    private $id_sala;
    private $id_pelicula;
    private $horario;
    private $asientos_disponibles;

    public function __construct()
    {
        
    }

    
    public function getId_funcion()
    {
        return $this->id_funcion;
    }

    public function getId_sala()
    {
        return $this->id_sala;
    }

    public function getId_pelicula()
    {
        return $this->id_pelicula;
    }

    public function getHorario()
    {
        return $this->horario;
    }

    public function getAsientosDisponibles()
    {
        return $this->asientosDisponibles;
    }

    public function setId_funcion($id_funcion): void
    {
        $this->id_funcion = $id_funcion;
    }

    public function setId_sala($id_sala): void
    {
        $this->id_sala = $id_sala;
    }

    public function setId_pelicula($id_pelicula): void
    {
        $this->id_pelicula = $id_pelicula;
    }

    public function setHorario($horario): void
    {
        $this->horario = $horario;
    }

    public function setAsientosDisponibles($asientosDisponibles): void
    {
        $this->asientosDisponibles = $asientosDisponibles;
    }


}
