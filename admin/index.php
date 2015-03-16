<?php
session_start();
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html; charset=UTF-8');
include_once 'conexion.php';
$idpag = $_GET['idpag'];

$query = "SELECT * FROM pag_uno  ORDER BY idpag DESC LIMIT 0,1";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?= $row['pestana'] ?></title>
<meta name="description" content="Descripcion de la página">
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<!--link href="../css/jquery-ui.css" rel="stylesheet"-->
<link rel="stylesheet" href="css/reveal.css">

<script src="js/jquery-pack.js" type="text/javascript"></script>
<script src="js/jquery.min.js" type="text/javascript"></script>
<!-- required plugin for ajax file upload -->
<script src="js/fileuploader.js" type="text/javascript"></script>
<!-- The Reveal plugin -->
<script src="js/jquery.reveal.js" type="text/javascript"></script>
<!-- resizing image -->
<script src="js/jquery.imgareaselect.min.js" type="text/javascript"></script>
<!-- para la slider 1 -->
<script type="text/javascript">
    $(document).ready(createUploader);
    $(document).ready(function () {
        var thumb = $(".thumbnail");
        $('#thumbnail').imgAreaSelect({aspectRatio: '1:0.50', onSelectChange: preview, parent: '#myModal'});

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
                    error: function (data) {
                        alert(data);
                    }
                });

                return true;
            }
        });
    });

    function guardarImgServicio(img) {
        var t1= img+"|"+$("#tit1").val()+"|"+$("#des1").val()+"|"+$("#img2").val()+"|"+$("#tit2").val()+"|"+$("#des2").val();
        var dir = "uploads/";
        $.ajax({
            url: 'updateimagen1.php',
            type: 'GET',
            async: true,
            data: 'ids=' + $('#idp').val() + '&dir_imagen=' + dir + '&imagen=' + t1,
            success: function () {
                //$("#img1_destino").css('src',"url(uploads/" + img+")");
                $("#pop_im1").dialog("close");
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
        var scaleY = 550 / selection.height;

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
</script>


<!-- para la slider 2 -->
<script type="text/javascript">
    $(document).ready(createUploader2);
    $(document).ready(function () {
        var thumb = $(".thumbnail2");
        $('#thumbnail2').imgAreaSelect({aspectRatio: '1:0.50', onSelectChange: preview2, parent: '#myModal2'});

        $('#save_thumb2').click(function () {
            var x1 = $('#x12').val();
            var y1 = $('#y12').val();
            var x2 = $('#x22').val();
            var y2 = $('#y22').val();
            var w = $('#w2').val();
            var h = $('#h2').val();
            if (x1 == "" || y1 == "" || x2 == "" || y2 == "" || w == "" || h == "") {
                alert("Tiene que seleccionar un área");
                return false;
            }
            else {
                $.ajax({
                    type: 'POST',
                    url: "crop.php",
                    data: "filename=" + $('#filename2').val() + "&x1=" + x1 + "&x2=" + x2 + "&y1=" + y1 + "&y2=" + y2 + "&w=" + w + "&h=" + h,
                    success: function (data) {
                        var img = "thumb_" + $('#filename2').val();

                        guardarImgServicio2(img);

                        //thumb.attr('src', 'uploads/thumb_' + $('#filename').val());
                        $('.close-reveal-modal2').click();
                        $('.close-reveal-modal').click();
                        $('.close-reveal-modal1').click();
                        $('#thumbnail2').imgAreaSelect({hide: true, x1: 0, y1: 0, x2: 0, y2: 0});
                        // let's clear the modal
                        $('#thumbnail2').attr('src', '');
                        $('#thumb_preview2').attr('src', '');
                        $('#filename2').attr('value', '');
                    },
                    error: function (data) {
                        alert(data);
                    }
                });

                return true;
            }
        });
    });

    function guardarImgServicio2(img) {
        var t1= $("#img1").val()+"|"+$("#tit1").val()+"|"+$("#des1").val()+"|"+img+"|"+$("#tit2").val()+"|"+$("#des2").val();
        var dir = "uploads/";
        $.ajax({
            url: 'updateimagen1.php',
            type: 'GET',
            async: true,
            data: 'ids=' + $('#idp').val() + '&dir_imagen=' + dir + '&imagen=' + t1,
            success: function () {
                //$("#img1_destino").css('src',"url(uploads/" + img+")");
                $("#pop_im2").dialog("close");
            },
            error: muestraError
        });
    }


    function createUploader2() {
        //alert("sa");
        var button = $('#slider2');
        var uploader = new qq.FileUploaderBasic({
            button: document.getElementById('file-uploader2'),
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
                    load_modal2(responseJSON['filename']);
                }
            },
            debug: true
        });
    }

    function load_modal2(filename) {
        $('#thumbnail2').attr('src', "uploads/" + filename);
        $('#thumb_preview2').attr('src', "uploads/" + filename);
        $('#filename2').attr('value', filename);
        // IE fix
        if ($.browser.msie) {
            $('#thumb_preview_holder2').remove();
        }

        $('#myModal2').reveal();
    }

    function preview2(img, selection) {
        var mythumb = $('#thumbnail2');
        var scaleX = 1100 / selection.width;
        var scaleY = 550 / selection.height;

        $('#thumbnail2 + div > img').css({
            width: Math.round(scaleX * mythumb.outerWidth()) + 'px',
            height: Math.round(scaleY * mythumb.outerHeight()) + 'px',
            marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
            marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
        });
        $('#x12').val(selection.x1);
        $('#y12').val(selection.y1);
        $('#x22').val(selection.x2);
        $('#y22').val(selection.y2);
        $('#w2').val(selection.width);
        $('#h2').val(selection.height);
    }
</script>

<script type="text/javascript">
    $(document).ready(createUploader1);
    $(document).ready(function () {
        var thumb = $(".thumbnail1");
        $('#thumbnail1').imgAreaSelect({aspectRatio: '1:0.7', onSelectChange: preview1, parent: '#myModal1'});

        $('#save_thumb1').click(function () {
            var x1 = $('#x11').val();
            var y1 = $('#y11').val();
            var x2 = $('#x21').val();
            var y2 = $('#y21').val();
            var w = $('#w1').val();
            var h = $('#h1').val();
            if (x1 == "" || y1 == "" || x2 == "" || y2 == "" || w == "" || h == "") {
                alert("Tiene que seleccionar un área");
                return false;
            }
            else {
                $.ajax({
                    type: 'POST',
                    url: "crop.php",
                    data: "filename=" + $('#filename1').val() + "&x1=" + x1 + "&x2=" + x2 + "&y1=" + y1 + "&y2=" + y2 + "&w=" + w + "&h=" + h,
                    success: function (data) {
                        var img = "thumb_" + $('#filename1').val();
                        guardarImg2(img);
                        //thumb.attr('src', 'uploads/thumb_' + $('#filename').val());
                        $('.close-reveal-modal1').click();
                        $('#thumbnail1').imgAreaSelect({hide: true, x1: 0, y1: 0, x2: 0, y2: 0});
                        $('.close-reveal-modal').click();
                        // let's clear the modal
                        $('#thumbnail1').attr('src', '');
                        $('#thumb_preview1').attr('src', '');
                        $('#filename1').attr('value', '');
                    },
                    error: function (data) {
                        alert(data);
                    }
                });

                return true;
            }
        });
    });

    function guardarImg2(img) {

        var dir = "uploads/";
        $.ajax({
            url: 'updateimagen2.php',
            type: 'GET',
            async: true,
            data: 'ids=' + $('#idp').val() + '&dir_imagen=' + dir + '&imagen=' + img,
            success: function () {
                $('#parall').css('background-image', "url(uploads/" + img+")");
            },
            error: muestraError
        });
    }


    function createUploader1() {
        //alert("sa");
        var button = $('#slider1');
        var uploader = new qq.FileUploaderBasic({
            button: document.getElementById('file-uploader1'),
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
                    load_modal1(responseJSON['filename']);
                }
            },
            debug: true
        });
    }

    function load_modal1(filename) {
        $('#thumbnail1').attr('src', "uploads/" + filename);
        $('#thumb_preview1').attr('src', "uploads/" + filename);
        $('#filename1').attr('value', filename);
        // IE fix
        if ($.browser.msie) {
            $('#thumb_preview_holder1').remove();
        }

        $('#myModal1').reveal();
    }

    function preview1(img, selection) {
        var mythumb = $('#thumbnail1');
        var scaleX = 1100 / selection.width;
        var scaleY = 700 / selection.height;

        $('#thumbnail1 + div > img').css({
            width: Math.round(scaleX * mythumb.outerWidth()) + 'px',
            height: Math.round(scaleY * mythumb.outerHeight()) + 'px',
            marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
            marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
        });
        $('#x11').val(selection.x1);
        $('#y11').val(selection.y1);
        $('#x21').val(selection.x2);
        $('#y21').val(selection.y2);
        $('#w1').val(selection.width);
        $('#h1').val(selection.height);
    }
</script>

<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" >
<link rel="stylesheet" type="text/css" href="../css/noneed.css" media="screen" >
<link rel="stylesheet" type="text/css" href="../css/extralayers.css" media="screen" >
<link rel="stylesheet" type="text/css" href="../css/settings.css" media="screen" >
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,700,800,900' rel='stylesheet' type='text/css'>

<style>
    @import url(http://fonts.googleapis.com/css?family=Muli);
    *{margin:0; padding:0}
    html{font-family: 'Muli', sans-serif; -ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;}
    body{background:#FFF; padding:0}
    article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary{display: block;}
    a{background-color:transparent;text-decoration:none}
    a:active, a:hover{outline: 0;}
    b, strong{font-weight: bold;}
    img{border: 0;}
    h1, h2, h3, h4, h5{display:block}
    ul, ol, li{display:block;list-style-type:none;}
    .clear{float:none;clear:both;}
    p{display:block}
    #admin{position: absolute;top:0; right: 10px; z-index: 1500;cursor: pointer;}
    #input-redes input{ display: none }

    #main-container{margin:0 auto;width:1100px;}
    #main-container header{border-top:#FF8D2C solid 5px; padding:30px 0 10px 0}
    #main-container header a{color:#A1A1A1;}
    #main-container header a.active{color:#FF8D2C;}
    #main-container header a:hover{color:#FF8D2C;}
    #main-container header a:visited{color:#A1A1A1;}
    #main-container header ul{ overflow:hidden; padding-top:10px}
    #main-container header li{float:left; padding:5px 30px 5px 0}
    #main-container header #logo{float:left}
    #main-container header #logo:hover{border:solid 2px #BB0000; cursor: crosshair; background: #CCC;opacity:0.8; filter:alpha(opacity=60); z-index: 1; position: relative}
    #main-container header #menu{float:right}
    #main-container #container{border-top:#FF8D2C solid 5px; margin-top:10px}
    #main-container .table{display:table; width:100%}
    #main-container .bg1{background:#F7F7F7}
    #main-container .table div{display:table-cell;border-bottom:#DEDEDE solid 1px;}
    #main-container .table div.bc{ border-left:#DEDEDE solid 1px; border-right:#DEDEDE solid 1px; }
    #main-container #container h3{font-weight:bold; font-size:18px;letter-spacing:-1px; padding-bottom:20px}
    #main-container #container h3 span{font-weight:normal; color:#333; font-size:20px}
    #main-container #container p{font-size:13px; color:#666}
    #main-container #container section{ padding:30px 30px 20px 30px}
    #main-container #slider img {width: 100%; height: 550px}
    #main-container #slider :hover{border:solid 2px #BB0000; cursor: crosshair; background: #CCC;opacity:0.8; filter:alpha(opacity=60); z-index: 1; position: relative}
    #im1:hover,#im2:hover, .sb1 :hover{border:solid 2px #BB0000; cursor: crosshair; background: #CCC;opacity:0.8; filter:alpha(opacity=60); z-index: 11; position: relative}
    #bien_out1:hover,#bien_out2:hover,#bien_out3:hover, #parall:hover, #emp:hover, #dir:hover, #red:hover{border:solid 2px #BB0000; cursor: crosshair; background: #CCC;opacity:0.8; filter:alpha(opacity=60); z-index: 1; position: relative}
    .contar{color: #1c94c4}
    #main-container .parallax{margin-top:10px;height:300px;background-repeat:no-repeat;background-attachment:fixed;background-size:cover; background-position:50% 50%}
    #main-container .parallax-1{background-image: url(../imagenes/<?= $row['imagen2'] ?>);}
    #main-container .parallax h3, #main-container .parallax h4{text-transform:uppercase}
    #main-container .parallax h4{color:#CCC;padding:80px 350px 5px 40px;font-size:20px}
    #main-container .parallax h2{color:#FFF;padding:0px 350px 0px 40px;font-size:30px;text-transform:uppercase}
    footer{background:#474747;margin:0 auto;width:1100px; margin-top:10px; padding-bottom:20px}
    footer .table{display:table;width:100%}
    footer .table div{display:table-cell; color:#FFF}
    footer .table div.w1{width:50%;}
    footer .table div.w2{width:25%;}
    footer p{font-size:13px;}
    footer li{float:left;width:45px;height:45px}
    footer li a{display:block;width:45px;height:45px;background-repeat:no-repeat; background-image:url(../imagenes/social.png)}
    footer li a.f{background-position:0px 0px}
    footer li a.t{background-position:0px -45px}
    footer li a.g{background-position:0px -135px}
    footer li a.y{background-position:0px -90px}
    footer li a.f:hover{background-color:#3B5998}
    footer li a.t:hover{background-color:#00ACED}
    footer li a.g:hover{background-color:#DD4B39}
    footer li a.y:hover{background-color:#BB0000}
    footer p.mp{background-repeat:no-repeat;background-image:url(../imagenes/ph.png);background-position:0px 0px;padding-left:20px;}
    footer p.ph{background-repeat:no-repeat;background-image:url(../imagenes/mp.png);background-position:0px 0px;padding-left:20px; margin-top:10px}
    footer h4{padding-top:30px; padding-bottom:10px}
    footer h4.t1{padding-left:40px}
    footer .p1{padding:0px 20px 10px 40px}
    #nom_red{float: left}
    #face,#twit,#gplus,#ytube{display: none}
    .ui-widget-header,.ui-state-default, .ui-button{background:#337AB7; border: 1px solid #66afe9; color: #FFFFFF;}
    #pop_logo,#pop_im1,#pop_titulo,#pop_desctit,#pop_bien1,#pop_bien2,#pop_bien3,#pop_titlema,
    #pop_descl,#pop_redes,#pop_dir,#pop_tel,#pop_but,#pop_im2{overflow: auto;display: none}
    #admin #loginContainer {position:relative;float:right;font-size:12px;}
    #admin #loginButton {display:inline-block; float:right; background:#337AB7; border:1px solid #337AB7; border-radius:3px; -moz-border-radius:3px; position:relative; z-index:80; cursor:pointer;}
    /* Login Button Text */
    #admin #loginButton span {color:#FFF;  font-size:14px; font-weight:bold;   padding:7px 29px 9px 10px; background:url(../imagenes/loginArrow.png) no-repeat 110px 7px; display:block;float: left}
    #admin #loginButton:hover {background:#66afe9;}
    /* Login Box */
    #admin #loginBox {position:absolute; top:34px; right:0; display:none; z-index:90;}
    /* If the Login Button has been clicked */
    #admin #loginButton.active {border-radius:3px 3px 0 0;}
    #admin #loginButton.active span {background-position:110px -76px;}
    /* A Line added to overlap the border */
    #admin #loginButton.active em {position:absolute; width:100%; height:1px; background:#d2e0ea;bottom:-1px;}
    /* Login Form */
    #admin #loginForm {width:248px;  border:1px solid #337AB7; border-radius:3px 0 3px 3px; -moz-border-radius:3px 0 3px 3px;  margin-top:-1px; background:#337AB7; padding:6px;}
    #admin #loginForm fieldset {margin:0 0 12px 0; display:block; border:0; padding:0;}
    #admin fieldset#body { background:#fff; border-radius:3px; -moz-border-radius:3px; padding:10px 13px; margin:0;}
    #admin #loginForm #checkbox { width:auto; margin:1px 9px 0 0; float:left; padding:0; border:0; *margin:-3px 9px 0 0; /* IE7 Fix */}
    #admin #body label { color:#3a454d;  margin:9px 0 0 0; display:block; float:left;}
    #admin #loginForm #body fieldset label { display:block;float:none; margin:0 0 6px 0;}
    /* Default Input */
    #admin #loginForm input { width:92%;  border:1px solid #337AB7; border-radius:3px; -moz-border-radius:3px; color:#3a454d; font-weight:bold; padding:8px 8px; box-shadow:inset 0px 1px 3px #bbb; -webkit-box-shadow:inset 0px 1px 3px #bbb; -moz-box-shadow:inset 0px 1px 3px #bbb; font-size:12px;}
    /* Sign In Button */
    #admin #loginForm .login { width:auto; float:left; background:#339cdf url(../imagenes/loginbuttonbg.png) repeat-x; color:#fff; padding:7px 10px 8px 10px; text-shadow:0px -1px #278db8; border:1px solid #339cdf; box-shadow:none; -moz-box-shadow:none; -webkit-box-shadow:none;  margin:0 12px 0 0;  cursor:pointer; *padding:7px 2px 8px 2px; /* IE7 Fix */}
    #admin #loginForm .loginR { width:auto; float:left; background:#DD4B39; color:#fff; padding:7px 10px 8px 10px; border:1px solid #DD4B39; box-shadow:none; -moz-box-shadow:none; -webkit-box-shadow:none;  margin:0 12px 0 0;  cursor:pointer; *padding:7px 2px 8px 2px; /* IE7 Fix */}
    /* Forgot your password */
    #admin #loginForm span {text-align:center; display:block; padding:7px 0 4px 0;color:#FFF;}
    #admin #loginForm span a {color:#FFF; font-size:12px;}
    #admin #loginForm span a:hover {color:#66afe9 ; font-size:12px;}
    #admin input:focus {outline:none;}

    img.overlay,img.overlay2 { position: absolute; left: 0; z-index: 100; }
    img.thumbnail,img.thumbnail2  { margin-top: 11px; }
    /*input{display:block; margin: 5px auto;}*/
    #file-uploader:hover, #file-uploader2:hover{border:solid 2px #BB0000; cursor: crosshair; background: #CCC;opacity:0.8; filter:alpha(opacity=60); z-index: 2; position: relative}
    .clear{clear:both;}
    #thumbnail,#thumbnail2{padding-bottom: 10px }
    #thumb_preview_holder, #thumb_preview_holder2{ width:1100px; height:550px; overflow:hidden; margin-left:10px; }
    #myModal, #myModal2{ border: 1px solid #e1e1e1; border-radius:10px; }


    img.overlay1 { position: absolute; left: 0; z-index: 100; }
    img.thumbnail1  { margin-top: 11px; }
    /*input{display:block; margin: 5px auto;}*/
    #file-uploader1:hover{border:solid 2px #BB0000; cursor: crosshair; background: #CCC;opacity:0.8; filter:alpha(opacity=60); z-index: 2; position: relative}

    #thumbnail1{padding-bottom: 10px }
    #thumb_preview_holder1{ width:1100px; height:550px; overflow:hidden; margin-left:10px; }
    #myModal1{ border: 1px solid #e1e1e1; border-radius:10px; }

</style>

<plantilla>
    <link rel=Stylesheet href="css/<?=$row['estilo']?>.css" type="text/css">
</plantilla>
</head>

<body>
<?php
$img = explode("|", $row['imagen1'])
?>
<input type="hidden" id="idp" value="<?= $row['idpag'] ?>"/>
<div id="pop_logo" title="Logo">
    <form method="POST" id="formlogo" enctype="multipart/form-data">
        <input type="hidden" value="<?= $row['idpag'] ?>" id="idplogo" name="idplogo"/>
        <input type="file" name="logo" id="logo" accept="image/jpeg/png" data-val="true"/>
    </form>
</div>

<div id="pop_im1" title="Imagen slider 1">
    <input type="hidden" value="<?= $img[0] ?>" id="img1" name="img1"/>
    <input type="hidden" value="<?= $row['idpag'] ?>" id="idplema" name="idplema"/>
    <label for="tit1">Titulo: </label>
    <input type="hidden"  id="vtit1" value="<?= $img[1] ?>"/>
    <input type="text" name="tit1" id="tit1" size="30" value="<?= $img[1] ?>" maxlength="12"/><label id="cvtit1" class="contar"></label><br>
    <label for="des1">Descripcion: </label>
    <input type="hidden"  id="vdtit1" value="<?= $img[2] ?>"/>
    <textarea name="des1" id="des1" rows="5" cols="30" maxlength="40"><?= $img[2] ?></textarea><label id="cvdtit1" class="contar"></label>
    <br>
    <div id="file-uploader">
        <input type="button" name="slider" id="slider" value="Imagen"/>
    </div>
</div>

<div id="pop_im2" title="Imagen slider 2">
    <input type="hidden" value="<?= $img[3] ?>" id="img2" name="img2"/>
    <label for="tit2">Titulo: </label>
    <input type="hidden"  id="vtit2" value="<?= $img[4] ?>"/>
    <input type="text" name="tit2" id="tit2" size="30" value="<?= $img[4] ?>" maxlength="12"/><label id="cvtit2" class="contar"></label><br>
    <label for="des2">Descripcion: </label>
    <input type="hidden"  id="vdtit2" value="<?= $img[5] ?>"/>
    <textarea name="des2" id="des2" rows="5" cols="30" maxlength="40"><?= $img[5] ?></textarea><label id="cvdtit2" class="contar"></label>
    <br>
    <div id="file-uploader2">
        <input type="button" name="slider2" id="slider2" value="Imagen"/>
    </div>
</div>

<!-- modal box -->
<div id="myModal2" class="reveal-modal" align="center">
    <h2>Select Thumbnail</h2>
    <div>
        <img src="" id="thumbnail2" alt="Create Thumbnail" />
        <div id="thumb_preview_holder2">
            <img src=""  alt="Thumbnail Preview" id="thumb_preview2" />
        </div>

        <div class="clear"></div>
        <input type="hidden" name="filename" value="" id="filename2" />
        <input type="hidden" name="x11" value="" id="x12" />
        <input type="hidden" name="y11" value="" id="y12" />
        <input type="hidden" name="x21" value="" id="x22" />
        <input type="hidden" name="y21" value="" id="y22" />
        <input type="hidden" name="w1" value="" id="w2" />
        <input type="hidden" name="h1" value="" id="h2" />
        <input type="submit" name="upload_thumbnail1" value="Save Thumbnail" id="save_thumb2" class="button" />
        <input type="button" name="cancel1" value="X" class="close-reveal-modal" id="cancel_button2"/>
    </div>
</div> <!-- end modal box-->

<div id="pop_titulo" title="Empresa">
    <form id="form_titulo">
        <label for="titulo">Nombre: </label><br>
        <input type="hidden"  id="cev1" value="<?= $row['titulo'] ?>"/>
        <input type="text" name="titulo" id="titulo" size="30" value="<?= $row['titulo'] ?>" maxlength="30"/><label id="ce1" class="contar"></label><br>
        <label for="desctitulo">Descripcion: </label><br>
        <input type="hidden"  id="cemd1" value="<?= $row['desctitulo'] ?>"/>
        <textarea name="desctitulo" id="desctitulo" rows="5" cols="30" maxlength="250"><?= $row['desctitulo'] ?></textarea><label id="cem1" class="contar"></label>
    </form>

</div>

<div id="pop_bien1" title="Titulo 1">
    <label for="titulobien1">Titulo: </label>
    <input type="hidden"  id="cvt1" value="<?= $row['titulobien1'] ?>"/>
    <input type="text" id="titulobien1" name="titulobien1" size="30" value="<?= $row['titulobien1'] ?>" maxlength="30"/><label id="ct1" class="contar"></label><br>
    <label for="bien1">Descripcion: </label>
    <input type="hidden"  id="cvd1" value="<?= $row['bien1'] ?>"/>
    <textarea name="bien1" id="bien1" rows="5" cols="30" maxlength="250"><?= $row['bien1'] ?></textarea><label id="cd1" class="contar"></label>
</div>

<div id="pop_bien2" title="Titulo 2">
    <label for="titulobien2">Titulo: </label>
    <input type="hidden"  id="cvt2" value="<?= $row['titulobien2'] ?>"/>
    <input type="text" id="titulobien2" name="titulobien2" size="30" value="<?= $row['titulobien2'] ?>" maxlength="30"/><label id="ct2" class="contar"></label><br>
    <label for="bien2">Descripcion: </label>
    <input type="hidden"  id="cvd2" value="<?= $row['bien2'] ?>"/>
    <textarea name="bien2" id="bien2" rows="5" cols="30" maxlength="250"><?= $row['bien2'] ?></textarea><label id="cd2" class="contar"></label>
</div>

<div id="pop_bien3" title="Titulo 3">
    <label for="titulobien3">Titulo: </label>
    <input type="hidden"  id="cvt3" value="<?= $row['titulobien3'] ?>"/>
    <input type="text" id="titulobien3" name="titulobien3" size="30" value="<?= $row['titulobien3'] ?>" maxlength="30"/><label id="ct3" class="contar"></label><br>
    <label for="bien3">Descripcion: </label>
    <input type="hidden"  id="cvd3" value="<?= $row['bien3'] ?>"/>
    <textarea name="bien3" id="bien3" rows="5" cols="30" maxlength="250"><?= $row['bien3'] ?></textarea><label id="cd3" class="contar"></label>
</div>

<div id="pop_titlema" title="Lema">
    <form method="POST" id="formlema" enctype="multipart/form-data">
        <input type="hidden" value="<?= $row['idpag'] ?>" id="idplema" name="idplema"/>
        <input type="hidden"  id="titlema" value="<?= $row['titulolema'] ?>"/>
        <label for="titulolema">Titulo lema: </label>
        <input type="text" name="titulolema" id="titulolema" size="30" value="<?= $row['titulolema'] ?>" maxlength="50"/><label id="ctitlema" class="contar"></label><br>
        <label for="desclema">Descripcion Lema: </label>
        <input type="hidden"  id="desctitlema" value="<?= $row['titulolema'] ?>"/>
        <textarea name="desclema" id="desclema" rows="5" cols="30" maxlength="250"><?= $row['desclema'] ?></textarea><label id="cdesctitlema" class="contar"></label>
    </form>
    <div id="file-uploader1">
        <input type="button" name="slider1" id="slider1" value="Imagen"/>
    </div>
</div>

<!-- modal box -->
<div id="myModal1" class="reveal-modal" align="center">
    <h2>Select Thumbnail</h2>
    <div>
        <img src="" id="thumbnail1" alt="Create Thumbnail" />
        <div id="thumb_preview_holder1">
            <img src=""  alt="Thumbnail Preview" id="thumb_preview1" />
        </div>

        <div class="clear"></div>
        <input type="hidden" name="filename" value="" id="filename1" />
        <input type="hidden" name="x11" value="" id="x11" />
        <input type="hidden" name="y11" value="" id="y11" />
        <input type="hidden" name="x21" value="" id="x21" />
        <input type="hidden" name="y21" value="" id="y21" />
        <input type="hidden" name="w1" value="" id="w1" />
        <input type="hidden" name="h1" value="" id="h1" />
        <input type="submit" name="upload_thumbnail1" value="Save Thumbnail" id="save_thumb1" class="button" />
        <input type="button" name="cancel1" value="X" class="close-reveal-modal" id="cancel_button1"/>
    </div>
</div> <!-- end modal box-->


<div id="pop_redes" title="Redes Sociales">
    <div id="nom_red">
        <?php
        $red = explode("|", $row['redes']);
        ?>
        <table>
            <tr>
                <td><label><input type="checkbox" name="fb" value="facebook" id="fb" onclick="mostrarfb()" />Facebook</label></td>
                <td><input type="text" name="face" id="face" size="25" value="<?= $red[0] ?>"/></td>
            </tr>
            <tr>
                <td><label><input type="checkbox" name="tw" value="twitter" id="tw" onclick="mostrartw()" />Twitter</label></td>
                <td><input type="text" name="twit" id="twit" size="25" value="<?= $red[1] ?>"/></td>
            </tr>
            <tr>
                <td><label><input type="checkbox" name="gp" value="gplus" id="gp" onclick="mostrargp()" />gplus</label></td>
                <td><input type="text" name="gplus" id="gplus" size="25" value="<?= $red[2] ?>"/></td>
            </tr>
            <tr>
                <td><label><input type="checkbox" name="yt" value="youtube" id="yt" onclick="mostraryt()" />Youtube</label></td>
                <td><input type="text" name="ytube" id="ytube" size="25" value="<?= $red[3] ?>"/></td>
            </tr>
        </table>
    </div>

</div>

<div id="pop_dir" title="Ubicacion">
    <label for="direccion">Dirección: </label>
    <textarea type="text" name="direccion" id="direccion" rows="5" cols="30" maxlength="250"><?= $row['direccion'] ?></textarea><br>
    <label for="telefono">Teléfono: </label></td>
    <input type="text" name="telefono" id="telefono" size="30" value="<?= $row['telefono'] ?>" maxlength="100"/>
</div>
<div id="admin">

    <div id="loginContainer">
        <a href="#" id="loginButton"><span>Administrador</span><em></em></a>
        <div style="clear:both"></div>
        <div id="loginBox">
            <div id="loginForm">
                <fieldset id="body">
                    <fieldset>
                        <label for="pestana">Datos de la pestaña</label>
                        <input type="text" name="pestana" id="pestana" size="30" value="<?= $row['pestana'] ?>"/>

                        <table style="width: 100%" border="0" cellpadding="0" cellspacing="5">
                            <tr>
                                <td><input type="button" style="background-color: #EFEFEF; border: #C6C6C6;" onclick="cambiacss('default')" ></td>
                                <td><input type="button" style="background-color: #db4360; border: #db4360;" onclick="cambiacss('rojo')" ></td>
                                <td><input type="button" style="background-color: #fed22f; border: #fed22f;" onclick="cambiacss('amarillo')" ></td>
                                <td><input type="button" style="background-color: #21a117; border: #21a117;" onclick="cambiacss('verde')"></td>
                                <td><input type="button" style="background-color: #1c94c4; border: #1c94c4;" onclick="cambiacss('azul')"></td>
                            </tr>

                        </table>
                    </fieldset>
                    <input type="button" value="Guardar" class="login" onclick="guardarTitulo()"/>
                    <!--input type="button" value="Restablecer" class="loginR" /-->
                </fieldset>
                <span><a href="../index.php">Ver resultado?</a></span>
            </div>
        </div>
    </div>

</div>

<div id="main-container">

    <header>
        <div id="logo"><img src="../imagenes/<?= $row['logo'] ?>" id="logo_destino"><h1 id="empresa"></h1></div>
        <div id="menu">
            <nav>
                <ul>
                    <li><a href="#" class="active">Inicio</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Contactos</a></li>
                </ul>
            </nav>

        </div>

        <div class="clear"></div>

    </header>


    <div class="tp-banner-container">

        <div class="tp-banner">
            <ul>
                <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="500"  data-saveperformance="off"  data-title="Slide" id="im1">
                    <img src="../imagenes/<?=$img[0]?>"  alt="slidebg1" data-bgposition="left top" data-bgfit="cover" data-bgrepeat="no-repeat" id="img1_destino">
                    <div class="tp-caption light_heavy_70_shadowed lfb ltt tp-resizeme"
                         data-x="center" data-hoffset="250"
                         data-y="center" data-voffset="-70"
                         data-speed="600"
                         data-start="800"
                         data-easing="Power4.easeOut"
                         data-splitin="none"
                         data-splitout="none"
                         data-elementdelay="0.01"
                         data-endelementdelay="0.1"
                         data-endspeed="500"
                         data-endeasing="Power4.easeIn"
                         style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;" id="tit1_out"><?=$img[1]?></div>
                    <div class="tp-caption light_medium_30_shadowed lfb ltt tp-resizeme"
                         data-x="center" data-hoffset="225"
                         data-y="center" data-voffset="40"
                         data-speed="600"
                         data-start="900"
                         data-easing="Power4.easeOut"
                         data-splitin="none"
                         data-splitout="none"
                         data-elementdelay="0.01"
                         data-endelementdelay="0.1"
                         data-endspeed="500"
                         data-endeasing="Power4.easeIn"
                         style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;" id="desc1_out"><?=$img[2]?>
                    </div>


                </li>
                <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on"  data-title="Intro Slide" id="im2">
                    <img src="../imagenes/<?=$img[3]?>"  alt="slidebg1" data-bgposition="left top" data-bgfit="cover" data-bgrepeat="no-repeat" >
                    <div class="tp-caption light_heavy_70_shadowed lfb ltt tp-resizeme"
                         data-x="center" data-hoffset="250"
                         data-y="center" data-voffset="-70"
                         data-speed="600"
                         data-start="800"
                         data-easing="Power4.easeOut"
                         data-splitin="none"
                         data-splitout="none"
                         data-elementdelay="0.01"
                         data-endelementdelay="0.1"
                         data-endspeed="500"
                         data-endeasing="Power4.easeIn"
                         style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;" id="tit2_out"><?=$img[4]?></div>
                    <div class="tp-caption light_medium_30_shadowed lfb ltt tp-resizeme"
                         data-x="center" data-hoffset="225"
                         data-y="center" data-voffset="40"
                         data-speed="600"
                         data-start="900"
                         data-easing="Power4.easeOut"
                         data-splitin="none"
                         data-splitout="none"
                         data-elementdelay="0.01"
                         data-endelementdelay="0.1"
                         data-endspeed="500"
                         data-endeasing="Power4.easeIn"
                         style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;" id="desc2_out"><?=$img[5]?>
                    </div>
                </li>
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>

    <!-- modal box -->
    <div id="myModal" class="reveal-modal" align="center">
        <h2>Select Thumbnail</h2>
        <div>
            <img src="" id="thumbnail" alt="Create Thumbnail" />
            <div id="thumb_preview_holder">
                <img src=""  alt="Thumbnail Preview" id="thumb_preview" />
            </div>

            <div class="clear"></div>
            <input type="hidden" name="filename" value="" id="filename" />
            <input type="hidden" name="x1" value="" id="x1" />
            <input type="hidden" name="y1" value="" id="y1" />
            <input type="hidden" name="x2" value="" id="x2" />
            <input type="hidden" name="y2" value="" id="y2" />
            <input type="hidden" name="w" value="" id="w" />
            <input type="hidden" name="h" value="" id="h" />
            <input type="submit" name="upload_thumbnail" value="Save Thumbnail" id="save_thumb" class="button" />
            <input type="button" name="cancel" value="X" class="close-reveal-modal" id="cancel_button"/>
        </div>
    </div> <!-- end modal box-->


    <div id="container">
        <div class="table bg1">
            <div id="bien_out1">
                <section>
                    <h3 id="titb1_out"><?= $row['titulobien1'] ?></h3>
                    <p id="bien1_out"><?= $row['bien1'] ?></p>
                </section>
            </div>
            <div id="bien_out2" class="bc">
                <section>
                    <h3 id="titb2_out"><?= $row['titulobien2'] ?></h3>
                    <p id="bien2_out"><?= $row['bien2'] ?></p>
                </section>
            </div>
            <div id="bien_out3">
                <section>
                    <h3 id="titb3_out"><?= $row['titulobien3'] ?></h3>
                    <p id="bien3_out"><?= $row['bien3'] ?></p>
                </section>
            </div>
        </div>
        <div class="parallax parallax-1" id="parall">
            <h4 id="tlema_out"><?= $row['titulolema'] ?></h4>
            <h2 id="dlema_out"><?= $row['desclema'] ?></h2>
        </div>
    </div>

</div>
<footer>
    <div class="table">
        <div class="w1" id="emp">
            <h4 class="t1" id="t1"><?= $row['titulo'] ?></h4>
            <p class="p1" id="descempresa"><?= $row['desctitulo'] ?></p>
        </div>
        <div class="w2" id="dir">
            <h4>Dónde estamos</h4>
            <p class="loc mp" id="dir_out"><?= $row['direccion'] ?></p>
            <p class="loc ph" id="tel_out"><?= $row['telefono'] ?></p>
        </div>
        <div class="w2" id="red">
            <h4>Siguenos</h4>
            <?php
            $red = explode("|", $row['redes']);
            ?>
            <ul>
                <li><a href="<?= $red[0] ?>" target="_blank" class="follow f"> </a></li>
                <li><a href="<?= $red[1] ?>" target="_blank" class="follow t"> </a></li>
                <li><a href="<?= $red[2] ?>" target="_blank" class="follow g"> </a></li>
                <li><a href="<?= $red[3] ?>" target="_blank" class="follow y"> </a></li>
            </ul>
        </div>
    </div>
</footer>
<!--script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script-->
<!--script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script-->
<script src="../js/jquery-ui.js"></script>
<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="../js/plugins.js"></script>
<script src="../js/main.js"></script>
<script src="../js/mainI.js"></script>

<script type="text/javascript" src="../js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="../js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.tp-banner').revolution(
            {
                delay: 9000,
                startwidth: 1170,
                startheight: 500,
                hideThumbs: 10,
                navigationType: "none",
                navigationArrows: "solo",
                touchenabled: "on",
                onHoverStop: "on",
                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false
            });
    });
</script>

</body>
</html>