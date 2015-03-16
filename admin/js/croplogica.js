$(document).ready(createUploader);
$(document).ready(function () {
    var thumb = $(".thumbnail");
    $('#thumbnail').imgAreaSelect({aspectRatio: '1:0.14', onSelectChange: preview, parent: '#myModal'});

    $('#save_thumb').click(function () {
        var x1 = $('#x1').val();
        var y1 = $('#y1').val();
        var x2 = $('#x2').val();
        var y2 = $('#y2').val();
        var w = $('#w').val();
        var h = $('#h').val();
        if (x1 == "" || y1 == "" || x2 == "" || y2 == "" || w == "" || h == "") {
            alert("Tiene que seleccionar un área");
            return false;
        }
        else {
            $.ajax({
                type: 'POST',
                url: "crop.php",
                data: "filename=" + $('#filename').val() + "&x1=" + x1 + "&x2=" + x2 + "&y1=" + y1 + "&y2=" + y2 + "&w=" + w + "&h=" + h,
                success: function (data) {
                    var img = "thumb_" + $('#filename').val();
                    guardarImgServicio(img);
                    //thumb.attr('src', 'uploads/thumb_' + $('#filename').val());
                    $('.close-reveal-modal').click();
                    $('#thumbnail').imgAreaSelect({hide: true, x1: 0, y1: 0, x2: 0, y2: 0});
                    // let's clear the modal
                    $('#thumbnail').attr('src', '');
                    $('#thumb_preview').attr('src', '');
                    $('#filename').attr('value', '');                   
                },
                error: function(data){
                    alert(data);
                }
            });

            return true;
        }
    });
});

function guardarImgServicio(img){
    var dir = "uploads/";
    $.ajax({
        url: 'servicioupdatefondo.php',
        type: 'GET',
        async: true,
        data: 'ids='+$('#ids').val()+'&dir_imagen='+dir+'&imagen='+img,
        success: function(){
            $("#main-container #slider").css({"background":"url(../imagenes/"+img+") no-repeat",  "height":"150px", "display":"table", "width":"100%"});
        },
        error: muestraError
    });
}

function procesaRespuesta(data) {
    //alert("si->" + data);
}
function muestraError(data) {
    alert("error->" + data);
}
            
function createUploader() {
    //alert("sa");
    var button = $('#slider');
    var uploader = new qq.FileUploaderBasic({
        button: document.getElementById('file-uploader'),
        action: 'script.php',
        allowedExtensions: ['jpg', 'gif', 'png', 'jpeg'],
        onSubmit: function (id, fileName) {
            // change button text, when user selects file			
            //button.text('Uploading');
            // Uploding -> Uploading. -> Uploading...
            interval = window.setInterval(function () {
                var text = button.text();
                if (text.length < 13) {
                    //button.text(text + '.');
                } else {
                    //button.text('Uploading');
                }
            }, 200);
        },
        onComplete: function (id, fileName, responseJSON) {
            //button.text('Create Thumbnail');
            window.clearInterval(interval);

            if (responseJSON['success'])
            {
                load_modal(responseJSON['filename']);
            }
        },
        debug: true
    });
}

function load_modal(filename) {
    $('#thumbnail').attr('src', "uploads/" + filename);
    $('#thumb_preview').attr('src', "uploads/" + filename);
    $('#filename').attr('value', filename);
    // IE fix
    if ($.browser.msie) {
        $('#thumb_preview_holder').remove();
    }

    $('#myModal').reveal();
}

function preview(img, selection) {
    var mythumb = $('#thumbnail');
    var scaleX = 1100 / selection.width;
    var scaleY = 150 / selection.height;

    $('#thumbnail + div > img').css({
        width: Math.round(scaleX * mythumb.outerWidth()) + 'px',
        height: Math.round(scaleY * mythumb.outerHeight()) + 'px',
        marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
        marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
    });
    $('#x1').val(selection.x1);
    $('#y1').val(selection.y1);
    $('#x2').val(selection.x2);
    $('#y2').val(selection.y2);
    $('#w').val(selection.width);
    $('#h').val(selection.height);
}
