$(document).on("ready", inicio);

function inicio() {
    //para el slider
    $("#im1").on("click", funcImg1);
    $("#im2").on("click", funcImg2);
    //todo lo demas
    panel();
    adminpanel();
    verResultado();
    imagenLogo();
    imagenImagen2();
    cargaLogo();
    $("#logo_destino").on("click", funcld);
    $("#bien_out1").on("click", funcb1);
    $("#bien_out2").on("click", funcb2);
    $("#bien_out3").on("click", funcb3);
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
                guardarTitulo();
            }
        },
        width: 300,
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
            }
        },
        width: 450,
        position: {
            my: "rigth center",
            at: "rigth center"
        }
    });

    $("#pop_bien1").dialog({autoOpen: false,
        buttons: {
            OK: function () {
                $(this).dialog("close");
                guardarTitulo();
            }
        },
        width: 350});
    $("#pop_bien2").dialog({autoOpen: false,
        buttons: {
            OK: function () {
                $(this).dialog("close");
                guardarTitulo();
            }
        },
        width: 350});
    $("#pop_bien3").dialog({autoOpen: false,
        buttons: {
            OK: function () {
                $(this).dialog("close");
                guardarTitulo();
            }
        },
        width: 350});
    $("#pop_titlema").dialog({autoOpen: false,
        buttons: {
            OK: function () {
                $(this).dialog("close");
                cargaLema();
            }
        },
        width: 350});
    $("#pop_titulo").dialog({autoOpen: false,
        buttons: {
            OK: function () {
                guardarTitulo();
                $(this).dialog("close");
                               
            }
        },
        width: 350});
    $("#pop_dir").dialog({autoOpen: false,
        buttons: {
            OK: function () {
                $(this).dialog("close");
                guardarTitulo();
            }
        },
        width: 450});
    $("#pop_redes").dialog({autoOpen: false,
        buttons: {
            OK: function () {
                $(this).dialog("close");
                guardarTitulo();
            }
        },
        width: 350});
    $("#pop_im1").dialog({autoOpen: false,
        buttons: {
            OK: function () {
                $(this).dialog("close");
                guardarTitulo();
            }
        },
        width: 350});
    
    $("#pop_im2").dialog({autoOpen: false,
        buttons: {
            OK: function () {
                $(this).dialog("close");
                guardarTitulo();
            }
        },
        width: 350});
}

function panel() {
    var button = $('#loginButton');
    var box = $('#loginBox');
    var form = $('#loginForm');
    button.removeAttr('href');
    button.mouseup(function (login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function () {
        return false;
    });
    $(this).mouseup(function (login) {
        if (!($(login.target).parent('#loginButton').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });

}

function funcImg1(){
    
    ($("#pop_im1").dialog("isOpen") == false) ? $("#pop_im1").dialog("open") : $("#pop_im1").dialog("close");
}

function funcImg2(){
    ($("#pop_im2").dialog("isOpen") == false) ? $("#pop_im2").dialog("open") : $("#pop_im2").dialog("close");
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
    $("#tit1").on("keyup", tit1);
    $("#des1").on("keyup", desc1);
    $("#tit2").on("keyup", tit2);
    $("#des2").on("keyup", desc2);
    $("#titulo").on("keyup", titulo);
    $("#bien1").on("keyup", bien1);
    $("#bien2").on("keyup", bien2);
    $("#bien3").on("keyup", bien3);
    $("#titulobien1").on("keyup", titulobien1);
    $("#titulobien2").on("keyup", titulobien2);
    $("#titulobien3").on("keyup", titulobien3);
    $("#titulolema").on("keyup", titulolema);
    $("#desclema").on("keyup", desclema);
    $("#desctitulo").on("keyup", descrip);
    $("#direccion").on("keyup", direccion);
    $("#telefono").on("keyup", telefono);
}

//para ver las letra que escribe 
function tit1() {
    var valor = $("#tit1").val();
    $("#tit1_out").text(valor);
}

function desc1() {
    var valor = $("#des1").val();
    $("#desc1_out").text(valor);
}

function tit2() {
    var valor = $("#tit2").val();
    $("#tit2_out").text(valor);
}

function desc2() {
    var valor = $("#des2").val();
    $("#desc2_out").text(valor);
}

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

function titulobien1() {
    var valor2 = $("#titulobien1").val();
    $("#titb1_out").text(valor2);
}

function titulobien2() {
    var valor2 = $("#titulobien2").val();
    $("#titb2_out").text(valor2);
}

function titulobien3() {
    var valor2 = $("#titulobien3").val();
    $("#titb3_out").text(valor2);
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
    //$("#pop_logo").hide();
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

function guardarTitulo() {
    var t1 = $("#img1").val()+"|"+$("#tit1").val()+"|"+$("#des1").val()+"|"+$("#img2").val()+"|"+$("#tit2").val()+"|"+$("#des2").val();
    var idp = $("#idp").val();
    var tit = $("#titulo").val();
    var desc = $("#desctitulo").val();
    var dir = $("#direccion").val();
    var tel = $("#telefono").val();
    var bien1 = $("#bien1").val();
    var bien2 = $("#bien2").val();
    var bien3 = $("#bien3").val();
    var titbien1 = $("#titulobien1").val();
    var titbien2 = $("#titulobien2").val();
    var titbien3 = $("#titulobien3").val();
    var face = $("#face").val();
    var twit = $("#twit").val();
    var gplus = $("#gplus").val();
    var ytube = $("#ytube").val();
    var pest = $("#pestana").val();
    
    $.ajax({
        url: 'updateLogo.php',
        type: 'GET',
        async: true,
        data: 'pest=' + pest + '&t1=' + t1 + '&idp=' + idp + '&tit=' + tit + '&desc=' + desc + '&dir=' + dir + '&tel=' + tel + '&titbien1=' + titbien1 + '&titbien2=' + titbien2 + '&titbien3=' + titbien3 + '&bien1=' + bien1 + '&bien2=' + bien2 + '&bien3=' + bien3 + '&face=' + face + '&twit=' + twit + '&gplus=' + gplus + '&ytube=' + ytube,
        success: procesaRespuesta,
        error: muestraError
    });
}

function procesaRespuesta(data) {
    //alert(data);
}

function muestraError(data) {
    alert("error " + data);
}

function cargaImagen1() {

    $("input[name='imagen1']").on("change", function () {
        var a = $("input[name='imagen1']").val();

        //alert(a);
        var formData = new FormData($("#formimg1")[0]);
        //alert(formData);
        var ruta = "cargar-imagen1.php";
        $.ajax({
            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos)
            {
                //alert("si--> "+datos);
            },
            error: function (datos) {
                //alert("error-> "+datos);
            }
        });
    });
}

function cargaLogo() {

    $("input[name='logo']").on("change", function () {
        var a = $("input[name='logo']").val();

        //alert(a);
        var formData = new FormData($("#formlogo")[0]);
        //alert(formData);
        var ruta = "cargar-logo.php";
        $.ajax({
            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos)
            {
                //alert("si--> "+datos);
            },
            error: function (datos) {
                //alert("error-> "+datos);
            }
        });
    });
}

function cargaLema() {
    //var a = $("input[name='lema']").val();
    var formData = new FormData($("#formlema")[0]);
    var ruta = "cargar-lema.php";
    $.ajax({
        url: ruta,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos)
        {
            //alert("si--> " + datos);
        },
        error: function (datos) {
            alert("error-> " + datos);
        }
    });
}


