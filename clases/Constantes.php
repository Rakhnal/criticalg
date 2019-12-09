<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Constantes
 *
 * @author adonoso
 */
class Constantes {
    
    // Tablas BBDD
    const ROLES = "roles";
    const USUARIO = "usuario";
    const GENERO = "genero";
    const GENEROS = "generos";
    const PLATAFORMA = "plataforma";
    const PLATAFORMAS = "plataformas";
    const JUEGO = "juego";
    
    // Datos de BBDD
    const IP = "localhost";
    const USER = "admin";
    const PASS = "admin";
    const BBDD = "criticalg";
    
    // Roles
    const NORMAL = 0;
    const ADMIN = 1;
    
    // Páginas
    const INDEX = "index.php";
    const NOTICIAS = "noticias.php";
    const CRUD = "crud.php";
    const VALIDATE = "validateJuegos.php";
    const CATEGORIAS = "categorias.php";
    const ADDJUEGO = "addJuego.php";
    const LISTANOMBRE = "listaJuegos.php?mode=nombre";
    const LISTAGENERO = "listaJuegos.php?mode=genero";
    const LISTAPLATAFORMA = "listaJuegos.php?mode=plataforma";
}
