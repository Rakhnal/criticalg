<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author adonoso
 */
class Usuario {
    
    private $correo;
    private $pass;
    private $nombre;
    private $apellido;
    private $foto;
    private $rol;
    
    function __construct($correo, $pass, $nombre, $apellido, $foto) {
        $this->correo = $correo;
        $this->pass = $pass;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->foto = $foto;
    }
    
    function getCorreo() {
        return $this->correo;
    }

    function getPass() {
        return $this->pass;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getFoto() {
        return $this->foto;
    }
    
    function getRol() {
        return $this->rol;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }
    
    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }
}
