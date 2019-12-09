<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Juego
 *
 * @author adonoso
 */
class Juego {
    
    private $idJuego;
    private $nomJuego;
    private $desJuego;
    private $desarrollador;
    private $minPlayers;
    private $maxPlayers;
    private $duration;
    private $launch;
    private $valMedia;
    private $fotoUno;
    private $fotoDos;
    private $fotoTres;
    private $correo;
    private $plataformas;
    private $generos;
    
    function __construct($idJuego, $nomJuego, $desJuego, $desarrollador, $minPlayers, $maxPlayers, $duration, $launch, $valMedia, $fotoUno, $fotoDos, $fotoTres, $correo) {
        $this->idJuego = $idJuego;
        $this->nomJuego = $nomJuego;
        $this->desJuego = $desJuego;
        $this->desarrollador = $desarrollador;
        $this->minPlayers = $minPlayers;
        $this->maxPlayers = $maxPlayers;
        $this->duration = $duration;
        $this->launch = $launch;
        $this->valMedia = $valMedia;
        $this->fotoUno = $fotoUno;
        $this->fotoDos = $fotoDos;
        $this->fotoTres = $fotoTres;
        $this->correo = $correo;
    }

    function getPlataformas() {
        return $this->plataformas;
    }

    function getGeneros() {
        return $this->generos;
    }

    function setPlataformas($plataformas) {
        $this->plataformas = $plataformas;
    }

    function setGeneros($generos) {
        $this->generos = $generos;
    }
        
    function getIdJuego() {
        return $this->idJuego;
    }

    function getNomJuego() {
        return $this->nomJuego;
    }

    function getDesJuego() {
        return $this->desJuego;
    }

    function getDesarrollador() {
        return $this->desarrollador;
    }

    function getMinPlayers() {
        return $this->minPlayers;
    }

    function getMaxPlayers() {
        return $this->maxPlayers;
    }

    function getDuration() {
        return $this->duration;
    }

    function getLaunch() {
        return $this->launch;
    }

    function getValMedia() {
        return $this->valMedia;
    }

    function getFotoUno() {
        return $this->fotoUno;
    }

    function getFotoDos() {
        return $this->fotoDos;
    }

    function getFotoTres() {
        return $this->fotoTres;
    }

    function getCorreo() {
        return $this->correo;
    }

    function setIdJuego($idJuego) {
        $this->idJuego = $idJuego;
    }

    function setNomJuego($nomJuego) {
        $this->nomJuego = $nomJuego;
    }

    function setDesJuego($desJuego) {
        $this->desJuego = $desJuego;
    }

    function setDesarrollador($desarrollador) {
        $this->desarrollador = $desarrollador;
    }

    function setMinPlayers($minPlayers) {
        $this->minPlayers = $minPlayers;
    }

    function setMaxPlayers($maxPlayers) {
        $this->maxPlayers = $maxPlayers;
    }

    function setDuration($duration) {
        $this->duration = $duration;
    }

    function setLaunch($launch) {
        $this->launch = $launch;
    }

    function setValMedia($valMedia) {
        $this->valMedia = $valMedia;
    }

    function setFotoUno($fotoUno) {
        $this->fotoUno = $fotoUno;
    }

    function setFotoDos($fotoDos) {
        $this->fotoDos = $fotoDos;
    }

    function setFotoTres($fotoTres) {
        $this->fotoTres = $fotoTres;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }
}
