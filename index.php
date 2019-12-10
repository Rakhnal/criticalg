<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" type="image/jpg" href="imgs/logo.png" />
        <title>Critical Games</title>
        <link rel="stylesheet" href="files/bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/general.css">
        <link rel="stylesheet" href="css/Principal/index.css">
        <script src="files/jquery-3.4.1.min.js"></script>
        <script src="files/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
        <script src="scripts/headerscroll.js"></script>
        <script src="scripts/addJuego.js"></script>
    </head>
    <body>
        <?php
        include_once 'clases/Constantes.php';
        include_once 'clases/Usuario.php';
        
        session_start();
        
        if (isset($_REQUEST['logout'])) {
            session_destroy();
            session_start();
            session_regenerate_id();
        }
        
        $_SESSION['location'] = Constantes::INDEX;
        ?>

        <?php
        include 'vistas/auxiliares/modal.php';
        ?>

        <div class="container-fluid">

            <?php
            include 'vistas/auxiliares/header.php';
            ?>

            <div class="row align-items-center" id="main">
                <div class="col-md-12 col-lg-6">
                    <div class="row complete justify-content-center align-items-center">
                        <img src="imgs/logo.svg" alt="Logo principal de Critical Games"/>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="row half justify-content-center align-items-center">
                        <h1>¡Bienvenidos a Critical Games!</h1>
                    </div>
                    <div class="row half justify-content-center align-items-center">
                        <p>Critical Games es un página dedicada a juegos, no solo a videojuegos, también podrás encontras Juegos de Mesa y de Rol. Basada en una wiki de juegos tienes todas las herramientas necesarias tanto para encontrar nuevos juegos como para agregar (si estás registrado) nuevos juegos que salgan al mercado</p>
                    </div>
                    
                    <div class="row half justify-content-center align-items-center">
                        <p>El equipo de Critical Games estará encantado de recibir todas las peticiones que hagáis para agregar nuevos juegos, estas peticiones estarán supervisadas por nuestros administradores.</p>
                    </div>
                </div>
            </div>

            <?php
            include 'vistas/auxiliares/footer.php';
            ?>

        </div>
    </body>
</html>
