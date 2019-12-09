<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" type="image/jpg" href="../../imgs/logo.png" />
        <title>Critical Games</title>
        <link rel="stylesheet" href="../../files/bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/header.css">
        <link rel="stylesheet" href="../../css/footer.css">
        <link rel="stylesheet" href="../../css/general.css">
        <link rel="stylesheet" href="../../css/noticia.css">
        <script src="../../files/jquery-3.4.1.min.js"></script>
        <script src="../../files/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
        <script src="../../scripts/headerscroll.js"></script>
    </head>
    <body>
        <?php
        include_once '../../clases/Constantes.php';
        include_once '../../clases/Usuario.php';
        
        session_start();
        $_SESSION['location'] = Constantes::NOTICIAS;
        ?>
        
        <?php
        include '../auxiliares/modal.php';
        ?>
        
        <div class="container-fluid">

            <?php
            include '../auxiliares/header.php';
            ?>

            <div class="row justify-content-center" id="main">
                
            </div>
            
            <?php
            if (null != $user && $user->getRol() == Constantes::ADMIN) {
            ?>
                <button type="button" id="newArticle" class="btn" data-toggle="modal" data-target="#newArticleMod"></button>
            <?php
            }
            
            include '../auxiliares/footer.php';
            ?>

        </div>
    </body>
</html>
