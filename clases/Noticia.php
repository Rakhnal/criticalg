<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Noticia
 *
 * @author adonoso
 */
class Noticia {
    private $idNoticia;
    private $titular;
    private $cuerpo;
    private $correo;
    
    function __construct($idNoticia, $titular, $cuerpo, $correo) {
        $this->idNoticia = $idNoticia;
        $this->titular = $titular;
        $this->cuerpo = $cuerpo;
        $this->correo = $correo;
    }
    
    function getIdNoticia() {
        return $this->idNoticia;
    }

    function getTitular() {
        return $this->titular;
    }

    function getCuerpo() {
        return $this->cuerpo;
    }

    function getCorreo() {
        return $this->correo;
    }

    function setIdNoticia($idNoticia) {
        $this->idNoticia = $idNoticia;
    }

    function setTitular($titular) {
        $this->titular = $titular;
    }

    function setCuerpo($cuerpo) {
        $this->cuerpo = $cuerpo;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }
}
