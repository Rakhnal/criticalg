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
        <script src="../../scripts/addJuego.js"></script>
    </head>
    <body>
        <?php
        include_once '../../clases/Constantes.php';
        include_once '../../clases/conexion.php';
        include_once '../../clases/Usuario.php';
        include_once '../../clases/Noticia.php';

        conexion::abrirBBDD();
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
                <div class="col">
                    <div class="row justify-content-center">
                        <audio loop id="audio" src="../../files/backmusic.mp3"></audio>
                        <div>
                            <button class="audioBtn" onclick="document.getElementById('audio').play()">Reproducir</button>
                            <button class="audioBtn" onclick="document.getElementById('audio').pause()">Pausar</button>
                        </div> 
                    </div>

                    <div class="row justify-content-center">

                        <?php
                        $noticias = conexion::obtenerNoticias();

                        if ($noticias != null) {

                            foreach ($noticias as $noticia) {
                                ?>
                                <div class="col-10 col-md-5 h-100 noticiaDiv">
                                    <div class="row justify-content-center">
                                        <h3><?php echo $noticia->getTitular(); ?></h3>
                                    </div>
                                    <div class="row justify-content-center h-100">
                                        <p><?php echo $noticia->getCuerpo(); ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>

                    </div>
                </div>

            </div>

            <?php
            if (null != $user && $user->getRol() == Constantes::ADMIN) {
                ?>
                <button type="button" id="newArticle" class="btn" data-toggle="modal" data-target="#newArticleMod"></button>
                <?php
            }

            include '../auxiliares/footer.php';

            conexion::cerrarBBDD();
            ?>

        </div>
    </body>
</html>
