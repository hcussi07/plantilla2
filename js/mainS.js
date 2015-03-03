$(document).on("ready", inicioS);
function inicioS() {
    panelS();
    adminpanelS();
    verResultadoS();
    imagenS1();
    imagenS2();
    imagenS3();
    imagenS4();
    imagenS5();
    imagenS6();
    
    cargarFondo();
        
    $("#slider").on("click", funcSlider);
    $("#slogan").on("click", funcSlogan);
    $("#servs1").on("click", funcServ1);
    $("#servs2").on("click", funcServ2);
    $("#servs3").on("click", funcServ3);
    $("#servs4").on("click", funcServ4);
    $("#servs5").on("click", funcServ5);
    $("#servs6").on("click", funcServ6);
    $("#admin1").on("click", funcr3);
    
    $("#form-adminS").dialog({
        autoOpen: false,
        buttons:{
            OK:function(){
                $(this).dialog("close");
                cargarSlogan();
            }
        },
        width: 300
    });
    
    $("#pop_imgserv").dialog({autoOpen: false,
        buttons:{
            OK:function(){
                $(this).dialog("close");
            }
        },
        width: 450});
    $("#pop_lema").dialog({autoOpen: false,
        buttons:{
            OK:function(){
                $(this).dialog("close");
                cargarSlogan();
            }
        },
        width: 450});
    $("#pop_serv1").dialog({autoOpen: false,
        buttons:{
            OK:function(){
                $(this).dialog("close");
                cargarServ1();
            }
        },
        width: 450});
    $("#pop_serv2").dialog({autoOpen: false,
        buttons:{
            OK:function(){
                $(this).dialog("close");
                cargarServ2();
            }
        },
        width: 450});
    $("#pop_serv3").dialog({autoOpen: false,
        buttons:{
            OK:function(){
                $(this).dialog("close");
                cargarServ3();
            }
        },
        width: 450});
    $("#pop_serv4").dialog({autoOpen: false,
        buttons:{
            OK:function(){
                $(this).dialog("close");
                cargarServ4();
            }
        },
        width: 450});
    $("#pop_serv5").dialog({autoOpen: false,
        buttons:{
            OK:function(){
                $(this).dialog("close");
                cargarServ5();
            }
        },
        width: 450});
    $("#pop_serv6").dialog({autoOpen: false,
        buttons:{
            OK:function(){
                $(this).dialog("close");
                cargarServ6();
            }
        },
        width: 450});
}
function panelS(){
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
function funcr3(){
    ($("#form-adminS").dialog("isOpen") == false) ? $("#form-adminS").dialog("open") : $("#form-adminS").dialog("close") ;   
}

function funcSlider(){
    ($("#pop_imgserv").dialog("isOpen") == false) ? $("#pop_imgserv").dialog("open") : $("#pop_imgserv").dialog("close") ;   
}

function funcSlogan(){
    ($("#pop_lema").dialog("isOpen") == false) ? $("#pop_lema").dialog("open") : $("#pop_lema").dialog("close") ;   
}

function funcServ1(){
    ($("#pop_serv1").dialog("isOpen") == false) ? $("#pop_serv1").dialog("open") : $("#pop_serv1").dialog("close") ;   
}
function funcServ2(){
    ($("#pop_serv2").dialog("isOpen") == false) ? $("#pop_serv2").dialog("open") : $("#pop_serv2").dialog("close") ;   
}
function funcServ3(){
    ($("#pop_serv3").dialog("isOpen") == false) ? $("#pop_serv3").dialog("open") : $("#pop_serv3").dialog("close") ;   
}
function funcServ4(){
    ($("#pop_serv4").dialog("isOpen") == false) ? $("#pop_serv4").dialog("open") : $("#pop_serv4").dialog("close") ;   
}
function funcServ5(){
    ($("#pop_serv5").dialog("isOpen") == false) ? $("#pop_serv5").dialog("open") : $("#pop_serv5").dialog("close") ;   
}
function funcServ6(){
    ($("#pop_serv6").dialog("isOpen") == false) ? $("#pop_serv6").dialog("open") : $("#pop_serv6").dialog("close") ;   
}

function ocultarS(){
    $("#form-admin").toggle();
}

function adminpanelS(){
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

function verResultadoS() {
    $("#serv-1").on("keyup", serv1);
    $("#serv-2").on("keyup", serv2);
    $("#serv-3").on("keyup", serv3);
    $("#serv-4").on("keyup", serv4);
    $("#serv-5").on("keyup", serv5);
    $("#serv-6").on("keyup", serv6);
    
    $("#sdesc-1").on("keyup", sdesc1);
    $("#sdesc-2").on("keyup", sdesc2);
    $("#sdesc-3").on("keyup", sdesc3);
    $("#sdesc-4").on("keyup", sdesc4);
    $("#sdesc-5").on("keyup", sdesc5);
    $("#sdesc-6").on("keyup", sdesc6);
    
    $("#lema-serv").on("keyup", slema);
}

function slema() {
    var valor = $("#lema-serv").val();
    $("#lema_out").text(valor);
}

function serv1() {
    var valor = $("#serv-1").val();
    $("#sv1").text(valor);
}

function serv2() {
    var valor = $("#serv-2").val();
    $("#sv2").text(valor);
}

function serv3() {
    var valor = $("#serv-3").val();
    $("#sv3").text(valor);
}

function serv4() {
    var valor = $("#serv-4").val();
    $("#sv4").text(valor);
}

function serv5() {
    var valor = $("#serv-5").val();
    $("#sv5").text(valor);
}

function serv6() {
    var valor = $("#serv-6").val();
    $("#sv6").text(valor);
}

function sdesc1() {
    var valor = $("#sdesc-1").val();
    $("#sd1").text(valor);
}

function sdesc2() {
    var valor = $("#sdesc-2").val();
    $("#sd2").text(valor);
}

function sdesc3() {
    var valor = $("#sdesc-3").val();
    $("#sd3").text(valor);
}
function sdesc4() {
    var valor = $("#sdesc-4").val();
    $("#sd4").text(valor);
}
function sdesc5() {
    var valor = $("#sdesc-5").val();
    $("#sd5").text(valor);
}
function sdesc6() {
    var valor = $("#sdesc-6").val();
    $("#sd6").text(valor);
}

function imagenS1(){
    $("#img-ser1").change(function () {
        mostrarS1(this);
    });
}

function mostrarS1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img_out_1').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function imagenS2(){
    $("#img-ser2").change(function () {
        mostrarS2(this);
    });
}

function mostrarS2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img_out_2').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function imagenS3(){
    $("#img-ser3").change(function () {
        mostrarS3(this);
    });
}

function mostrarS3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img_out_3').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function imagenS4(){
    $("#img-ser4").change(function () {
        mostrarS4(this);
    });
}

function mostrarS4(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img_out_4').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function imagenS5(){
    $("#img-ser5").change(function () {
        mostrarS5(this);
    });
}

function mostrarS5(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img_out_5').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function imagenS6(){
    $("#img-ser6").change(function () {
        mostrarS6(this);
    });
}

function mostrarS6(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img_out_6').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function cargarFondo(){
    $("input[name='img-servicio']").on("change", function () {
        var a = $("input[name='img-servicio']").val();
        
        //alert(a);
        var formData = new FormData($("#formfondo")[0]);
        //alert(formData);
        var ruta = "servicio-fondo.php";
        $.ajax({
            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos)
            {
                cargaFondoS(datos);
                $("#pop_imgserv").dialog("close") ;
            },
            error: function (datos){
                alert("error-> "+datos);
            }
        });
    });
    
}

function cargarSlogan(){
    var slogan = $("#lema-serv").val();
    var pestana = $("#pestana-serv").val();
    var ids = $("#ids").val();
    $.ajax({
        url: 'servicioSlogan.php',
        type: 'GET',
        async: true,
        data: 'ids='+ids+'&slogan='+slogan+'&pestana='+pestana,
        success: procesaRespuesta,
        error: muestraError
    });
}

function procesaRespuesta(data){
    //alert(data);
}

function muestraError(data){
    alert("error "+data);
}

function cargaFondoS(datos){
    $("#main-container #slider").css("background-image", "url(../imagenes/"+datos+")");
}

function cargarServ1(){
    var formData = new FormData($("#formServ1")[0]);
    var ruta = "servicioUp1.php";
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

function cargarServ2(){
    var formData = new FormData($("#formServ2")[0]);
    var ruta = "servicioUp2.php";
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

function cargarServ3(){
    var formData = new FormData($("#formServ3")[0]);
    var ruta = "servicioUp3.php";
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

function cargarServ4(){
    var formData = new FormData($("#formServ4")[0]);
    var ruta = "servicioUp4.php";
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

function cargarServ5(){
    var formData = new FormData($("#formServ5")[0]);
    var ruta = "servicioUp5.php";
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

function cargarServ6(){
    var formData = new FormData($("#formServ6")[0]);
    var ruta = "servicioUp6.php";
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
