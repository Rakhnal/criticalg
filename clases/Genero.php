<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Genero
 *
 * @author adonoso
 */
class Genero {
    private $nombre;
    private $descripcion;
    private $idGenero;
    
    function __construct($nombre, $descripcion, $idGenero) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->idGenero = $idGenero;
    }
    
    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getIdGenero() {
        return $this->idGenero;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setIdGenero($idGenero) {
        $this->idGenero = $idGenero;
    }
}
