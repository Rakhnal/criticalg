<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../clases/Usuario.php';
include_once '../clases/conexion.php';
include_once '../clases/Constantes.php';

conexion::abrirBBDD();
session_start();

if (isset($_SESSION['userObj'])) {
    $user = $_SESSION['userObj'];
}

// ---- Modifica al usuario en BBDD
if (isset($_REQUEST['modUser'])) {

    $correo = $_REQUEST['correo'];
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];

    // Modificamos el nombre en BBDD
    conexion::Modificar_Dato(Constantes::USUARIO, "NOMBRE", $nombre, $correo);

    // Modificamos el apellido en BBDD
    conexion::Modificar_Dato(Constantes::USUARIO, "APELLIDO", $apellido, $correo);

    header("Location: ../vistas/areaJuegos/" . Constantes::CRUD);
}

// ---- Borra al usuario de la BBDD
if (isset($_REQUEST['delUser'])) {

    $correo = $_REQUEST['correo'];

    // Borramos al usuario de BBDD
    conexion::Borrar_Dato(Constantes::USUARIO, $correo);

    header("Location: ../vistas/areaJuegos/" . Constantes::CRUD);
}

// ---- Pone el rol de Admin al usuario
if (isset($_REQUEST['upAdmin'])) {

    $correo = $_REQUEST['correo'];

    // Cambiamos el rol del usuario a Admin
    conexion::Modificar_Dato(Constantes::ROLES, "IDROL", Constantes::ADMIN, $correo);

    header("Location: ../vistas/areaJuegos/" . Constantes::CRUD);
}

// ---- Quita el Rol de Admin al usuario
if (isset($_REQUEST['dwAdmin'])) {

    $correo = $_REQUEST['correo'];

    // Cambiamos el rol del usuario a Usuario
    conexion::Modificar_Dato(Constantes::ROLES, "IDROL", Constantes::NORMAL, $correo);

    header("Location: ../vistas/areaJuegos/" . Constantes::CRUD);
}

// ---- Insertamos una nueva plataforma en BBDD
if (isset($_REQUEST['instPlat'])) {

    $nomPlat = $_REQUEST['nomPlat'];
    $desPlat = $_REQUEST['desPlat'];

    // Insertamos la nueva plataforma
    conexion::Insertar_PlatGenero(Constantes::PLATAFORMA, $nomPlat, $desPlat);

    header("Location: ../vistas/areaJuegos/" . Constantes::CATEGORIAS);
}

// ---- Insertamos un nuevo género en BBDD
if (isset($_REQUEST['instGen'])) {

    $nomGenero = $_REQUEST['nomGenero'];
    $desGenero = $_REQUEST['desGenero'];

    // Insertamos la nueva plataforma
    conexion::Insertar_PlatGenero(Constantes::GENERO, $nomGenero, $desGenero);

    header("Location: ../vistas/areaJuegos/" . Constantes::CATEGORIAS);
}

// ---- Borramos el género de BBDD
if (isset($_REQUEST['delGen'])) {

    $nomGenero = $_REQUEST['nomGenero'];

    // Insertamos la nueva plataforma
    conexion::Borrar_Dato(Constantes::GENERO, "NOMGENERO", $nomGenero);

    header("Location: ../vistas/areaJuegos/" . Constantes::CATEGORIAS);
}

// ---- Borramos la plataforma de  BBDD
if (isset($_REQUEST['delPlat'])) {

    $nomPlat = $_REQUEST['nomPlat'];

    // Insertamos la nueva plataforma
    conexion::Borrar_Dato(Constantes::PLATAFORMA, "NOMBRE", $nomPlat);

    header("Location: ../vistas/areaJuegos/" . Constantes::CATEGORIAS);
}

// ---- Insertamos el nuevo juego en BBDD
if (isset($_REQUEST['addGame'])) {

    $nomJuego = $_REQUEST['nomJuego'];
    $desJuego = $_REQUEST['desJuego'];
    $developer = $_REQUEST['developer'];
    $duration = $_REQUEST['duration'];
    $launch = $_REQUEST['launch'];
    $minPlayers = $_REQUEST['minPlayers'];
    $maxPlayers = $_REQUEST['maxPlayers'];
    $generos = $_REQUEST['generos'];
    $plataformas = $_REQUEST['plataformas'];

    $dir_subida = '../imgs/games/';
    $ficheroimgUno = $dir_subida . basename($_FILES['imgUno']['name']);
    $ficheroimgDos = $dir_subida . basename($_FILES['imgDos']['name']);
    $ficheroimgTres = $dir_subida . basename($_FILES['imgTres']['name']);

    move_uploaded_file($_FILES['imgUno']['tmp_name'], $ficheroimgUno);
    move_uploaded_file($_FILES['imgDos']['tmp_name'], $ficheroimgDos);
    move_uploaded_file($_FILES['imgTres']['tmp_name'], $ficheroimgTres);

    // Insertamos el juego
    conexion::Insertar_Juego($user, $nomJuego, $desJuego, $launch, $developer, $duration, $minPlayers, $maxPlayers, $generos, $plataformas, basename($_FILES['imgUno']['name']), basename($_FILES['imgDos']['name']), basename($_FILES['imgTres']['name']));

    header("Location: ../vistas/areaJuegos/" . Constantes::ADDJUEGO);
}

// ---- Borramos la plataforma de  BBDD
if (isset($_REQUEST['valGame'])) {

    $idJuego = $_REQUEST['idJuego'];

    // Insertamos la nueva plataforma
    conexion::Validate_Game(Constantes::JUEGO, $idJuego);

    header("Location: ../vistas/areaJuegos/" . Constantes::VALIDATE);
}

// ---- Ventana Modal de las Noticias
if (isset($_REQUEST['notice'])) {
    
    $correo = $user->getCorreo();
    
    $titular = $_REQUEST['titulo'];
    $cuerpo = $_REQUEST['cuerpo'];
    
    conexion::Insertar_Noticia(Constantes::NOTICIA, $titular, $cuerpo, $correo);
    
    header("Location: ../vistas/noticias/" . Constantes::NOTICIAS);
    
}

conexion::cerrarBBDD();
