$(document).on("ready", inicioC);
function inicioC() {
    $('#contador').html("Cantidad de caracteres: " + $('#cant_inv').val().length + "/200");
    
    init_contador("inv-cont","contador",200);
    
    panelC();
    adminpanelC();
    verResultadoC();    
    //$("#slider").on("click", funcScont);
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
    
    
    $("#pop_inv").dialog({autoOpen: false,
        buttons:{
            OK:function(){
                $(this).dialog("close");
                
                cargarInvitacion();
            }
        },
        width: 400});
}
function init_contador(idtextarea,idcontador,max){
    $('#'+idtextarea).keyup(function(){
        updateContador(idtextarea,idcontador,max);
    });
}
function updateContador(idtextarea,idcontador,max){
    var contador = $("#"+idcontador);
    var ta =     $("#"+idtextarea);
    contador.html("Cantidad de caracteres: " + "0/"+max);
    
    contador.html("Cantidad de caracteres: " + ta.val().length+"/"+max);
    if(parseInt(ta.val().length)>max)
    {
        ta.val(ta.val().substring(0,max-1));
        contador.html("Cantidad de caracteres: " + max+"/"+max);
    }
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

function procesaRespuesta(data){
    //alert(data);
}

function muestraError(data){
    alert("error "+data);
}