$(document).on("ready", inicio);

function inicio() {
    panel();
    adminpanel();

    verImagen("logo","logo_destino");
    cargaLogo();

    verResultadoS("tit1","tit1_out");
    verResultadoS("des1","desc1_out");
    verResultadoS("tit2","tit2_out");
    verResultadoS("des2","desc2_out");
    verResultadoS("titulo","t1");
    verResultadoS("bien1","bien1_out");
    verResultadoS("bien2","bien2_out");
    verResultadoS("bien3","bien3_out");
    verResultadoS("titulobien1","titb1_out");
    verResultadoS("titulobien2","titb2_out");
    verResultadoS("titulobien3","titb3_out");
    verResultadoS("titulolema","tlema_out");
    verResultadoS("desclema","dlema_out");
    verResultadoS("desctitulo","descempresa");
    verResultadoS("direccion","dir_out");
    verResultadoS("telefono","tel_out");

    $("#logo_destino").on("click", function(){funcPop("pop_logo");});
    $("#bien_out1").on("click", function(){funcPop("pop_bien1");});
    $("#bien_out2").on("click", function(){funcPop("pop_bien2");});
    $("#bien_out3").on("click", function(){funcPop("pop_bien3");});
    $("#parall").on("click", function(){funcPop("pop_titlema");});
    $("#emp").on("click", function(){funcPop("pop_titulo");});
    $("#dir").on("click", function(){funcPop("pop_dir");});
    $("#red").on("click", function(){funcPop("pop_redes");});
    $("#im1").on("click", function(){funcPop("pop_im1");});
    $("#im2").on("click", function(){funcPop("pop_im2");});

    openDialog("pop_logo",450);
    openDialog("pop_bien1",350);
    openDialog("pop_bien2",350);
    openDialog("pop_bien3",350);
    openDialog("pop_titlema",350);
    openDialog("pop_titulo",350);
    openDialog("pop_dir",350);
    openDialog("pop_redes",350);
    openDialog("pop_im2",350);
    openDialog("pop_im1",350);

    icontadorS("tit1","cvtit1",12,"vtit1");
    icontadorS("des1","cvdtit1",40,"vdtit1");

    icontadorS("tit2","cvtit2",12,"vtit2");
    icontadorS("des2","cvdtit2",40,"vdtit2");

    icontadorS("titulo","ce1",12,"cev1");
    icontadorS("desctitulo","cem1",250,"cemd1");

    icontadorS("titulobien1","ct1",30,"cvt1");
    icontadorS("bien1","cd1",250,"cvd1");

    icontadorS("titulobien2","ct2",30,"cvt2");
    icontadorS("bien2","cd2",250,"cvd2");

    icontadorS("titulobien3","ct3",30,"cvt3");
    icontadorS("bien3","cd3",250,"cvd3");

    icontadorS("titulolema","ctitlema",50,"titlema");
    icontadorS("desclema","cdesctitlema",250,"desctitlema");
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

function cargaLogo() {
    $("input[name='logo']").on("change", function () {
        var a = $("input[name='logo']").val();
        var formData = new FormData($("#formlogo")[0]);
        var ruta = "cargar-logo.php";
        $.ajax({
            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: procesaRespuesta,
            error: muestraError
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
        success: procesaRespuesta,
        error: muestraError
    });
}

function cambiacss(nombre){
    var idp = $("#idp").val();
    //var plantilla =$("select").attr("value");
    $("plantilla").html('<link rel=Stylesheet href="css/'+nombre+'.css" type="text/css">');

    $.ajax({
        url: 'updatePlantilla.php',
        type: 'GET',
        async: true,
        data: 'idp=' + idp +'&plantilla=' + nombre,
        success: function(){

        },
        error: function(){

        }
    });
}
