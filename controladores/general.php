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

// ---- Ventana Modal del Login
if (isset($_REQUEST['login'])) {
    
    $correo = $_REQUEST['correo'];
    $pass = base64_encode($_REQUEST['pass']);
    
    // Comprobamos si existe el usuario (aunque lo hará javascript antes) y lo guardamos en sesión
    $user = conexion::existeUsuario($correo, $pass);
    
    $rol = conexion::obtenerRolUsuario($user);
    
    $user->setRol($rol);
    
    $_SESSION['userObj'] = $user;
    
    header("Location: ../" . Constantes::INDEX);
    
}

// ---- Ventana Modal del Registro
if (isset($_REQUEST['register'])) {
    
    $correo = $_REQUEST['correo'];
    $pass = base64_encode($_REQUEST['pass']);
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    
    // Insertamos el nuevo usuario en BBDD
    conexion::Insertar_Dato(Constantes::USUARIO, $correo, $pass, $nombre, $apellido);
    
    // Cargamos al usuario en sesión para logearlo directamente en la página al registrarse
    $user = conexion::existeUsuario($correo, $pass);
    
    $rol = conexion::obtenerRolUsuario($user);
    
    $user->setRol($rol);
    
    $_SESSION['userObj'] = $user;
    
    header("Location: ../" . Constantes::INDEX);
    
}

// ---- Ventana Modal de las Noticias
if (isset($_REQUEST['notice'])) {
    
    
    
}

// ---- Ventana Modal de juego, guardaremos la 
if (isset($_REQUEST['valSubmit'])) {
    
    $user = $_SESSION['userObj'];
    
    $correo = $user->getCorreo();
    $idJuego = $_REQUEST['idJuego'];
    
    $resp = conexion::haSidoValorado($correo, $idJuego);
    
    if (!$resp) {
        
    } else {
        header("Location: ../" . $_SESSION['location'] . "?yaValorado=true");
    }
    
}

conexion::cerrarBBDD();