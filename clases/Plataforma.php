<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Plataforma
 *
 * @author adonoso
 */
class Plataforma {
    private $nombre;
    private $descripcion;
    private $idPlat;
    
    function __construct($nombre, $descripcion, $idPlat) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->idPlat = $idPlat;
    }
    
    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getIdPlat() {
        return $this->idPlat;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setIdPlat($idPlat) {
        $this->idPlat = $idPlat;
    }

}
