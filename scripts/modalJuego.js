/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {

    $("tbody tr").click(function () {
        $('.selected').removeClass('selected');
        $(this).addClass("selected");
        var id = $('.id', this).html();

        $.ajax({
            data: {idJuego: id, action: "infoJuego"},
            type: "POST",
            url: "../../clases/servidor_ajax.php",
            success: function (respuesta) {
                var datos = JSON.parse(respuesta);
                if (datos !== null) {
                    
                    $("#idJuego").html(datos[0].IDJUEGO);
                    
                    $("#tituloModal").html(datos[0].NOMJUEGO);
                    $("#desModal").html(datos[0].DESJUEGO);
                    $("#durationModal").html(datos[0].DURATION);
                    $("#launchModal").html(datos[0].LAUNCH);
                    $("#devModal").html(datos[0].DESARROLLADOR);

                    var generos = datos[0][0]['generos'];
                    var plataformas = datos[0][1]['plataformas'];

                    var resGenero = "";

                    for (var i = 0; i < generos.length; i++) {
                        resGenero += generos[i].NOMGENERO + "</br>";
                    }

                    var resPlataforma = "";

                    for (var i = 0; i < plataformas.length; i++) {
                        resPlataforma += plataformas[i].NOMBRE + "</br>";
                    }

                    $("#generosModal").html(resGenero);
                    $("#plataformasModal").html(resPlataforma);

                    $("#minModal").html(datos[0].MINPLAYERS);
                    $("#maxModal").html(datos[0].MAXPLAYERS);
                    $("#valMediaModal").html(datos[0].VALMEDIA);

                    if (datos[0].FOTOUNO !== null) {
                        $("#imgUnoModal").attr('src', '../../imgs/games/' + datos[0].FOTOUNO);
                    }
                    if (datos[0].FOTODOS !== null) {
                        $("#imgDosModal").attr('src', '../../imgs/games/' + datos[0].FOTODOS);
                    }
                    if (datos[0].FOTOTRES !== null) {
                        $("#imgTresModal").attr('src', '../../imgs/games/' + datos[0].FOTOTRES);
                    }

                } else {
                    alert("Se ha producido un error de ajax");
                }
            }
        });
    });
});
