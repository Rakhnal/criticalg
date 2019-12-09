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
        <script src="../../files/jquery-3.4.1.min.js"></script>
        <script src="../../files/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
        <script src="../../scripts/headerscroll.js"></script>
        <script src="../../scripts/addJuego.js"></script>
    </head>
    <body>
        <?php
        include_once '../../clases/Constantes.php';
        include_once '../../clases/Usuario.php';
        include_once '../../clases/Genero.php';
        include_once '../../clases/Plataforma.php';
        include_once '../../clases/conexion.php';

        session_start();
        conexion::abrirBBDD();
        $_SESSION['location'] = Constantes::ADDJUEGO;

        // Comprobamos si el usuario tiene permisos para entrar en esta página
        if (isset($_SESSION['userObj'])) {
            $user = $_SESSION['userObj'];
        } else {
            header("Location: ../../" . Constantes::INDEX);
        }
        ?>

        <?php
        include '../auxiliares/modal.php';
        ?>

        <div class="container-fluid">

            <?php
            include '../auxiliares/header.php';
            ?>

            <div class="row justify-content-center removeMargin" id="main">

                <div class="col" id="addJuego">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Area Juegos</li>
                            <li class="breadcrumb-item" aria-current="page">Añadir Juego</li>
                        </ol>
                    </nav>

                    <form name="addForm" action="../../controladores/admin.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col juego-container align-items-center">
                                <p>Nombre del Juego</p>
                                <input required type="text" name="nomJuego"/>
                                <p>Desarrollador</p>
                                <input required type="text" name="developer"/>
                                <p>Duración (Horas)</p>
                                <input required type="number" name="duration"/>
                            </div>

                            <div class="col juego-container">
                                <p>Descripción del juego</p>
                                <textarea required maxlength="500" name="desJuego" rows="7" cols="50"></textarea>
                            </div>

                            <div class="col juego-container">
                                <p>Fecha de lanzamiento</p>
                                <input required type="date" name="launch"/>
                                <p>Mínimo de jugadores</p>
                                <input required type="number" name="minPlayers"/>
                                <p>Máximo de jugadores</p>
                                <input required type="number" name="maxPlayers"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col juego-container">
                                <p>Géneros</p>
                                <?php
                                $generos = conexion::obtenerGeneros();
                                ?>

                                <select required multiple id="generos" size="<?php echo count($generos); ?>" name="generos[]">

                                    <?php
                                    foreach ($generos as $genero) {
                                        ?>
                                        <option value="<?php echo $genero->getIdGenero(); ?>"><?php echo $genero->getNombre(); ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col juego-container">
                                <p>Plataformas</p>

                                <?php
                                $plataformas = conexion::obtenerPlataformas();
                                ?>
                                <select required multiple id="plataformas" size="<?php echo count($plataformas); ?>" name="plataformas[]">

                                    <?php
                                    foreach ($plataformas as $plataforma) {
                                        ?>
                                        <option value="<?php echo $plataforma->getIdPlat(); ?>"><?php echo $plataforma->getNombre(); ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row juego-container-fotos align-items-center">

                            <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
                            <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />

                            <div class="col-md centered">
                                <img id="imgUno" alt="Primera imagen del Juego" src="../../imgs/iconos/image.svg"/>
                                <input required type="file" name="imgUno" id="imagen1" onchange="cambiarImagen(this)" class="inputfile" />
                                <label for="imagen1">Primera imagen</label>
                            </div>

                            <div class="col-md centered">
                                <img id="imgDos" alt="Segunda imagen del Juego" src="../../imgs/iconos/image.svg"/>
                                <input required type="file" name="imgDos" id="imagen2" onchange="cambiarImagen(this)" class="inputfile" />
                                <label for="imagen2">Segunda imagen</label>
                            </div>

                            <div class="col-md centered">
                                <img id="imgTres" alt="Tercera imagen del Juego" src="../../imgs/iconos/image.svg"/>
                                <input required type="file" name="imgTres" id="imagen3" onchange="cambiarImagen(this)" class="inputfile" />
                                <label for="imagen3">Tercera imagen</label>
                            </div>

                            <div class="col-md centered">
                                <input type="submit" value = "" name = "addGame" id="btnAddGame"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            include '../auxiliares/footer.php';

            conexion::cerrarBBDD();
            ?>

        </div>
    </body>
</html>
