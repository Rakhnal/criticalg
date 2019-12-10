<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<!------------- Pantalla modal del login-->
<div id="login" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Iniciar Sesión</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <?php
                if ($_SESSION['location'] == Constantes::INDEX) {
                    ?>
                    <form name="logForm" action="controladores/general.php" method="POST">
                        <?php
                    } else {
                        ?>
                        <form name="logForm" action="../../controladores/general.php" method="POST">
                            <?php
                        }
                        ?>
                        <div class="row justify-content-center">
                            <div class="name-form">
                                <input type="email" name="correo" id="correo" value="" required/>
                                <label for="correo" class = "label-name">
                                    <span class = "content-name">
                                        Correo
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="name-form">
                                <input type="password" name="pass" id="pass" value="" required/>
                                <label for="pass" class = "label-name">
                                    <span class = "content-name">
                                        Contraseña
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <input type="submit" value = "Entrar" name = "login"/>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<!------------- Pantalla modal del registro-->
<div id="register" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Usuario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <?php
                if ($_SESSION['location'] == Constantes::INDEX) {
                    ?>
                    <form name="regForm" action="controladores/general.php" method="POST">
                        <?php
                    } else {
                        ?>
                        <form name="regForm" action="../../controladores/general.php" method="POST">
                            <?php
                        }
                        ?>
                        <div class="row justify-content-center">
                            <div class="name-form">
                                <input type="email" autocomplete="off" name="correo" id="correo" value="" required/>
                                <label for="correo" class = "label-name">
                                    <span class = "content-name">
                                        Correo
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="name-form">
                                <input type="text" autocomplete="off" name="nombre" id="nombre" value="" required/>
                                <label for="nombre" class = "label-name">
                                    <span class = "content-name">
                                        Nombre
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="name-form">
                                <input type="text" autocomplete="off" name="apellido" id="apellido" value="" required/>
                                <label for="apellido" class = "label-name">
                                    <span class = "content-name">
                                        Apellido
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="name-form">
                                <input type="password" autocomplete="off" name="pass" id="pass" value="" required/>
                                <label for="pass" class = "label-name">
                                    <span class = "content-name">
                                        Contraseña
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="name-form">
                                <input type="password" autocomplete="off" name="passVal" id="passVal" value="" required/>
                                <label for="passVal" class = "label-name">
                                    <span class = "content-name">
                                        Repite la contraseña
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <input type="submit" value = "Guardar" name = "register"/>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<!------------- Pantalla modal de nueva noticia-->
<div id="newArticleMod" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nueva Noticia</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <?php
                if ($_SESSION['location'] == Constantes::INDEX) {
                    ?>
                    <form name="notForm" action="controladores/general.php" method="POST">
                        <?php
                    } else {
                        ?>
                        <form name="notForm" action="../../controladores/admin.php" method="POST">
                            <?php
                        }
                        ?>
                        <div class="row justify-content-center">
                            <div class="name-form">
                                <input type="text" autocomplete="off" name="titulo" id="correo" value="" required/>
                                <label for="correo" class = "label-name">
                                    <span class = "content-name">
                                        Título
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="name-form">
                                <label for="pass">
                                    <span>
                                        Contenido
                                    </span>
                                </label>
                                <textarea maxlength="500" name="cuerpo" rows="7" cols="50"></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <input type="submit" value = "Publicar" name = "notice"/>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<!------------- Pantalla modal de los datos del juego-->
<div id="modalJuego" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tituloModal"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <div class="row justify-content-center">
                    <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" id="carouselExampleIndicators">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="../../imgs/logo.svg" id="imgUnoModal" alt="Primera Imagen">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../../imgs/logo.svg" id="imgDosModal" alt="Segunda Imagen">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../../imgs/logo.svg" id="imgTresModal" alt="Tercera Imagen">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                </div>

                <div class="row justify-content-center" id="mainModal">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="row justify-content-center">
                                    <textarea readonly maxlength="500" name="desJuego" rows=10 cols="50" id="desModal"></textarea>
                                </div>
                            </div>
                            <div class="col justify-content-center">
                                <div class="row justify-content-center">
                                    <p>Duración</p>
                                </div>
                                <div class="row justify-content-center">
                                    <span id="durationModal"></span>
                                </div>
                                <div class="row justify-content-center">
                                    <p>Fecha de lanzamiento</p>
                                </div>
                                <div class="row justify-content-center">
                                    <span id="launchModal"></span>
                                </div>
                                <div class="row justify-content-center">
                                    <p>Desarrollador</p>
                                </div>
                                <div class="row justify-content-center">
                                    <span id="devModal"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="row justify-content-center">
                                    <p>Géneros</p>
                                </div>
                                <div class="row justify-content-center">
                                    <span id="generosModal"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row justify-content-center">
                                    <p>Plataformas</p>
                                </div>
                                <div class="row justify-content-center">
                                    <span id="plataformasModal"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="row justify-content-center">
                                    <p>Mínimo jugadores</p>
                                </div>
                                <div class="row justify-content-center">
                                    <span id="minModal"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row justify-content-center">
                                    <p>Máximo jugadores</p>
                                </div>
                                <div class="row justify-content-center">
                                    <span id="maxModal"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="row justify-content-center">
                                    <p>Valoración medía en CriticalGames</p>
                                </div>
                                <div class="row justify-content-center">
                                    <span id="valMediaModal" class="valoracion"></span>
                                </div>
                            </div>
                            <div class="col">
                                <?php
                                if ($_SESSION['location'] == Constantes::LISTAGENERO || $_SESSION['location'] == Constantes::LISTANOMBRE || $_SESSION['location'] == Constantes::LISTAPLATAFORMA) {

                                    if (isset($_SESSION['userObj'])) {
                                        ?>
                                        <div class="row justify-content-center">
                                            <p>Valora el juego</p>
                                        </div>

                                        <form id = "idValForm" name="valForm" action="../../controladores/general.php" method="POST">

                                            <input type="number" name="idJuego" id="idJuego" hidden/>

                                            <div class="row justify-content-center">
                                                <input type="radio" name="valoracion" value="0"/>0
                                                <input type="radio" name="valoracion" value="1"/>1
                                                <input type="radio" name="valoracion" value="2"/>2
                                                <input type="radio" name="valoracion" value="3"/>3
                                                <input type="radio" name="valoracion" value="4"/>4
                                                <input type="radio" name="valoracion" value="5"/>5
                                                <input type="radio" name="valoracion" value="6"/>6
                                                <input type="radio" name="valoracion" value="7"/>7
                                                <input type="radio" name="valoracion" value="8"/>8
                                                <input type="radio" name="valoracion" value="9"/>9
                                                <input type="radio" name="valoracion" value="10"/>10
                                            </div>
                                            <div class="row justify-content-center">
                                                <input type="submit" name="valSubmit" value="Valorar">
                                            </div>
                                        </form>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="row justify-content-center">
                                            <p>¡Regístrate/Inicia Sesión para poder valorar el juego!</p>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!------------- Pantalla modal que muestra que el juego ya ha sido valorado-->
<div id="yavalorado" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Información</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <p>Ya has valorado el juego anteriormente</p>

            </div>
        </div>
    </div>
</div>

<!------------- Pantalla modal que muestra que el usuario ya está registrado-->
<div id="yaexiste" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Información</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <p>El usuario que intentas registrar ya existe, prueba a iniciar sesión</p>

            </div>
        </div>
    </div>
</div>

<!------------- Pantalla modal que muestra que el usuario no existe en BBDD-->
<div id="noexiste" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Error</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <p>Usuario/Contraseña incorrectos</p>

            </div>
        </div>
    </div>
</div>

<!------------- Pantalla modal que da las gracias pro valorar el juego-->
<div id="rated" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Valorado</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <p>¡Gracias por valorar el juego!</p>

            </div>
        </div>
    </div>
</div>

<?php
if (isset($_SESSION['userObj'])) {
    $user = $_SESSION['userObj'];
    ?>

    <!------------- Pantalla modal que da las gracias pro valorar el juego-->
    <div id="perfil" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Perfil de <?php echo $user->getNombre() . ' ' . $user->getApellido(); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12 col-md-6">

                            <div class="row">
                                <?php
                                if ($_SESSION['location'] == Constantes::INDEX) {
                                    ?>
                                    <form name="changeImg" action="controladores/general.php" method="POST" enctype="multipart/form-data">
                                        <?php
                                    } else {
                                        ?>
                                        <form name="changeImg" action="../../controladores/general.php" method="POST" enctype="multipart/form-data">
                                            <?php
                                        }
                                        ?>
                                        <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
                                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />

                                        <div class="col centered">
                                            <?php
                                            if ($user->getFoto() != null) {
                                                if ($_SESSION['location'] == Constantes::INDEX) {
                                                    ?>
                                                    <img id="imgPerfilModal" alt="Imagen de Perfil" src="imgs/perfiles/<?php echo $user->getFoto(); ?>"/>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <img id="imgPerfilModal" alt="Imagen de Perfil" src="../../imgs/perfiles/<?php echo $user->getFoto(); ?>"/>
                                                    <?php
                                                }
                                            } else {
                                                if ($_SESSION['location'] == Constantes::INDEX) {
                                                    ?>
                                                    <img id="imgPerfilModal" alt="Imagen de Perfil" src="imgs/logo.png"/>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <img id="imgPerfilModal" alt="Imagen de Perfil" src="../../imgs/logo.png"/>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <input required type="file" name="imgPerfilModal" id="imgPerfilUser" onchange="cambiarImagen(this)" class="inputfile" />
                                            <label for="imgPerfilUser">Cambiar Imagen</label>
                                        </div>

                                        <div class="col">
                                            <div class="row justify-content-center">
                                                <input type="submit" name="subFoto" class="saveBtn" value="">
                                            </div>
                                        </div>
                                    </form>
                            </div>

                        </div>
                        <div class="col-12 col-md-6">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
