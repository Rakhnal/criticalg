<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class = "row footer align-items-center justify-content-center" id = "footer">

    <div class = "col">
        <div class="row justify-content-center">
            <h6>Critical Games &trade;</h6>
        </div>
    </div>

    <div class = "col">
        <div class="row justify-content-center">
            <a id="aboutusEn" data-toggle="modal" data-target="#aboutus">Sobre nosotros</a>
        </div>
    </div>

    <div class = "col">
        <div class="row justify-content-center">
            <?php
            if ($_SESSION['location'] == Constantes::INDEX) {
                ?>

                <a href="https://www.instagram.com/?hl=es">
                    <img class="socialImg" border="0" alt="Instagram"  src="imgs/iconos/insta.png" width="40" height="40">
                </a>

                <a href="https://twitter.com/">
                    <img class="socialImg" border="0" alt="Twitter"  src="imgs/iconos/twitter.png" width="75" height="40">
                </a>

                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                    <img class="socialImg" border="0" alt="Youtube"  src="imgs/iconos/youtube.png" width="60" height="40">
                </a>

                <?php
            } else {
                ?>
                <a href="https://www.instagram.com/?hl=es">
                    <img class="socialImg" border="0" alt="Instagram"  src="../../imgs/iconos/insta.png" width="40" height="40">
                </a>

                <a href="https://twitter.com/">
                    <img class="socialImg" border="0" alt="Twitter"  src="../../imgs/iconos/twitter.png" width="75" height="40">
                </a>

                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                    <img class="socialImg" border="0" alt="Youtube"  src="../../imgs/iconos/youtube.png" width="60" height="40">
                </a>
                <?php
            }
            ?>
        </div>
    </div>

</div>