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
    $user = conexion::existeUsuarioPass($correo, $pass);

    if ($user != null) {
    
        $rol = conexion::obtenerRolUsuario($user);

        $user->setRol($rol);

        $_SESSION['userObj'] = $user;

        header("Location: ../" . Constantes::INDEX);
    } else {
        header("Location: ../" . Constantes::INDEX . "?noexiste=true");
    }
}

// ---- Ventana Modal del Registro
if (isset($_REQUEST['register'])) {

    $correo = $_REQUEST['correo'];
    $pass = base64_encode($_REQUEST['pass']);
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];

    // Miramos si existe el usuario en BBDD
    $userCromp = conexion::existeUsuario($correo);
    
    if ($userCromp == null) {
        // Insertamos el nuevo usuario en BBDD
        conexion::Insertar_Dato(Constantes::USUARIO, $correo, $pass, $nombre, $apellido);

        // Cargamos al usuario en sesión para logearlo directamente en la página al registrarse
        $user = conexion::existeUsuario($correo);

        $rol = conexion::obtenerRolUsuario($user);

        $user->setRol($rol);

        $_SESSION['userObj'] = $user;

        header("Location: ../" . Constantes::INDEX);
    } else {
        header("Location: ../" . Constantes::INDEX . "?yaexiste=true");
    }
}

// ---- Ventana Modal de juego, guardaremos la 
if (isset($_REQUEST['valSubmit'])) {

    $user = $_SESSION['userObj'];

    $val = $_REQUEST['valoracion'];
    $correo = $user->getCorreo();
    $idJuego = $_REQUEST['idJuego'];

    // Comprobamos que no haya sido valorado por ese usuario
    $resp = conexion::haSidoValorado($correo, $idJuego);

    if (!$resp) {

        // Insertamos la valoración
        conexion::Insertar_Valoracion(Constantes::VALORADOS, $correo, $idJuego, $val);

        // Recalculamos la media de valoraciones
        conexion::recValMedia($idJuego);

        switch ($_SESSION['location']) {
            case Constantes::LISTAGENERO:
                header("Location: ../vistas/listaJuegos/" . $_SESSION['location'] . "&rated=true");
                break;
            case Constantes::LISTANOMBRE:
                header("Location: ../vistas/listaJuegos/" . $_SESSION['location'] . "&rated=true");
                break;
            case Constantes::LISTAPLATAFORMA:
                header("Location: ../vistas/listaJuegos/" . $_SESSION['location'] . "&rated=true");
                break;
            default:
                break;
        }
    } else {
        switch ($_SESSION['location']) {
            case Constantes::LISTAGENERO:
                header("Location: ../vistas/listaJuegos/" . $_SESSION['location'] . "&yaValorado=true");
                break;
            case Constantes::LISTANOMBRE:
                header("Location: ../vistas/listaJuegos/" . $_SESSION['location'] . "&yaValorado=true");
                break;
            case Constantes::LISTAPLATAFORMA:
                header("Location: ../vistas/listaJuegos/" . $_SESSION['location'] . "&yaValorado=true");
                break;
            default:
                break;
        }
    }
}

// ---- Guardamos la nueva imagen del perfil del usuario
if (isset($_REQUEST['subFoto'])) {

    $user = $_SESSION['userObj'];

    $correo = $user->getCorreo();
    
    $dir_subida = '../imgs/perfiles/';
    $ficheroimgUno = $dir_subida . basename($_FILES['imgPerfilModal']['name']);

    move_uploaded_file($_FILES['imgPerfilModal']['tmp_name'], $ficheroimgUno);
    
    conexion::Modificar_Perfil(Constantes::USUARIO, $correo, basename($_FILES['imgPerfilModal']['name']));
    
    // Cargamos de nuevo el usuario
    $userNew = conexion::existeUsuario($correo);

    $rol = conexion::obtenerRolUsuario($userNew);

    $userNew->setRol($rol);

    $_SESSION['userObj'] = $userNew;
    
    header("Location: ../" . Constantes::INDEX);
}

conexion::cerrarBBDD();
