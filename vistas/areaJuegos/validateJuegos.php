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

        // Comprobamos si el usuario tiene permisos para entrar en esta página
        if (isset($_SESSION['userObj'])) {
            $admin = $_SESSION['userObj'];

            if ($admin->getRol() != Constantes::ADMIN) {
                header("Location: ../../" . Constantes::INDEX);
            }
        } else {
            header("Location: ../../" . Constantes::INDEX);
        }

        $_SESSION['location'] = Constantes::VALIDATE;

        include '../auxiliares/modal.php';
        ?>

        <script src="../../scripts/modalJuego.js"></script>

        <div class="container-fluid">

            <?php
            include '../auxiliares/header.php';
            ?>

            <div class="table-responsive removeMargin tableMargin" id="main">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Area Juegos</li>
                        <li class="breadcrumb-item" aria-current="page">Validar Juego</li>
                    </ol>
                </nav>

                <table id="validateTable" class="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm" hidden="true">ID Juego</th>
                            <th class="th-sm" hidden="true">ID Juego</th>
                            <th class="th-sm">Nombre del Juego </th>
                            <th class="th-sm">Fecha de lanzamiento</th>
                            <th class="th-sm">Desarrollador</th>
                            <th class="th-sm"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $juegosPendientes = conexion::obtenerJuegosPend();

                        if ($juegosPendientes != null) {

                            foreach ($juegosPendientes as $juego) {
                                ?>
                                <tr>
                            <form name="validateForm" action="../../controladores/admin.php" method="POST">
                                <td hidden="true"><input type="number" readonly value="<?php echo $juego->getIdJuego(); ?>" name="idJuego"></td>
                                <td hidden="true" class="id"><?php echo $juego->getIdJuego(); ?></td>
                                <td><?php echo $juego->getNomJuego(); ?></td>
                                <td><?php echo $juego->getLaunch(); ?></td>
                                <td><?php echo $juego->getDesarrollador(); ?></td>
                                <td>
                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalJuego">Más Información</button>
                                    <input type="submit" name="valGame" value="Validar"/>
                                </td>
                            </form>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>

            </div>

        </div>

        <script src="../../scripts/paginacion.js"></script>

        <?php
        include '../auxiliares/footer.php';

        conexion::cerrarBBDD();
        ?>
    </body>
</html>
