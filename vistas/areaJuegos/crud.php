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
        include_once '../../clases/Usuario.php';
        include_once '../../clases/conexion.php';

        conexion::abrirBBDD();
        session_start();
        $_SESSION['location'] = Constantes::CRUD;

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

            <div class="table-responsive" id="main">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Correo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Rol</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $users = conexion::obtenerUsuarios();

                        foreach ($users as $user) {
                            ?>
                        <form name="crudForm" onsubmit="return confirm('¿Seguro que quieres proceder?')" action="../../controladores/admin.php" method="POST">
                            <tr>
                                <th scope="row" class="align-middle"><input type="email" readonly value="<?php echo $user->getCorreo(); ?>" name="correo"></th>
                                <td class="align-middle"> <input type="text" value="<?php echo $user->getNombre(); ?>" name="nombre"></td>
                                <td class="align-middle"> <input type="text" value="<?php echo $user->getApellido(); ?>" name="apellido"></td>
                                <td class="align-middle"><?php
                                    if ($user->getRol() == Constantes::ADMIN) {
                                        echo 'Administrador';
                                    } else {
                                        echo 'Usuario';
                                    }
                                    ?></td>

                                <td class="align-middle"><?php
                                    if ($user->getRol() == Constantes::ADMIN) {
                                        ?>
                                        <input type="submit" value = "Quitar Admin" name = "dwAdmin"/>
                                        <?php
                                    } else {
                                        ?>
                                        <input type="submit" value = "Poner Admin" name = "upAdmin"/>
                                        <?php
                                    }
                                    ?>
                                    <input type="submit" value = "" class="btnSave" name = "modUser"/>
                                    <input type="submit" value = "" class="btnDelete" name = "delUser"/>
                                </td>
                            </tr>
                        </form>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>

            </div>

            <?php
            include '../auxiliares/footer.php';
            ?>

        </div>

        <?php
        conexion::cerrarBBDD();
        ?>
    </body>
</html>
