<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexion
 *
 * @author adonoso
 */
class conexion {

    public static $CONEXION;

    // Abrimos devolviendo la conexión a BBDD
    public static function abrirBBDD() {

        $conexion = new mysqli(Constantes::IP, Constantes::USER, Constantes::PASS, Constantes::BBDD);

        if (mysqli_connect_errno($conexion)) {
            print "Fallo al conectar a MySQL: " . mysqli_connect_error();
        } else {
            self::$CONEXION = $conexion;
        }
    }

    // Cerramos la conexión a BBDD
    public static function cerrarBBDD() {
        self::$CONEXION->close();
    }

    // Buscamos el usuario en la BBDD
    public static function existeUsuario($correo) {

        $query = "SELECT * FROM usuario WHERE CORREO = ?";
        $stmt = self::$CONEXION->prepare($query);

        $stmt->bind_param("s", $correo);

        $stmt->execute();
        $result = $stmt->get_result();
        while ($fila = $result->fetch_assoc()) {
            $userEnc = new Usuario($fila["CORREO"], $fila["PASSWORD"], $fila["NOMBRE"], $fila["APELLIDO"], $fila["FOTO"]);
        }

        return $userEnc;
    }

    // Buscamos el usuario en la BBDD
    public static function existeUsuarioPass($correo, $pass) {

        $query = "SELECT * FROM usuario WHERE CORREO = ? AND PASSWORD = ?";
        $stmt = self::$CONEXION->prepare($query);

        $stmt->bind_param("ss", $correo, $pass);

        $stmt->execute();
        $result = $stmt->get_result();
        while ($fila = $result->fetch_assoc()) {
            $userEnc = new Usuario($fila["CORREO"], $fila["PASSWORD"], $fila["NOMBRE"], $fila["APELLIDO"], $fila["FOTO"]);
        }

        return $userEnc;
    }
    
    // Buscamos el rol del usuario
    public static function obtenerUsuarios() {
        $query = "SELECT * FROM usuario";
        $stmt = self::$CONEXION->prepare($query);

        $stmt->execute();
        $result = $stmt->get_result();

        $i = 0;
        while ($fila = $result->fetch_assoc()) {
            $userEnc = new Usuario($fila["CORREO"], $fila["PASSWORD"], $fila["NOMBRE"], $fila["APELLIDO"], $fila["FOTO"]);
            $userEnc->setRol(self::obtenerRolUsuario($userEnc));
            $users[$i] = $userEnc;
            $i++;
        }

        return $users;
    }

    // Sacamos todos los géneros
    public static function obtenerGeneros() {
        $query = "SELECT * FROM genero";
        $stmt = self::$CONEXION->prepare($query);

        $stmt->execute();
        $result = $stmt->get_result();

        $i = 0;
        while ($fila = $result->fetch_assoc()) {
            $genero = new Genero($fila["NOMGENERO"], $fila["DESCRIPCION"], $fila["IDGENERO"]);
            $generos[$i] = $genero;
            $i++;
        }

        return $generos;
    }

    // Sacamos todos los géneros
    public static function obtenerPlataformas() {
        $query = "SELECT * FROM plataforma";
        $stmt = self::$CONEXION->prepare($query);

        $stmt->execute();
        $result = $stmt->get_result();

        $i = 0;
        while ($fila = $result->fetch_assoc()) {
            $plataforma = new Plataforma($fila["NOMBRE"], $fila["DESCRIPCION"], $fila["IDPLAT"]);
            $plataformas[$i] = $plataforma;
            $i++;
        }

        return $plataformas;
    }

    // Sacamos todos los géneros
    public static function obtenerPlataforma($idPlat) {
        $query = "SELECT * FROM plataforma WHERE IDPLAT = " . $idPlat;
        $stmt = self::$CONEXION->prepare($query);

        $stmt->execute();
        $result = $stmt->get_result();

        while ($fila = $result->fetch_assoc()) {
            $plataforma = new Plataforma($fila["NOMBRE"], $fila["DESCRIPCION"], $fila["IDPLAT"]);
        }

        return $plataforma;
    }

    // Sacamos todas las plataformas de un juego en concreto
    public static function obtenerPlataformasJuego($idJuego) {
        $query = "SELECT P.* FROM plataformas PS, plataforma P WHERE PS.IDJUEGO = ? AND P.IDPLAT = PS.IDPLAT";
        $stmt = self::$CONEXION->prepare($query);

        $stmt->bind_param("i", $idJuego);

        $stmt->execute();
        $result = $stmt->get_result();

        $plataformas = null;

        $i = 0;
        while ($fila = $result->fetch_assoc()) {
            $plataforma = new Plataforma($fila["NOMBRE"], $fila["DESCRIPCION"], $fila["IDPLAT"]);
            $plataformas[$i] = $plataforma;
            $i++;
        }

        return $plataformas;
    }

    // Sacamos todos los géneros
    public static function obtenerGenero($idGenero) {
        $query = "SELECT * FROM genero WHERE IDGENERO = " . $idGenero;
        $stmt = self::$CONEXION->prepare($query);

        $stmt->execute();
        $result = $stmt->get_result();

        while ($fila = $result->fetch_assoc()) {
            $genero = new Genero($fila["NOMGENERO"], $fila["DESCRIPCION"], $fila["IDGENERO"]);
        }

        return $genero;
    }

    // Sacamos todos los géneros
    public static function obtenerGenerosJuego($idJuego) {
        $query = "SELECT G.* FROM generos GS, genero G WHERE GS.IDJUEGO = ? AND G.IDGENERO = GS.IDGENERO";
        $stmt = self::$CONEXION->prepare($query);

        $stmt->bind_param("i", $idJuego);

        $stmt->execute();
        $result = $stmt->get_result();

        $generos = null;

        $i = 0;
        while ($fila = $result->fetch_assoc()) {
            $genero = new Genero($fila["NOMGENERO"], $fila["DESCRIPCION"], $fila["IDGENERO"]);
            $generos[$i] = $genero;
            $i++;
        }

        return $generos;
    }

    // Sacamos todos los juegos que no estén validados
    public static function obtenerJuegos() {
        $query = "SELECT * FROM juego WHERE VALIDADO = 1";
        $stmt = self::$CONEXION->prepare($query);

        $stmt->execute();
        $result = $stmt->get_result();

        $juegos = null;

        $i = 0;
        while ($fila = $result->fetch_assoc()) {
            $juego = new Juego($fila["IDJUEGO"], $fila["NOMJUEGO"], $fila["DESJUEGO"], $fila["DESARROLLADOR"], $fila["MINPLAYERS"], $fila["MAXPLAYERS"], $fila["DURATION"], $fila["LAUNCH"], $fila["VALMEDIA"], $fila["FOTOUNO"], $fila["FOTODOS"], $fila["FOTOTRES"], $fila["CORREO"]);

            $plataformas = self::obtenerPlataformasJuego($fila["IDJUEGO"]);
            $generos = self::obtenerGenerosJuego($fila["IDJUEGO"]);

            $juego->setGeneros($generos);
            $juego->setPlataformas($plataformas);

            $juegos[$i] = $juego;
            $i++;
        }

        return $juegos;
    }

    // Sacamos todos los juegos que no estén validados
    public static function obtenerJuegosPend() {
        $query = "SELECT * FROM juego WHERE VALIDADO = 0";
        $stmt = self::$CONEXION->prepare($query);

        $stmt->execute();
        $result = $stmt->get_result();

        $juegos = null;

        $i = 0;
        while ($fila = $result->fetch_assoc()) {
            $juego = new Juego($fila["IDJUEGO"], $fila["NOMJUEGO"], $fila["DESJUEGO"], $fila["DESARROLLADOR"], $fila["MINPLAYERS"], $fila["MAXPLAYERS"], $fila["DURATION"], $fila["LAUNCH"], $fila["VALMEDIA"], $fila["FOTOUNO"], $fila["FOTODOS"], $fila["FOTOTRES"], $fila["CORREO"]);

            $plataformas = self::obtenerPlataformasJuego($fila["IDJUEGO"]);
            $generos = self::obtenerGenerosJuego($fila["IDJUEGO"]);

            $juego->setGeneros($generos);
            $juego->setPlataformas($plataformas);

            $juegos[$i] = $juego;
            $i++;
        }

        return $juegos;
    }

    // Sacamos todos los juegos que empiecen por una letra dada
    public static function obtenerJuegosNombre($letra) {
        $query = "SELECT * FROM juego WHERE UPPER(NOMJUEGO) LIKE UPPER('" . $letra . "%') AND VALIDADO = 1";
        $stmt = self::$CONEXION->prepare($query);

        $stmt->execute();
        $result = $stmt->get_result();

        $juegos = null;

        $i = 0;
        while ($fila = $result->fetch_assoc()) {
            $juego = new Juego($fila["IDJUEGO"], $fila["NOMJUEGO"], $fila["DESJUEGO"], $fila["DESARROLLADOR"], $fila["MINPLAYERS"], $fila["MAXPLAYERS"], $fila["DURATION"], $fila["LAUNCH"], $fila["VALMEDIA"], $fila["FOTOUNO"], $fila["FOTODOS"], $fila["FOTOTRES"], $fila["CORREO"]);

            $plataformas = self::obtenerPlataformasJuego($fila["IDJUEGO"]);
            $generos = self::obtenerGenerosJuego($fila["IDJUEGO"]);

            $juego->setGeneros($generos);
            $juego->setPlataformas($plataformas);

            $juegos[$i] = $juego;
            $i++;
        }

        return $juegos;
    }

    // Sacamos todos los juegos que empiecen por una letra dada
    public static function obtenerJuegosGenero($genero) {
        $query = "SELECT J.* FROM juego J, generos GS WHERE J.IDJUEGO = GS.IDJUEGO AND GS.IDGENERO = " . $genero . " AND VALIDADO = 1";
        $stmt = self::$CONEXION->prepare($query);

        $stmt->execute();
        $result = $stmt->get_result();

        $juegos = null;

        $i = 0;
        while ($fila = $result->fetch_assoc()) {
            $juego = new Juego($fila["IDJUEGO"], $fila["NOMJUEGO"], $fila["DESJUEGO"], $fila["DESARROLLADOR"], $fila["MINPLAYERS"], $fila["MAXPLAYERS"], $fila["DURATION"], $fila["LAUNCH"], $fila["VALMEDIA"], $fila["FOTOUNO"], $fila["FOTODOS"], $fila["FOTOTRES"], $fila["CORREO"]);

            $plataformas = self::obtenerPlataformasJuego($fila["IDJUEGO"]);
            $generos = self::obtenerGenerosJuego($fila["IDJUEGO"]);

            $juego->setGeneros($generos);
            $juego->setPlataformas($plataformas);

            $juegos[$i] = $juego;
            $i++;
        }

        return $juegos;
    }

    // Sacamos todos los juegos que empiecen por una letra dada
    public static function obtenerJuegosPlataforma($plataforma) {
        $query = "SELECT J.* FROM juego J, plataformas PS WHERE J.IDJUEGO = PS.IDJUEGO AND PS.IDPLAT = " . $plataforma . " AND VALIDADO = 1";
        $stmt = self::$CONEXION->prepare($query);

        $stmt->execute();
        $result = $stmt->get_result();

        $juegos = null;

        $i = 0;
        while ($fila = $result->fetch_assoc()) {
            $juego = new Juego($fila["IDJUEGO"], $fila["NOMJUEGO"], $fila["DESJUEGO"], $fila["DESARROLLADOR"], $fila["MINPLAYERS"], $fila["MAXPLAYERS"], $fila["DURATION"], $fila["LAUNCH"], $fila["VALMEDIA"], $fila["FOTOUNO"], $fila["FOTODOS"], $fila["FOTOTRES"], $fila["CORREO"]);

            $plataformas = self::obtenerPlataformasJuego($fila["IDJUEGO"]);
            $generos = self::obtenerGenerosJuego($fila["IDJUEGO"]);

            $juego->setGeneros($generos);
            $juego->setPlataformas($plataformas);

            $juegos[$i] = $juego;
            $i++;
        }

        return $juegos;
    }

    // Buscamos el rol del usuario
    public static function obtenerRolUsuario($user) {
        $query = "SELECT IDROL FROM roles WHERE CORREO = ?";
        $stmt = self::$CONEXION->prepare($query);

        $correo = $user->getCorreo();

        $stmt->bind_param("s", $correo);

        $stmt->execute();
        $result = $stmt->get_result();
        while ($fila = $result->fetch_assoc()) {
            $rol = $fila['IDROL'];
        }

        return $rol;
    }
    
    // Buscamos el rol del usuario
    public static function obtenerNoticias() {
        $query = "SELECT * FROM noticia";
        $stmt = self::$CONEXION->prepare($query);

        $stmt->execute();
        $result = $stmt->get_result();
        
        $i = 0;
        $noticias = null;
        while ($fila = $result->fetch_assoc()) {
            $noticia = new Noticia($fila['IDNOTICIA'], $fila['TITULAR'], $fila['CUERPO'], $fila['CORREO']);
            $noticias[$i] = $noticia;
            $i++;
        }

        return $noticias;
    }

    //----------------------------------------------------------
    public static function haSidoValorado($correo, $idJuego) {
        
        $sql = "SELECT * FROM valorados WHERE IDJUEGO = " . $idJuego . " AND CORREO = '" . $correo . "'";
        $stmt = self::$CONEXION->prepare($sql);
        
        $stmt->execute();
        $result = $stmt->get_result();
        
        $res = false;
        
        while ($fila = $result->fetch_assoc()) {
            $res = true;
        }

        return $res;
    }
    
    //----------------------------------------------------------
    public static function recValMedia($idJuego) {
        
        $sql = "SELECT AVG(VAL) AS VALMEDIA FROM valorados WHERE IDJUEGO = " . $idJuego;
        $stmt = self::$CONEXION->prepare($sql);
        
        $stmt->execute();
        $result = $stmt->get_result();
        
        $res = 0;
        
        while ($fila = $result->fetch_assoc()) {
            $res = $fila['VALMEDIA'];
        }

        $queryMedia = "UPDATE juego SET VALMEDIA = ? WHERE IDJUEGO = ?";
        $stmtMedia = self::$CONEXION->prepare($queryMedia);

        $stmtMedia->bind_param("di", $res, $idJuego);

        $stmtMedia->execute();
    }

    //----------------------------------------------------------
    public static function Validate_Game($tabla, $idJuego) {

        $query = "UPDATE " . $tabla . " SET VALIDADO = 1 WHERE IDJUEGO = ?";
        $stmt = self::$CONEXION->prepare($query);

        $stmt->bind_param("i", $idJuego);

        $stmt->execute();
    }

    //----------------------------------------------------------
    public static function Modificar_Dato($tabla, $campo, $valor, $correo) {

        $query = "UPDATE " . $tabla . " SET " . $campo . " = ? WHERE CORREO = ?";
        $stmt = self::$CONEXION->prepare($query);

        $stmt->bind_param("ss", $valor, $correo);

        $stmt->execute();
    }

    //----------------------------------------------------------
    public static function Modificar_Password($tabla, $user, $pass) {

        $query = "UPDATE " . $tabla . " SET pass = ? WHERE user = ?";
        $stmt = self::$CONEXION->prepare($query);

        $stmt->bind_param("ss", $pass, $user);

        $stmt->execute();
    }
    
    //----------------------------------------------------------
    public static function Modificar_Perfil($tabla, $correo, $foto) {

        $query = "UPDATE " . $tabla . " SET FOTO = ? WHERE CORREO = ?";
        $stmt = self::$CONEXION->prepare($query);

        $stmt->bind_param("ss", $foto, $correo);

        $stmt->execute();
    }

    //----------------------------------------------------------
    public static function Insertar_Dato($tabla, $correo, $pass, $nombre, $apellido) {

        $query = "INSERT INTO " . $tabla . " (CORREO, PASSWORD, NOMBRE, APELLIDO, FOTO) VALUES (?,?,?,?, NULL)";

        $stmt = self::$CONEXION->prepare($query);

        $stmt->bind_param("ssss", $correo, $pass, $nombre, $apellido);

        $stmt->execute();

        $queryrol = "INSERT INTO roles (CORREO, IDROL) VALUES (?,?)";

        $stmtrol = self::$CONEXION->prepare($queryrol);

        $stmtrol->bind_param("ss", $correo, Constantes::NORMAL);

        $stmtrol->execute();
    }

    //----------------------------------------------------------
    public static function Insertar_Juego($user, $nomJuego, $desJuego, $dateJuego, $developer, $duracion, $minPlayers, $maxPlayers, $generos, $plataformas, $foto1, $foto2, $foto3) {

        // Insertamos el juego en la tabla JUEGO sin imagenes y sin enlazar con generos ni plataformas
        $query = "INSERT INTO juego(`NOMJUEGO`, `DESJUEGO`, `DESARROLLADOR`, `MINPLAYERS`, `MAXPLAYERS`, `DURATION`, `LAUNCH`, `VALMEDIA`, `FOTOUNO`, `FOTODOS`, `FOTOTRES`, `VALIDADO`, `CORREO`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = self::$CONEXION->prepare($query);

        $valMedia = 0;
        $correo = $user->getCorreo();

        if ($user->getRol() == Constantes::ADMIN) {
            $validado = 1;
        } else {
            $validado = 0;
        }

        $stmt->bind_param("sssiiisdsssis", $nomJuego, $desJuego, $developer, $minPlayers, $maxPlayers, $duracion, $dateJuego, $valMedia, $foto1, $foto2, $foto3, $validado, $correo);

        $stmt->execute();

        // Buscamos el juego recien insertado para saber su ID
        $queryJuego = "SELECT IDJUEGO FROM juego WHERE NOMJUEGO = ?";
        $stmtJuego = self::$CONEXION->prepare($queryJuego);

        $stmtJuego->bind_param("s", $nomJuego);

        $stmtJuego->execute();
        $resultJuego = $stmtJuego->get_result();
        while ($filaJuego = $resultJuego->fetch_assoc()) {
            $idJuego = $filaJuego['IDJUEGO'];
        }

        // Insertamos los géneros y las plataformas a las que pertenece el juego
        foreach ($generos as $genero) {

            $queryGeneros = "INSERT INTO generos VALUES (?,?)";

            $stmtGeneros = self::$CONEXION->prepare($queryGeneros);

            $stmtGeneros->bind_param("ii", $idJuego, $genero);

            $stmtGeneros->execute();
        }

        foreach ($plataformas as $plataforma) {

            $queryGeneros = "INSERT INTO plataformas VALUES (?,?)";

            $stmtGeneros = self::$CONEXION->prepare($queryGeneros);

            $stmtGeneros->bind_param("ii", $idJuego, $plataforma);

            $stmtGeneros->execute();
        }
    }

    //----------------------------------------------------------
    public static function Insertar_PlatGenero($tabla, $nombre, $descripcion) {

        $query = "INSERT INTO " . $tabla . " VALUES (NULL, ?,?)";

        $stmt = self::$CONEXION->prepare($query);

        $stmt->bind_param("ss", $nombre, $descripcion);

        $stmt->execute();
    }
    
    //----------------------------------------------------------
    public static function Insertar_Noticia($tabla, $titular, $cuerpo, $correo) {

        $query = "INSERT INTO " . $tabla . " VALUES (NULL,?,?,?)";

        $stmt = self::$CONEXION->prepare($query);

        $stmt->bind_param("sss", $titular, $cuerpo, $correo);

        $stmt->execute();
    }
    
    //----------------------------------------------------------
    public static function Insertar_Valoracion($tabla, $correo, $idJuego, $val) {

        $query = "INSERT INTO " . $tabla . " VALUES (?,?,?)";

        $stmt = self::$CONEXION->prepare($query);

        $stmt->bind_param("sii", $correo, $idJuego, $val);

        $stmt->execute();
    }

    //----------------------------------------------------------
    public static function Borrar_Dato($tabla, $idWhere, $valor) {

        $query = "DELETE FROM " . $tabla . " WHERE " . $idWhere . " = ?";
        $stmt = self::$CONEXION->prepare($query);

        $stmt->bind_param("sii", $valor);

        $stmt->execute();
    }

}
