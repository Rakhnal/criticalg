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

        <script src="../../files/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

        <link rel="stylesheet" href="../../css/header.css">
        <link rel="stylesheet" href="../../css/footer.css">
        <link rel="stylesheet" href="../../css/general.css">
        <link rel="stylesheet" href="../../css/tablas.css">
        <script src="../../scripts/headerscroll.js"></script>
        <script src="../../scripts/addJuego.js"></script>
    </head>
    <body>
        <?php
        include_once '../../clases/Constantes.php';
        include_once '../../clases/Usuario.php';
        include_once '../../clases/Juego.php';
        include_once '../../clases/Plataforma.php';
        include_once '../../clases/Genero.php';
        include_once '../../clases/conexion.php';

        session_start();
        conexion::abrirBBDD();


        if (isset($_GET['mode'])) {
            $mode = $_GET['mode'];

            switch ($mode) {
                case "nombre":

                    $_SESSION['location'] = Constantes::LISTANOMBRE;

                    if (isset($_GET['letra'])) {
                        $letra = $_GET['letra'];

                        $juegos = conexion::obtenerJuegosNombre($letra);
                    } else {
                        $juegos = conexion::obtenerJuegos();
                    }
                    break;
                case "plataforma":

                    $_SESSION['location'] = Constantes::LISTAPLATAFORMA;

                    if (isset($_GET['plataforma'])) {
                        $plataforma = $_GET['plataforma'];

                        $juegos = conexion::obtenerJuegosPlataforma($plataforma);
                    } else {
                        $juegos = conexion::obtenerJuegos();
                    }
                    break;
                case "genero":

                    $_SESSION['location'] = Constantes::LISTAGENERO;

                    if (isset($_GET['genero'])) {
                        $genero = $_GET['genero'];

                        $juegos = conexion::obtenerJuegosGenero($genero);
                    } else {
                        $juegos = conexion::obtenerJuegos();
                    }
                    break;
                default:
                    break;
            }
        }



        include '../auxiliares/modal.php';
        ?>

        <script src="../../scripts/modalJuego.js"></script>

        <div class="container-fluid">

            <?php
            include '../auxiliares/header.php';
            ?>

            <div class="removeMargin tableMargin" id="main">
                <div class="row margin">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Listar Juegos</li>

                            <?php
                            $mode = $_GET['mode'];

                            switch ($mode) {
                                case "nombre":
                                    if (isset($_GET['letra'])) {
                                        $letra = $_GET['letra'];
                                        ?>
                                        <li class="breadcrumb-item"><a href="listaJuegos.php?mode=nombre"> Filtrar Nombre</a></li>
                                        <?php ?>
                                        <li class="breadcrumb-item" aria-current="page">Carácter <?php echo $letra; ?></li>
                                        <?php
                                    } else {
                                        ?>
                                        <li class="breadcrumb-item" aria-current="page">Filtrar Nombre</li>
                                        <?php
                                    }
                                    break;
                                case "plataforma":

                                    if (isset($_GET['plataforma'])) {
                                        $plataforma = $_GET['plataforma'];

                                        $platObj = conexion::obtenerPlataforma($plataforma);
                                        ?>
                                        <li class="breadcrumb-item"><a href="listaJuegos.php?mode=plataforma"> Filtrar Plataforma</a></li>
                                        <?php ?>
                                        <li class="breadcrumb-item" aria-current="page"><?php echo $platObj->getNombre(); ?></li>
                                        <?php
                                    } else {
                                        ?>
                                        <li class="breadcrumb-item" aria-current="page">Filtrar Plataforma</li>
                                        <?php
                                    }
                                    break;
                                case "genero":

                                    if (isset($_GET['genero'])) {
                                        $genero = $_GET['genero'];

                                        $genObj = conexion::obtenerGenero($genero);
                                        ?>
                                        <li class="breadcrumb-item"><a href="listaJuegos.php?mode=genero"> Filtrar Género</a></li>
                                        <?php
                                        ?>
                                        <li class="breadcrumb-item" aria-current="page"><?php echo $genObj->getNombre(); ?></li>
                                        <?php
                                    } else {
                                        ?>
                                        <li class="breadcrumb-item" aria-current="page">Filtrar Género</li>
                                        <?php
                                    }
                                    break;
                                default:
                                    break;
                            }
                            ?>
                        </ol>
                    </nav>
                </div>

                <div class="row margin">
                    <p>Filtrar datos por:</p>
                </div>

                <div class="row margin" id="contenedor-filtro">
                    <?php
                    switch ($mode) {
                        case "nombre":
                            for ($i = 65; $i <= 90; $i++) {
                                $letraABC = chr($i);
                                ?>
                                <a href="listaJuegos.php?mode=nombre&letra=<?php echo $letraABC; ?>"><?php echo $letraABC; ?></a>
                                <?php
                            }

                            for ($i = 0; $i <= 9; $i++) {
                                $letraABC = $i;
                                ?>
                                <a href="listaJuegos.php?mode=nombre&letra=<?php echo $letraABC; ?>"><?php echo $letraABC; ?></a>
                                <?php
                            }
                            break;
                        case "plataforma":

                            $platButtons = conexion::obtenerPlataformas();

                            foreach ($platButtons as $plat) {
                                ?>
                                <a href="listaJuegos.php?mode=plataforma&plataforma=<?php echo $plat->getIdPlat(); ?>"><?php echo $plat->getNombre(); ?></a>
                                <?php
                            }

                            break;
                        case "genero":

                            $genreButtons = conexion::obtenerGeneros();

                            foreach ($genreButtons as $genre) {
                                ?>
                                <a href="listaJuegos.php?mode=genero&genero=<?php echo $genre->getIdGenero(); ?>"><?php echo $genre->getNombre(); ?></a>
                                <?php
                            }
                            break;
                        default:
                            break;
                    }
                    ?>
                </div>

                <div class="row table-responsive">
                    <table id="validateTable" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm" hidden="true">ID Juego</th>
                                <th class="th-sm" hidden="true">ID Juego</th>
                                <th class="th-sm">Nombre del Juego </th>
                                <th class="th-sm">Fecha de lanzamiento</th>
                                <th class="th-sm">Desarrollador</th>
                                <th class="th-sm">Géneros</th>
                                <th class="th-sm">Plataformas</th>
                                <th class="th-sm"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if ($juegos != null) {

                                foreach ($juegos as $juego) {
                                    ?>
                                    <tr>
                                        <td hidden="true"><input type="number" readonly value="<?php echo $juego->getIdJuego(); ?>" name="idJuego"></td>
                                        <td hidden="true" class="id"><?php echo $juego->getIdJuego(); ?></td>
                                        <td><?php echo $juego->getNomJuego(); ?></td>
                                        <td><?php echo $juego->getLaunch(); ?></td>
                                        <td><?php echo $juego->getDesarrollador(); ?></td>
                                        <td><?php
                                            $generos = $juego->getGeneros();

                                            foreach ($generos as $genero) {
                                                echo '<p>' . $genero->getNombre() . '</p>';
                                            }
                                            ?></td>
                                        <td><?php
                                            $plataformas = $juego->getPlataformas();

                                            foreach ($plataformas as $plataforma) {
                                                echo '<p>' . $plataforma->getNombre() . '</p>';
                                            }
                                            ?></td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalJuego">Más Información</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <script src="../../scripts/paginacion.js"></script>

        <?php
        include '../auxiliares/footer.php';

        if (isset($_GET['yaValorado'])) {
            ?>
            <script>$('#yavalorado').modal('show');</script>
            <?php
        }

        if (isset($_GET['rated'])) {
            ?>
            <script>$('#rated').modal('show');</script>
            <?php
        }

        conexion::cerrarBBDD();
        ?>
    </body>
</html>
