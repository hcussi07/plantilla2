//Funcion para abrir dialog
function openDialog(idPop, tamano){
    $("#"+idPop).dialog({autoOpen: false,
        buttons:{
            OK:function(){
                $(this).dialog("close");

                switch (idPop){
                    case "pop_serv1":
                        cargarServ1();
                        break;
                    case "pop_serv2":
                        cargarServ2();
                        break;
                    case "pop_serv3":
                        cargarServ3();
                        break;
                    case "pop_serv4":
                        cargarServ4();
                        break;
                    case "pop_serv5":
                        cargarServ5();
                        break;
                    case "pop_serv6":
                        cargarServ6();
                        break;
                    case "pop_lema":
                        cargarSlogan();
                        break;
                    case "pop_inv":
                        cargarInvitacion();
                        break;
                    case "form-admin":
                        guardarTitulo();
                        break;
                    case "pop_bien1":
                        guardarTitulo();
                        break;
                    case "pop_bien2":
                        guardarTitulo();
                        break;
                    case "pop_bien3":
                        guardarTitulo();
                        break;
                    case "pop_titlema":
                        cargaLema();
                        break;
                    case "pop_titulo":
                        guardarTitulo();
                        break;

                    case "pop_dir":
                        guardarTitulo();
                        break;
                    case "pop_redes":
                        guardarTitulo();
                        break;
                    case "pop_im1":
                        guardarTitulo();
                        break;
                    case "pop_im2":
                        guardarTitulo();
                        break;

                }
            }
        },
        width: tamano});
}
//funcion contador de letras
function icontadorS(idtextarea,idcontador,max,idhidden){
    $('#'+idcontador).html( $('#'+idhidden).val().length + "/"+max);
    $('#'+idtextarea).keyup(function(){
        upContadorS(idtextarea,idcontador,max);
    });
}
function upContadorS(idtextarea,idcontador,max){
    var contador = $("#"+idcontador);
    var ta =     $("#"+idtextarea);
    contador.html("0/"+max);

    contador.html(ta.val().length+"/"+max);
    if(parseInt(ta.val().length)>max)
    {
        ta.val(ta.val().substring(0,max-1));
        contador.html(max+"/"+max);
    }
}
//abre el panel
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
//funcion para verificar los pop dialog
function funcPop(idpop){
    ($("#"+idpop).dialog("isOpen") == false) ? $("#"+idpop).dialog("open") : $("#"+idpop).dialog("close") ;
}
//scrooling del adminpanel
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
//PAra ver los resultados en vivo
function verResultadoS(idIn,idOut) {
    $("#"+idIn).on("keyup", function(){verKeyUp(idIn,idOut);});
}

function verKeyUp(idIn, idOut){
    var valor = $("#"+idIn).val();
    $("#"+idOut).text(valor);
}

function verImagen(idimg, idOut){
    $("#"+idimg).change(function () {
        mostrarImg(this,idOut);
    });
}
//Para ver la imagenes en vivo
function mostrarImg(input, idOut){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#'+idOut).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
//funciones para guardar en la base de datos
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

function cargarServ1(){
    var formData = new FormData($("#formServ1")[0]);
    var ruta = "servicioUp1.php";
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

function cargarServ2(){
    var formData = new FormData($("#formServ2")[0]);
    var ruta = "servicioUp2.php";
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

function cargarServ3(){
    var formData = new FormData($("#formServ3")[0]);
    var ruta = "servicioUp3.php";
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

function cargarServ4(){
    var formData = new FormData($("#formServ4")[0]);
    var ruta = "servicioUp4.php";
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

function cargarServ5(){
    var formData = new FormData($("#formServ5")[0]);
    var ruta = "servicioUp5.php";
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

function cargarServ6(){
    var formData = new FormData($("#formServ6")[0]);
    var ruta = "servicioUp6.php";
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

//base de datos contactos
function cargarInvitacion(){
    //$('#pop_inv_val').validate();
    var invt = $("#inv-cont").val();
    var pestana = $("#pestana-cont").val();
    var ids = $("#idp").val();
    var coor = $("#cordenadas").val();
    $.ajax({
        url: 'contactoUpload.php',
        type: 'GET',
        async: true,
        data: 'idc='+ids+'&inv='+invt+'&pestana='+pestana+'&cordenadas='+coor,
        success: procesaRespuesta,
        error: muestraError
    });
}
//base de datos inicio
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