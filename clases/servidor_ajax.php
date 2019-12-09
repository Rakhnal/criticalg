<?php

include_once 'Constantes.php';

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'infoJuego' : getInfoJuego();
            break;
    }
}

// Recoge los datos del evento seleccionado en la lista
function getInfoJuego() {

    $conexion = new mysqli(Constantes::IP, Constantes::USER, Constantes::PASS, Constantes::BBDD);

    $sql = "SELECT * FROM juego WHERE IDJUEGO = " . $_REQUEST['idJuego'];
    $resultado = mysqli_query($conexion, $sql);

    $i = 0;
    while ($tuplas = mysqli_fetch_assoc($resultado)) {
        $responder[$i] = $tuplas;
    }

    $plataformas = obtenerPlataformasJuego($_REQUEST['idJuego']);
    $generos = obtenerGenerosJuego($_REQUEST['idJuego']);
    
    array_push($responder[$i], $generos);
    array_push($responder[$i], $plataformas);

    $respuesta = json_encode($responder);

    echo $respuesta;
}

function obtenerPlataformasJuego($idJuego) {
    
    $conexion = new mysqli(Constantes::IP, Constantes::USER, Constantes::PASS, Constantes::BBDD);
    
    $sql = "SELECT P.* FROM plataformas PS, plataforma P WHERE PS.IDJUEGO = " . $idJuego . " AND P.IDPLAT = PS.IDPLAT";
    
    $resultado = mysqli_query($conexion, $sql);
    
    $responder = null;
    
    $i = 0;
    while ($tuplas = mysqli_fetch_assoc($resultado)) {
        $responder['plataformas'][$i] = $tuplas;
        $i++;
    }

    return $responder;
}

function obtenerGenerosJuego($idJuego) {
    $conexion = new mysqli(Constantes::IP, Constantes::USER, Constantes::PASS, Constantes::BBDD);
    
    $sql = "SELECT G.* FROM generos GS, genero G WHERE GS.IDJUEGO = " . $idJuego . " AND G.IDGENERO = GS.IDGENERO";
    
    $resultado = mysqli_query($conexion, $sql);
    
    $responder = null;
    
    $i = 0;
    while ($tuplas = mysqli_fetch_assoc($resultado)) {
        $responder['generos'][$i] = $tuplas;
        $i++;
    }

    return $responder;
}