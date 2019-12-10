/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    $(window).on('resize', function () {
        if ($(document).height() > $(window).height()) {
            document.getElementById("footer").style.position = "static";
        } else {
            document.getElementById("footer").style.position = "fixed";
        }
    });

    if ($(document).height() > $(window).height()) {
        document.getElementById("footer").style.position = "static";
    }
});

document.addEventListener('scroll', function (event) {
    if ($(document).height() > $(window).height()) {
        document.getElementById("footer").style.position = "static";
    } else {
        document.getElementById("footer").style.position = "fixed";
    }
}, true /*Capture event*/);

window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById("header").style.minHeight = "25px";
        document.getElementById("logo").style.width = "70px";
        document.getElementById("imgPerfil").style.width = "80px";
        document.getElementById("imgPerfil").style.height = "50px";
    } else {
        document.getElementById("header").style.minHeight = "90px";
        document.getElementById("logo").style.width = "120px";
        document.getElementById("imgPerfil").style.width = "125px";
        document.getElementById("imgPerfil").style.height = "70px";
    }
}
