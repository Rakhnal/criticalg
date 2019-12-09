<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$user = null;

if (isset($_SESSION['userObj'])) {
    $user = $_SESSION['userObj'];
}

// <a href="destino.php?variable1=valor1&variable2=valor2&...">Mi enlace</a>
?>

<div class = "row" id = "header">

    <!------------- Menú principal-->
    <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-left">
        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        if ($_SESSION['location'] != Constantes::INDEX) {
            ?>
            <img src = "../../imgs/logo.svg" id = "logo"/>
            <?php
        } else {
            ?>
            <img src = "imgs/logo.svg" id = "logo"/>
            <?php
        }
        ?>
        <div class="collapse navbar-collapse" id="navToggler">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <?php
                if ($_SESSION['location'] == Constantes::INDEX) {
                    ?>
                    <li class="nav-item active">

                        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                        <?php
                    } else {
                        ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php">Inicio</a>
                        <?php
                    }
                    ?>
                </li>
                <?php
                if ($_SESSION['location'] == Constantes::NOTICIAS) {
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Noticias <span class="sr-only">(current)</span></a>
                        <?php
                    } else if ($_SESSION['location'] == Constantes::INDEX) {
                        ?>
                    <li class="nav-item">
                        <a class="nav-link" href="vistas/noticias/noticias.php">Noticias</a>
                        <?php
                    } else {
                        ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../noticias/noticias.php">Noticias</a>
                        <?php
                    }
                    ?>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="ddListar" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Listar Juegos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="ddListar">
                        
                        <?php
                        if ($_SESSION['location'] == Constantes::LISTANOMBRE) {
                        ?>
                            <a class="dropdown-item" href="#">Por Nombre</a>
                        <?php
                        } else if ($_SESSION['location'] == Constantes::INDEX) {
                        ?>
                            <a class="dropdown-item" href="vistas/listaJuegos/listaJuegos.php?mode=nombre">Por Nombre</a>
                        <?php
                        } else {
                        ?>
                            <a class="dropdown-item" href="../listaJuegos/listaJuegos.php?mode=nombre">Por Nombre</a>
                        <?php
                        }
                        ?>
                            
                        <?php
                        if ($_SESSION['location'] == Constantes::LISTAPLATAFORMA) {
                        ?>
                            <a class="dropdown-item" href="#">Por Plataforma</a>
                        <?php
                        } else if ($_SESSION['location'] == Constantes::INDEX) {
                        ?>
                            <a class="dropdown-item" href="vistas/listaJuegos/listaJuegos.php?mode=plataforma">Por Plataforma</a>
                        <?php
                        } else {
                        ?>
                            <a class="dropdown-item" href="../listaJuegos/listaJuegos.php?mode=plataforma">Por Plataforma</a>
                        <?php
                        }
                        ?>
                            
                        <?php
                        if ($_SESSION['location'] == Constantes::LISTAGENERO) {
                        ?>
                            <a class="dropdown-item" href="#">Por Género</a>
                        <?php
                        } else if ($_SESSION['location'] == Constantes::INDEX) {
                        ?>
                            <a class="dropdown-item" href="vistas/listaJuegos/listaJuegos.php?mode=genero">Por Género</a>
                        <?php
                        } else {
                        ?>
                            <a class="dropdown-item" href="../listaJuegos/listaJuegos.php?mode=genero">Por Género</a>
                        <?php
                        }
                        ?>
                    </div>
                </li>

                <?php
                if (null != $user) {
                    ?>

                    <?php
                    if ($_SESSION['location'] == Constantes::ADDJUEGO || $_SESSION['location'] == Constantes::VALIDATE || $_SESSION['location'] == Constantes::CATEGORIAS) {
                        ?>
                        <li class="nav-item dropdown active">
                            <?php
                        } else {
                            ?>
                        <li class="nav-item dropdown">
                            <?php
                        }
                        ?>
                        <a class="nav-link dropdown-toggle" href="#" id="ddArea" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Area Juegos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="ddArea">
                            <?php
                            if ($_SESSION['location'] == Constantes::ADDJUEGO) {
                                ?>
                                <a class="dropdown-item" href="#">Añadir Juego <span class="sr-only">(current)</span></a>
                                <?php
                            } else if ($_SESSION['location'] == Constantes::INDEX) {
                                ?>
                                <a class="dropdown-item" href="vistas/areaJuegos/addJuego.php">Añadir Juego</a>
                                <?php
                            } else {
                                ?>
                                <a class="dropdown-item" href="../areaJuegos/addJuego.php">Añadir Juego</a>
                                <?php
                            }

                            if ($user->getRol() == Constantes::ADMIN) {

                                if ($_SESSION['location'] == Constantes::VALIDATE) {
                                    ?>
                                    <a class="dropdown-item" href="#">Validar Juego <span class="sr-only">(current)</span></a>
                                    <?php
                                } else if ($_SESSION['location'] == Constantes::INDEX) {
                                    ?>
                                    <a class="dropdown-item" href="vistas/areaJuegos/validateJuegos.php">Validar Juego</a>
                                    <?php
                                } else {
                                    ?>
                                    <a class="dropdown-item" href="../areaJuegos/validateJuegos.php">Validar Juego</a>
                                    <?php
                                }

                                if ($_SESSION['location'] == Constantes::CATEGORIAS) {
                                    ?>
                                    <a class="dropdown-item" href="#">Gestionar Categorías <span class="sr-only">(current)</span></a>
                                    <?php
                                } else if ($_SESSION['location'] == Constantes::INDEX) {
                                    ?>
                                    <a class="dropdown-item" href="vistas/areaJuegos/categorias.php">Gestionar Categorías</a>
                                    <?php
                                } else {
                                    ?>
                                    <a class="dropdown-item" href="../areaJuegos/categorias.php">Gestionar Categorías</a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>

            <?php
            if (null == $user) {
                ?>
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#register">Registrarse</button>
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#login">Iniciar Sesión</button>
                <?php
            } else {
                ?>
                <?php
                
                if ($user->getRol() == Constantes::ADMIN) {
                    ?>
                    <?php
                    if ($_SESSION['location'] == Constantes::INDEX) {
                        ?>
                        <form name="adminForm" action="vistas/areaJuegos/crud.php" method="POST">
                            <?php
                        } else {
                            ?>
                            <form name="adminForm" action="../areaJuegos/crud.php" method="POST">
                                <?php
                            }
                            ?>
                            <input type="submit" value = "Administrar Usuarios" name = "adminusers"/>
                        </form>
                        <?php
                    }
                    ?> 
                    <?php
                    if ($_SESSION['location'] == Constantes::INDEX) {
                        ?>
                        <form name="outform" action="index.php" method="POST">
                            <?php
                        } else {
                            ?>
                            <form name="outform" action="../../index.php" method="POST">
                                <?php
                            }
                            ?>
                            <input type="submit" value = "Salir" name = "logout"/>
                        </form>
                        <?php
                    }
                    ?>
                    </div>
                    </nav>
                    </div>

