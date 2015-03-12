<?php
session_start();
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-Type: text/html; charset=UTF-8");
include_once 'conexion.php';
$idpag = $_GET['idpag'];
$query = "SELECT * FROM pag_uno  ORDER BY idpag DESC LIMIT 0,1";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

$query1 = "SELECT * FROM pag_servicios WHERE idserv = $idpag ORDER BY idserv DESC LIMIT 0,1";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_array($result1);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?= $row1['pestana_serv'] ?></title>
        <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">

        <link rel="stylesheet" href="css/reveal.css">
        <link rel="stylesheet" href="css/mystyle.css">

        <script src="js/jquery-pack.js" type="text/javascript"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <!-- required plugin for ajax file upload -->
        <script src="js/fileuploader.js" type="text/javascript"></script>
        <!-- The Reveal plugin -->
        <script src="js/jquery.reveal.js" type="text/javascript"></script>
        <!-- resizing image -->
        <script src="js/jquery.imgareaselect.min.js" type="text/javascript"></script>


        <script type="text/javascript">
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
                            error: function (data) {
                                alert(data);
                            }
                        });

                        return true;
                    }
                });
            });

            function guardarImgServicio(img) {
                var dir = "uploads/";
                $.ajax({
                    url: 'servicioupdatefondo.php',
                    type: 'GET',
                    async: true,
                    data: 'ids=' + $('#ids').val() + '&dir_imagen=' + dir + '&imagen=' + img,
                    success: function () {
                        $("#main-container #slider").css({"background": "url(../imagenes/" + img + ") no-repeat", "height": "150px", "display": "table", "width": "100%"});
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
        </script>
        <style>
            @import url(http://fonts.googleapis.com/css?family=Muli);
            @import url(http://fonts.googleapis.com/css?family=Open+Sans:800);
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
            #admin{position: absolute;top:0; right: 10px; z-index: 2;cursor: pointer;}
            #admin1{float: left; padding-right: 15px; padding-left: 15px;color: #F7F7F7}

            #fin{float: right; display: block; padding-right: 5px; padding-left: 5px; background-color: #66afe9}
            #form-adminS{overflow: auto; display: none;}

            #main-container{margin:0 auto;width:1100px;}
            #main-container header{border-top:#FF8D2C solid 5px; padding:30px 0 10px 0}
            #main-container header a{color:#A1A1A1;}
            #main-container header a.active{color:#FF8D2C;}
            #main-container header a:hover{color:#FF8D2C;}
            #main-container header a:visited{color:#A1A1A1;}
            #main-container header ul{ overflow:hidden; padding-top:10px}
            #main-container header li{float:left; padding:5px 30px 5px 0}
            #main-container header #logo{float:left}
            #main-container header #menu{float:right}
            #main-container #slider{background:url(../imagenes/<?= $row1['img_servicio'] ?>) no-repeat; height:150px; display:table; width:100%;}
            /*#main-container #slider:hover{border:solid 2px #BB0000; cursor: crosshair; background: #CCC;opacity:0.8; filter:alpha(opacity=60); z-index: 2; position: relative}*/
            #main-container #slider #pagina{text-transform:uppercase;display:table-cell;vertical-align:middle; text-align:right; padding:0 20px 0 0; }
            #main-container #slider #pagina h1{font-size:60px;letter-spacing:-1px;font-family: 'Open Sans', sans-serif; font-weight:bold; text-shadow: 2px 2px 2px rgba(255, 255, 255, 0.68);}
            #main-container #slider #pagina h1 span{ color:#FF8D2C}
            #main-container #servicios {display:table; width:100%;font-size:13px;}
            #main-container #servicios ul{display:table-row;}
            #main-container #servicios li{display:table-cell;width:33%; padding-top:10px;}
            #main-container #servicios li img{ width:100%; height:220px}
            #main-container #servicios li .bor{border:#DEDEDE solid 1px}
            #main-container #servicios li .lf{margin-right:20px}
            #main-container #servicios li .rg{margin-left:20px}
            #main-container #servicios li .ct{margin-left:10px;margin-right:10px}
            #main-container #servicios li .box{ padding:30px; color:#666}
            #main-container .slogan h2{ text-align:center; padding:50px 10px; color:#333;border-bottom:#FF8D2C solid 5px; }

            .sb1 :hover, #servs1:hover, #servs2:hover, #servs3:hover, #servs4:hover, #servs5:hover, #servs6:hover{border:solid 2px #BB0000; cursor: crosshair; background: #CCC;opacity:0.8; filter:alpha(opacity=60); z-index: 11; position: relative}

            footer{background:#474747;margin:0 auto;width:1100px; margin-top:10px; padding-bottom:20px}
            footer .table{display:table;width:100%}
            footer .table div{display:table-cell; color:#FFF}
            footer .table div.w1{width:50%;}
            footer .table div.w2{width:25%;}
            footer p{font-size:13px;}
            footer li{float:left;width:45px;height:45px}
            footer li a{display:block;width:45px;height:45px;background-repeat:no-repeat; background-image:url(../imagenes/social.png)}
            footer li a:hover{-ms-transition: all .3s;-moz-transition: all .3s;-o-transition: all .3s;		-webkit-transition:all .3s;transition: all .3s;}
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
            .ui-widget-header,.ui-state-default, ui-button{background:#337AB7; border: 1px solid #66afe9; color: #FFFFFF;}
            #pop_imgserv,#pop_lema,#pop_serv1,#pop_serv2,#pop_serv3,#pop_serv4,#pop_serv5,#pop_serv6{overflow: auto;display: none}
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
        </style>
    </head>

    <body>
        <input type="hidden" id="ids" value="<?= $row1['idserv'] ?>"/>
        <div id="pop_lema" title="Slogan">
            <textarea type="text" name="lema-serv" id="lema-serv" rows="5" cols="30"><?= $row1['lema_serv'] ?></textarea>
        </div>
        <div id="pop_serv1" title="Servicio 1">
            <form method="POST" id="formServ1" enctype="multipart/form-data">
                <input type="hidden" value="<?= $row1['idserv'] ?>" id="ids1" name="ids1"/>
                <label for="serv-1">Servicio: </label><br>
                <input type="text" name="serv-1" id="serv-1" size="40" value="<?= $row1['serv_1'] ?>"/><br>
                <label for="img-ser1">Imagen: </label><br>
                <input type="file" name="img-ser1" id="img-ser1" accept="image/jpeg/png" data-val="true" value="<?= $row1['img_ser1'] ?>" required="true"/><br>
                <label for="sdesc-1">Descripcion: </label><br>
                <textarea name="sdesc-1" id="sdesc-1" rows="5" cols="40" required="true"><?= $row1['sdesc_1'] ?></textarea>
            </form>
        </div>

        <div id="pop_serv2" title="Servicio 2">
            <form method="POST" id="formServ2" enctype="multipart/form-data">
                <input type="hidden" value="<?= $row1['idserv'] ?>" id="ids2" name="ids2"/>
                <label for="serv-2">Servicio: </label><br>
                <input type="text" name="serv-2" id="serv-2" size="40" value="<?= $row1['serv_2'] ?>"/><br>
                <label for="img-ser2">Imagen: </label><br>
                <input type="file" name="img-ser2" id="img-ser2" accept="image/jpeg/png" data-val="true" value="<?= $row1['img_ser2'] ?>"/><br>
                <label for="sdesc-2">Descripcion: </label><br>
                <textarea name="sdesc-2" id="sdesc-2" rows="5" cols="40"><?= $row1['sdesc_2'] ?></textarea>
            </form>
        </div>
        <div id="pop_serv3" title="Servicio 3">
            <form method="POST" id="formServ3" enctype="multipart/form-data">
                <input type="hidden" value="<?= $row1['idserv'] ?>" id="ids3" name="ids3"/>
                <label for="serv-3">Servicio: </label><br>
                <input type="text" name="serv-3" id="serv-3" size="40" value="<?= $row1['serv_3'] ?>"/><br>
                <label for="img-ser3">Imagen: </label><br>
                <input type="file" name="img-ser3" id="img-ser3" accept="image/jpeg/png" data-val="true" value="<?= $row1['img_ser3'] ?>"/><br>
                <label for="sdesc-3">Descripcion: </label><br>
                <textarea name="sdesc-3" id="sdesc-3" rows="5" cols="40" ><?= $row1['sdesc_3'] ?></textarea>
            </form>
        </div>
        <div id="pop_serv4" title="Servicio 4">
            <form method="POST" id="formServ4" enctype="multipart/form-data">
                <input type="hidden" value="<?= $row1['idserv'] ?>" id="ids4" name="ids4"/>
                <label for="serv-4">Servicio: </label><br>
                <input type="text" name="serv-4" id="serv-4" size="40" value="<?= $row1['serv_4'] ?>"/><br>
                <label for="img-ser4">Imagen: </label><br>
                <input type="file" name="img-ser4" id="img-ser4" accept="image/jpeg/png" data-val="true" value="<?= $row1['img_ser4'] ?>"/><br>
                <label for="sdesc-4">Descripcion: </label><br>
                <textarea name="sdesc-4" id="sdesc-4" rows="5" cols="40"><?= $row1['sdesc_4'] ?></textarea>
            </form>
        </div>
        <div id="pop_serv5" title="Servicio 5">
            <form method="POST" id="formServ5" enctype="multipart/form-data">
                <input type="hidden" value="<?= $row1['idserv'] ?>" id="ids5" name="ids5"/>
                <label for="serv-5">Servicio: </label><br>
                <input type="text" name="serv-5" id="serv-5" size="40" value="<?= $row1['serv_5'] ?>"/><br>
                <label for="img-ser5">Imagen: </label><br>
                <input type="file" name="img-ser5" id="img-ser5" accept="image/jpeg/png" data-val="true" value="<?= $row1['img_ser5'] ?>"/><br>
                <label for="sdesc-5">Descripcion: </label><br>
                <textarea name="sdesc-5" id="sdesc-5" rows="5" cols="40"><?= $row1['sdesc_5'] ?></textarea>
            </form>
        </div>
        <div id="pop_serv6" title="Servicio 6">
            <form method="POST" id="formServ6" enctype="multipart/form-data">
                <input type="hidden" value="<?= $row1['idserv'] ?>" id="ids6" name="ids6"/>
                <label for="serv-6">Servicio: </label><br>
                <input type="text" name="serv-6" id="serv-6" size="40" value="<?= $row1['serv_6'] ?>"/><br>
                <label for="img-ser6">Imagen: </label><br>
                <input type="file" name="img-ser6" id="img-ser6" accept="image/jpeg/png" data-val="true" value="<?= $row1['img_ser6'] ?>"/><br>
                <label for="sdesc-6">Descripcion: </label><br>
                <textarea name="sdesc-6" id="sdesc-6" rows="5" cols="40"><?= $row1['sdesc_6'] ?></textarea>
            </form>
        </div>


        <div id="admin">
            <div id="loginContainer">
                <a href="#" id="loginButton"><span>Administrador</span><em></em></a>
                <div style="clear:both"></div>
                <div id="loginBox">                
                    <div id="loginForm">
                        <fieldset id="body">
                            <fieldset>
                                <label for="pestana-serv">Datos de la pestaña</label>
                                <input type="text" name="pestana-serv" id="pestana-serv" size="30" value="<?= $row1['pestana_serv'] ?>"/>
                            </fieldset>
                            <input type="button" value="Guardar" class="login" onclick="cargarSlogan()"/>
                            <!--input type="button" value="Restablecer" class="loginR" /-->                            
                        </fieldset>
                        <span><a href="../servicios.php">Ver resultado?</a></span>
                    </div>
                </div>
            </div>

        </div>
        <div id="form-adminS" title="Pestaña">

        </div>

        <div id="main-container">
            <header>
                <div id="logo"><img src="../imagenes/<?= $row['logo'] ?>"></div>
                <div id="menu">
                    <nav>
                        <ul>
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#" class="active">Servicios</a></li>
                            <li><a href="#">Contactos</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="clear"></div>
            </header>
            <div id="file-uploader">
                <div id="slider" >
                    <div id="pagina">
                        <h1>Servicios<span>.</span></h1>
                    </div>
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
            <div class="slogan sb1" id="slogan">
                <h2 id="lema_out"><?= $row1['lema_serv'] ?></h2>
            </div>

            <div id="servicios">
                <ul>
                    <li id="servs1">
                        <div class="lf bor">
                            <div><img src="../imagenes/<?= $row1['img_ser1'] ?>" id="img_out_1"></div>          
                            <div class="box">
                                <h3 id="sv1"><?= $row1['serv_1'] ?></h3>
                                <p id="sd1"><?= $row1['sdesc_1'] ?></p></div>
                        </div>
                    </li>
                    <li id="servs2">
                        <div class="ct bor">
                            <div><img src="../imagenes/<?= $row1['img_ser2'] ?>" id="img_out_2"></div>          
                            <div class="box">
                                <h3 id="sv2"><?= $row1['serv_2'] ?></h3>
                                <p id="sd2"><?= $row1['sdesc_2'] ?></p></div>
                        </div>
                    </li>
                    <li id="servs3">
                        <div class="rg bor">
                            <div><img src="../imagenes/<?= $row1['img_ser3'] ?>" id="img_out_3"></div>          
                            <div class="box">
                                <h3 id="sv3"><?= $row1['serv_3'] ?></h3>
                                <p id="sd3"><?= $row1['sdesc_3'] ?></p></div>
                        </div>
                    </li>
                </ul>
                <ul>
                    <li id="servs4">
                        <div class="lf bor">
                            <div><img src="../imagenes/<?= $row1['img_ser4'] ?>" id="img_out_4"></div>          
                            <div class="box">
                                <h3 id="sv4"><?= $row1['serv_4'] ?></h3>
                                <p id="sd4"><?= $row1['sdesc_4'] ?></p></div>
                        </div>
                    </li>
                    <li id="servs5">
                        <div class="ct bor">          
                            <div><img src="../imagenes/<?= $row1['img_ser5'] ?>" id="img_out_5"></div>          
                            <div class="box">
                                <h3 id="sv5"><?= $row1['serv_5'] ?></h3>
                                <p id="sd5"><?= $row1['sdesc_5'] ?></p></div>
                        </div>
                    </li>
                    <li id="servs6">
                        <div class="rg bor">
                            <div><img src="../imagenes/<?= $row1['img_ser6'] ?>" id="img_out_6"></div>          
                            <div class="box">
                                <h3 id="sv6"><?= $row1['serv_6'] ?></h3>
                                <p id="sd6"><?= $row1['sdesc_6'] ?></p></div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
        <footer>
            <div class="table">
                <div class="w1">
                    <h4 class="t1"><?= $row['titulo'] ?></h4>
                    <p class="p1"><?= $row['desctitulo'] ?></p>
                </div>
                <div class="w2">
                    <h4>Dónde estamos</h4>
                    <p class="loc mp"><?= $row['direccion'] ?></p>
                    <p class="loc ph"><?= $row['telefono'] ?></p>
                </div>
                <div class="w2">
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
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="../js/plugins.js"></script>
        <script src="../js/mainS.js"></script>
        <!--script src="js/croplogica.js"></script-->
    </body>
</html>