$(document).on("ready", inicioC);
function inicioC() {
    panelC();
    adminpanelC();
    verResultadoC();    
    
    cargarFondoC();
    $("#slider").on("click", funcScont);
    $("#mensaje").on("click", funcMensaje);
    $("#admin1").on("click", funcrC);
    
    $("#pop_pestanaC").dialog({autoOpen: false,
        buttons:{
            OK:function(){
                $(this).dialog("close");
                cargarInvitacion();
            }
        },
        width: 400});
    
    $("#pop_imgC").dialog({autoOpen: false,
        buttons:{
            OK:function(){
                $(this).dialog("close");
                //guardarTitulo();
            }
        },
        width: 400});
    
    $("#pop_inv").dialog({autoOpen: false,
        buttons:{
            OK:function(){
                $(this).dialog("close");
                cargarInvitacion();
            }
        },
        width: 400});
}
function panelC(){
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
function funcrC(){
    ($("#pop_pestanaC").dialog("isOpen") == false) ? $("#pop_pestanaC").dialog("open") : $("#pop_pestanaC").dialog("close") ;   
}

function funcScont(e) {
    ($("#pop_imgC").dialog("isOpen") == false) ? $("#pop_imgC").dialog("open") : $("#pop_imgC").dialog("close") ;   
}

function funcMensaje(e) {
    ($("#pop_inv").dialog("isOpen") == false) ? $("#pop_inv").dialog("open") : $("#pop_inv").dialog("close") ;   
}

function ocultarC(){
    $("#form-admin").toggle();
}

function adminpanelC(){
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

function verResultadoC() {
    $("#inv-cont").on("keyup", invcont);    
}

function invcont() {
    var valor = $("#inv-cont").val();
    $("#inv_out").text(valor);
}


function cargarFondoC(){
    $("input[name='img-contacto']").on("change", function () {
        var a = $("input[name='img-contacto']").val();
        
        //alert(a);
        var formData = new FormData($("#formfondo")[0]);
        //alert(formData);
        var ruta = "contacto-fondo.php";
        $.ajax({
            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos)
            {
                cargaFondoC(datos);
                $("#pop_imgC").dialog("close") ;
            },
            error: function (datos){
                alert("error-> "+datos);
            }
        });
    });
    
}
function cargaFondoC(datos){
    $("#main-container #slider").css("background-image", "url(../imagenes/"+datos+")");
}

function cargarInvitacion(){
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

function procesaRespuesta(data){
    //alert(data);
}

function muestraError(data){
    alert("error "+data);
}