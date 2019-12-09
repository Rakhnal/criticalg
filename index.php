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

            <div class="row" id="main">
                <div class="col-md-12 col-lg-6">
                    <div class="row complete justify-content-center align-items-center">
                        <img src="imgs/logo.svg" alt="Logo principal de Critical Games"/>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="row half justify-content-center align-items-center">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a sodales nibh. Quisque fringilla massa vitae faucibus mattis. Donec vitae vehicula turpis, at tristique tortor. Nulla et efficitur dolor. Nulla tincidunt turpis non molestie feugiat. Ut consequat dapibus elit ac fermentum. Aenean iaculis dolor vel turpis finibus, id convallis tortor eleifend. In volutpat nisi urna, ut placerat lectus fermentum vitae. Curabitur egestas eget ipsum ut ornare. Nunc sed orci sed augue elementum vehicula id in sem. Proin facilisis eget nisl at mollis. Donec in mi non mauris dignissim vestibulum vel eget erat.</p>
                    </div>
                    <div class="row half justify-content-center align-items-center">
                        <p>Nullam viverra blandit purus, maximus commodo lorem mollis quis. Cras justo libero, bibendum in dignissim ac, pulvinar eu quam. Fusce est nibh, condimentum at molestie a, vulputate id dui. Mauris congue massa tincidunt, mattis ipsum sed, lacinia est. Sed ligula ante, pharetra sagittis nulla sit amet, pharetra pharetra enim. In ac lectus scelerisque, aliquet ante ac, volutpat arcu. Curabitur fermentum eget neque in ornare. Fusce massa nisi, semper in lectus ac, varius mattis tellus. Quisque eleifend faucibus posuere. Curabitur et tincidunt augue, id imperdiet eros. Aliquam aliquet lacus vitae efficitur malesuada. Nullam elementum ac turpis et consequat.</p>
                    </div>
                </div>
            </div>

            <?php
            include 'vistas/auxiliares/footer.php';
            ?>

        </div>
    </body>
</html>
