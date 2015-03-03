$(document).on("ready", inicio);

function inicio() {
    adminpanel();
    verResultado();
    imagenLogo();
    imagenImagen1();
    imagenImagen2();
    //$("#admin1").on("click",ocultar);
    $("#btn1").on("click",glogo);
    $("#logo_destino").on("click", funcld);
    $("#imagen1_destino").on("click", funcid);
    $("#bien1_out").on("click", funcb1);
    $("#bien2_out").on("click", funcb2);
    $("#bien3_out").on("click", funcb3);
    $("#parall").on("click", functl);
    $("#emp").on("click", funcemp);
    $("#dir").on("click", funcdir);
    $("#red").on("click", funcred);
    $("#admin1").on("click", funcr3);

    $("#form-admin").dialog({
        autoOpen: false,
        buttons: {
            OK: function () {
                $(this).dialog("close");
            }
        },
        width: 450,
        position: {
            my: "rigth center",
            at: "rigth center"
        }
    });

    $("#pop_logo").dialog({
        autoOpen: false,
        buttons: {
            OK: function () {
                $(this).dialog("close");
                glogo();
            }
        },
        width: 450,
        position: {
            my: "rigth center",
            at: "rigth center"
        }
    });
    $("#pop_im1").dialog({autoOpen: false,
        buttons: {
            OK: function () {
                $(this).dialog("close");
            }
        },
        width: 450});
    $("#pop_bien1").dialog({autoOpen: false,
        buttons: {
            OK: function () {
                $(this).dialog("close");
            }
        },
        width: 350});
    $("#pop_bien2").dialog({autoOpen: false,
        buttons: {
            OK: function () {
                $(this).dialog("close");
            }
        },
        width: 350});
    $("#pop_bien3").dialog({autoOpen: false,
        buttons: {
            OK: function () {
                $(this).dialog("close");
            }
        },
        width: 350});
    $("#pop_titlema").dialog({autoOpen: false,
        buttons: {
            OK: function () {
                $(this).dialog("close");
            }
        },
        width: 350});
    $("#pop_titulo").dialog({autoOpen: false,
        buttons: {
            OK: function () {
                $(this).dialog("close");
            }
        },
        width: 350});
    $("#pop_dir").dialog({autoOpen: false,
        buttons: {
            OK: function () {
                $(this).dialog("close");
            }
        },
        width: 450});
    $("#pop_redes").dialog({autoOpen: false,
        buttons: {
            OK: function () {
                $(this).dialog("close");
            }
        },
        width: 350});
}

function funcr3() {
    ($("#form-admin").dialog("isOpen") == false) ? $("#form-admin").dialog("open") : $("#form-admin").dialog("close");
}


function funcld(e) {
    ($("#pop_logo").dialog("isOpen") == false) ? $("#pop_logo").dialog("open") : $("#pop_logo").dialog("close");
    /*$('#pop_logo').css({
     top: e.pageY + 5,
     left: e.pageX + 5
     }).toggle();**/
}

function funcid(e) {
    ($("#pop_im1").dialog("isOpen") == false) ? $("#pop_im1").dialog("open") : $("#pop_im1").dialog("close");
}

function funcb1(e) {
    ($("#pop_bien1").dialog("isOpen") == false) ? $("#pop_bien1").dialog("open") : $("#pop_bien1").dialog("close");
}

function funcb2(e) {
    ($("#pop_bien2").dialog("isOpen") == false) ? $("#pop_bien2").dialog("open") : $("#pop_bien2").dialog("close");
}

function funcb3(e) {
    ($("#pop_bien3").dialog("isOpen") == false) ? $("#pop_bien3").dialog("open") : $("#pop_bien3").dialog("close");
}

function functl(e) {
    ($("#pop_titlema").dialog("isOpen") == false) ? $("#pop_titlema").dialog("open") : $("#pop_titlema").dialog("close");
}
function funcemp(e) {
    ($("#pop_titulo").dialog("isOpen") == false) ? $("#pop_titulo").dialog("open") : $("#pop_titulo").dialog("close");
}

function funcdir(e) {
    ($("#pop_dir").dialog("isOpen") == false) ? $("#pop_dir").dialog("open") : $("#pop_dir").dialog("close");
}

function funcred(e) {
    ($("#pop_redes").dialog("isOpen") == false) ? $("#pop_redes").dialog("open") : $("#pop_redes").dialog("close");
}

function adminpanel() {

    var posicion = $("#admin").offset();
    var margenSuperior = 0;
    $(window).scroll(function () {
        if ($(window).scrollTop() > posicion.top) {
            $("#admin").stop().animate({
                marginTop: $(window).scrollTop() - posicion.top + margenSuperior
            });
        } else {
            $("#admin").stop().animate({
                marginTop: 0
            });
        }
        ;
    });
}

function verResultado() {
    $("#titulo").on("keyup", titulo);
    $("#bien1").on("keyup", bien1);
    $("#bien2").on("keyup", bien2);
    $("#bien3").on("keyup", bien3);
    $("#titulolema").on("keyup", titulolema);
    $("#desclema").on("keyup", desclema);
    $("#desctitulo").on("keyup", descrip);
    $("#direccion").on("keyup", direccion);
    $("#telefono").on("keyup", telefono);
}

//para ver las letra que escribe 
function titulo() {
    var valor = $("#titulo").val();
    $("#empresa").text(valor);
    $("#t1").text(valor);
}

function descrip() {
    var valor = $("#desctitulo").val();
    $("#descempresa").text(valor);
}

function bien1() {
    var valor2 = $("#bien1").val();
    $("#bien1_out").text(valor2);
}

function bien2() {
    var valor2 = $("#bien2").val();
    $("#bien2_out").text(valor2);
}

function bien3() {
    var valor2 = $("#bien3").val();
    $("#bien3_out").text(valor2);
}

function titulolema() {
    var valor2 = $("#titulolema").val();
    $("#tlema_out").text(valor2);
}

function desclema() {
    var valor2 = $("#desclema").val();
    $("#dlema_out").text(valor2);
}

function direccion() {
    var valor2 = $("#direccion").val();
    $("#dir_out").text(valor2);
}

function telefono() {
    var valor2 = $("#telefono").val();
    $("#tel_out").text(valor2);
}

//para ver imagen logo
function imagenLogo() {
    $("#logo").change(function () {
        mostrarLogo(this);
    });
}

function mostrarLogo(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#logo_destino').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
    $("#pop_logo").dialog("close");
    //glogo();
    //$("#pop_logo").hide();
}

//para ver imagen inicio
function imagenImagen1() {
    $("#imagen1").change(function () {
        mostrarImagen1(this);
    });
}

function mostrarImagen1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagen1_destino').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
    $("#pop_im1").dialog("close");
}

//para ver imagen fondo
function imagenImagen2() {
    //$("#main-container .parallax-1").css({"background-image": "url(modelo1/imagenes/slide1.jpg)"});
    $("#imagen2").change(function () {
        mostrarImagen2(this);
    });
}

function mostrarImagen2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagen2_destino').css('background-image', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function ocultar() {
    $("#form-admin").toggle();
}

function mostrarfb() {
    $("#face").toggle();
}

function mostrartw() {
    $("#twit").toggle();
}

function mostrargp() {
    $("#gplus").toggle();
}
function mostraryt() {
    $("#ytube").toggle();
}

function oinputr() {
    $("#face").css("display", "none");
    $("#twit").css("display", "none");
    $("#gplus").css("display", "none");
    $("#ytube").css("display", "none");
}

function glogo() {
    
    //check whether browser fully supports all File API
    if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        //get the file size and file type from file input field
        var fsize = $('#logo')[0].files[0].size;
       
        if(fsize>1048576) //do something if file size more than 1 mb (1048576)
        {
            alert(fsize +" bites\nToo big!");
        }else{
            alert(fsize +" bites\nYou are good to go!");
        }
    }else{
        alert("Please upgrade your browser, because your current browser lacks some new features we need!");
    }

    /*$.ajax({
        url: 'updateLogo.php',
        type: 'GET',
        async: true,
        data: 'parametro1='+nlogo+'&parametro2='+tlogo,
        success: function (){
            alert("data");
        },
        error: muestraError
    });*/
}

function procesaRespuesta(data){
    alert(data);
}
function muestraError(data){
    alert(data);
}
