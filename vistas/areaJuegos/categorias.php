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
        <link rel="stylesheet" href="../../css/tablas.css">
        <script src="../../files/jquery-3.4.1.min.js"></script>
        <script src="../../files/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
        <script src="../../scripts/headerscroll.js"></script>
        <script src="../../scripts/addJuego.js"></script>
    </head>
    <body>
        <?php
        include_once '../../clases/Constantes.php';
        include_once '../../clases/Genero.php';
        include_once '../../clases/Plataforma.php';
        include_once '../../clases/Usuario.php';
        include_once '../../clases/conexion.php';

        conexion::abrirBBDD();
        session_start();
        $_SESSION['location'] = Constantes::CATEGORIAS;

        // Comprobamos si el usuario tiene permisos para entrar en esta página
        if (isset($_SESSION['userObj'])) {
            $admin = $_SESSION['userObj'];

            if ($admin->getRol() != Constantes::ADMIN) {
                header("Location: ../../" . Constantes::INDEX);
            }
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

            <div class="row justify-content-center" id="main">

                <div class="col" id="generos">

                    <h1>Géneros</h1>

                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $generos = conexion::obtenerGeneros();

                                foreach ($generos as $genero) {
                                    ?>
                                <form name="genForm" onsubmit="return confirm('¿Seguro que quieres proceder?')" action="../../controladores/admin.php" method="POST">
                                    <tr>
                                        <td class="align-middle"> <input type="text" readonly value="<?php echo $genero->getNombre(); ?>" name="nomGenero"></td>
                                        <td class="align-middle"> <textarea readonly maxlength="500" name="desGenero" rows="2" cols="31"><?php echo $genero->getDescripcion(); ?></textarea></td>

                                        <td class="align-middle">
                                            <input type="submit" value = "" class="btnDelete" name = "delGen"/>
                                        </td>
                                    </tr>
                                </form>
                                <?php
                            }
                            ?>
                            <form name="newForm" action="../../controladores/admin.php" method="POST">
                                <tr>
                                    <td class="align-middle"> <input type="text" class="editable" value="" name="nomGenero"></td>
                                    <td class="align-middle"> <textarea class="editable" maxlength="500" name="desGenero" rows="2" cols="31"></textarea></td>

                                    <td class="align-middle">
                                        <input type="submit" value = "" class="btnSave" name = "instGen"/>
                                    </td>
                                </tr>
                            </form>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="col" id="plataformas">

                    <h1>Plataformas</h1>

                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $plataformas = conexion::obtenerPlataformas();

                                foreach ($plataformas as $plataforma) {
                                    ?>
                                <form name="platForm" onsubmit="return confirm('¿Seguro que quieres proceder?')" action="../../controladores/admin.php" method="POST">
                                    <tr>
                                        <td class="align-middle"> <input type="text" readonly value="<?php echo $plataforma->getNombre(); ?>" name="nomPlat"></td>
                                        <td class="align-middle"> <textarea readonly maxlength="500" name="desPlat" rows="2" cols="31"><?php echo $plataforma->getDescripcion(); ?></textarea></td>

                                        <td class="align-middle">
                                            <input type="submit" value = "" class="btnDelete" name = "delPlat"/>
                                        </td>
                                    </tr>
                                </form>
                                <?php
                            }
                            ?>
                            <form name="newForm" action="../../controladores/admin.php" method="POST">
                                <tr>
                                    <td class="align-middle"> <input type="text" class="editable" value="" name="nomPlat"></td>
                                    <td class="align-middle"> <textarea class="editable" maxlength="500" name="desPlat" rows="2" cols="31"></textarea></td>

                                    <td class="align-middle">
                                        <input type="submit" value = "" class="btnSave" name = "instPlat"/>
                                    </td>
                                </tr>
                            </form>
                            </tbody>
                        </table>
                    </div>

                </div>

                <?php
                include '../auxiliares/footer.php';
                ?>

            </div>

            <?php
            conexion::cerrarBBDD();
            ?>

        </div>
    </body>
</html>
