<?php
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-Type: text/html; charset=UTF-8");
include_once 'conexion.php';
$idpag = $_GET['idpag'];
$query = "SELECT * FROM pag_uno ORDER BY idpag DESC LIMIT 0,1";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

$query = "SELECT * FROM pag_contactos WHERE idcont = $idpag ORDER BY idcont DESC LIMIT 0,1";
$result = mysql_query($query);
$row1 = mysql_fetch_array($result);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?=$row1['pestana_cont']?></title>
        <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
        <!--link href="../css/jquery-ui.css" rel="stylesheet"-->
        
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
        <script src="../js/jquery.rss.js"></script>
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

            #pop_pestanaC{overflow: auto; display: none;}

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
            #main-container #slider{background:url(../imagenes/<?=$row1['img_contacto']?>) no-repeat; height:150px; display:table; width:100%;}
            /*#main-container #slider:hover{border:solid 2px #BB0000; cursor: crosshair; background: #CCC;opacity:0.8; filter:alpha(opacity=60); z-index: 2; position: relative}*/
            #main-container #slider #pagina{text-transform:uppercase;display:table-cell;vertical-align:middle; text-align:right; padding:0 20px 0 0;}
            #main-container #slider #pagina h1{font-size:60px;letter-spacing:-1px;font-family: 'Open Sans', sans-serif; font-weight:bold;text-shadow: 2px 2px 2px rgba(6, 6, 6, 0.85);}
            #main-container #slider #pagina h1 span{ color:#FF8D2C}

            #main-container #mapCanvas{width:100%;height:300px;border:#DADADA solid 1px;margin-top:20px}

            #main-container #utiles{display:table;width:100%;margin-top:20px}
            #main-container #utiles div{display:table-cell; vertical-align:top}
            #main-container #utiles div#widget{width:300px;}
            #main-container #utiles div#widget h3{ padding:5px; background:#900; color:#FFF;font-family: 'Open Sans', sans-serif;}
            #main-container #utiles div#widget aside{border:#900 solid 1px;padding:5px; font-size:11px}
            #main-container #utiles div#widget aside.noticias{overflow:auto; height:300px}
            #main-container #utiles div#widget ul {list-style-type: none; margin: 0px; padding: 0px; }
            #main-container #utiles div#widget li {padding: 10px;border-top: 1px dashed #AAA;background-color: #EFEFEF;}
            #main-container #utiles div#widget li:first-child {border-top: none;}
            #main-container #utiles div#widget li:nth-child(2n) {background-color: white;}

            #main-container #formulario{display:table;width:100%; margin-top:20px}
            #main-container #formulario ul{display:table-row}
            #main-container #formulario ul li{ display:table-cell; width:50%; vertical-align:middle; padding:10px 0}
            #main-container #mensaje{ margin-top:10px}
            #main-container #mensaje:hover{border:solid 2px #BB0000; cursor: crosshair; background: #CCC;opacity:0.8; filter:alpha(opacity=60); z-index: 2; position: relative}
            #main-container .form-control{display:block;width:100%;height:34px;padding:6px 12px;font-size:14px;line-height:1.42857143;color:#555;background-color:#fff;background-image:none;border:1px solid #ccc;border-radius:4px;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075);-webkit-transition:border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;-o-transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s;transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s}
            #main-container .form-control:focus{border-color:#66afe9;outline:0;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)}
            #main-container .btn-primary{color:#fff;background-color:#337ab7; border:none}
            #main-container .btn-default{color:#333;background-color:#fff;border:#ccc solid 1px}
            #main-container .btn{cursor:pointer;padding:10px 20px;margin-top:5px;border-radius:4px;}
            #main-container .btn:hover{outline:0;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)}
            #main-container label.error{display:block; color:#337AB7;font-size:11px; padding:2px}
            .contar{color: #1c94c4}
            .sb1 :hover{border:solid 2px #BB0000; cursor: crosshair; background: #CCC;opacity:0.8; filter:alpha(opacity=60); z-index: 11; position: relative}
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
            #pop_imgC,#pop_inv,#pop_pestanaC{overflow: auto;display: none}
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

        <link rel=Stylesheet href="css/<?=$row['estilo']?>.css" type="text/css">

        <script type="text/javascript">

            $(document).ready(function(){

              $("#rss-feeds").rss("http://www.boliviaentusmanos.com/noticias/rss.php", {
                 limit: 10,
                 effect: 'slideFastSynced'
              });
            });

        </script>

        
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
                    url: 'contactoupdatefondo.php',
                    type: 'GET',
                    async: true,
                    data: 'idc=' + $('#idp').val() + '&dir_imagen=' + dir + '&imagen=' + img,
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

        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <?php
            $coor = explode(",",$row1['cordenadas']);
        ?>
        <script type="text/javascript">
            var stockholm = new google.maps.LatLng(<?=$coor[0]?>, <?=$coor[1]?>);
            var parliament = new google.maps.LatLng(<?=$coor[0]?>, <?=$coor[1]?>);
            var marker;
            var map;
            var markersArray = [];

            function initialize() {
                var mapOptions = {
                    zoom: 16,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    center: stockholm

                };

                map = new google.maps.Map(document.getElementById("mapCanvas"),
                        mapOptions);

                google.maps.event.addListener(map, "maptypechanged", function () {
                    updateImage();
                });
                google.maps.event.addListener(map, 'click', function (event) {
                    addMarker(event.latLng);
                });
                google.maps.event.addListener(marker, "click", function () {
                    alert("click marca");
                });

                google.maps.event.addListener(marker, 'drag', function () {
                    updateMarkerPosition(marker.getPosition());
                    updateImage();
                });
            }

            function addMarker(location) {
                marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    title: 'marcador'
                });
                updateMarkerPosition(marker.getPosition());
                
                markersArray.push(marker);
                cargarInvitacion();
            }

            function updateMarkerPosition(latLng) {
                document.getElementById('cordenadas').value = [
                    latLng.lat(),
                    latLng.lng()
                ].join(',');
            }
            function updateMarkerStatus(str) {
                alert("upms");
                document.getElementById('estado').value = str;
            }
            function clearOverlays() {
                        if (markersArray) {
              for (i in markersArray) {
                markersArray[i].setMap(null);
              }
              markersArray.length = 0;
            }
            }

            function GetXmlHttpObject() {
                var xmlhttp = false;
                try {
                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    try {
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (E) {
                        xmlhttp = false;
                    }
                }
                if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
                    xmlhttp = new XMLHttpRequest();
                }
                return xmlhttp;
            }
            function GetMapasLink() {
                var Cm = document.getElementById("cmapa").value;
                var Em = document.getElementById("empres").value;
                var LtLg = document.getElementById("cordenadas").value;
                var url = "Mcod=" + Cm + "&Ecod=" + Em + "&LtLn=" + LtLg + "&t=" + Math.random();
                var respuesta = document.getElementById("contenidos");
                respuesta.innerHTML = '<p>Cargando InformaciÃ³n...</p>';
                xmlHttpAjax = GetXmlHttpObject();
                xmlHttpAjax.open("POST", "_nmaps.php", true);
                xmlHttpAjax.onreadystatechange = function () {
                    if (xmlHttpAjax.readyState == 4 || xmlHttpAjax.readyState == "complete") {
                        respuesta.innerHTML = xmlHttpAjax.responseText;
                    }
                }
                xmlHttpAjax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xmlHttpAjax.send(url)
            }
            function GetEmpLink() {
                var Cm = document.getElementById("cmapa").value;
                var url = "Mcod=" + Cm + "&t=" + Math.random();
                var respuesta = document.getElementById("empresa");
                respuesta.innerHTML = '<p>Cargando InformaciÃ³n...</p>';
                xmlHttpAjax = GetXmlHttpObject();
                xmlHttpAjax.open("POST", "_emps.php", true);
                xmlHttpAjax.onreadystatechange = function () {
                    if (xmlHttpAjax.readyState == 4 || xmlHttpAjax.readyState == "complete") {
                        respuesta.innerHTML = xmlHttpAjax.responseText;
                        document.getElementById('empres').value = document.getElementById("hempres").value;
                        document.getElementById('valores').checked = false;
                    }
                }
                xmlHttpAjax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xmlHttpAjax.send(url)
            }
            function CheckboxDis(_a) {
                if (_a.checked) {
                    document.getElementById('empres').value = "SN";
                } else {
                    document.getElementById('empres').value = document.getElementById("hempres").value;
                }
            }
        </script>
        
    </head>

    <body onload="initialize()">
        
        <input name="cordenadas" type="hidden" id="cordenadas" size="50" readonly="readonly" value="<?=$row1['cordenadas']?>"/>
        <input type="hidden" id="idp" value="<?=$row1['idcont']?>"/>

        <div id="pop_inv" title="Invitacion">
            <div id="pop_inv_val">
                <input type="hidden" value="<?=$row1['inv_cont']?>" id="cant_inv"/>
                <textarea name="inv-cont" id="inv-cont" rows="5" cols="30" maxlength="200" required="true" placeholder="200 caracteres"><?=$row1['inv_cont']?></textarea>
            </div>
            <p id="contador" class="contar"></p>
            
        </div>
        <div id="admin">
            <div id="loginContainer">
                <a href="#" id="loginButton"><span>Administrador</span><em></em></a>
                <div style="clear:both"></div>
                <div id="loginBox">                
                    <div id="loginForm">
                        <fieldset id="body">
                            <fieldset>
                                <label for="pestana-cont">Datos de la pestaña</label>
                                <input type="text" name="pestana-cont" id="pestana-cont" size="40" value="<?=$row1['pestana_cont']?>"/>
                            </fieldset>
                            <input type="button" value="Guardar" class="login" onclick="cargarInvitacion()"/>
                            <!--input type="button" value="Restablecer" class="loginR" /-->                            
                        </fieldset>
                        <span><a href="../contactos.php">Ver resultado?</a></span>
                    </div>
                </div>
            </div>
            
        </div>
        <div id="pop_pestanaC" title="Pestaña">
            
        </div>

        <div id="main-container">
            <header>
                <div id="logo"><img src="../imagenes/<?= $row['logo'] ?>"></div>
                <div id="menu">
                    <nav>
                        <ul>
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#">Servicios</a></li>
                            <li><a href="#" class="active">Contactos</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="clear"></div>
            </header>
            
            <div id="file-uploader">
            <div id="slider">
                <div id="pagina">
                    <h1>contactos<span>.</span></h1>
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

            <div id="mapCanvas"></div>
            <input type="button" value="Clear Marker" onclick="clearOverlays()"/>
            <!--input type="button" value="Marcar" onclick="cargarInvitacion()"/-->

            <div>
                <div id="mensaje">
                    <h3>Nos encantaría escuchar de usted!</h3>
                    <p id="inv_out"><?=$row1['inv_cont']?></p>
                </div>
                <div id="utiles">
                    <div id="formulario">
                        <form id="commentForm" name="commentForm" method="post" enctype="application/x-www-form-urlencoded" action="amarillas/enviarcon.php">
                            <ul>
                                <li>Nombre:(*)</li>
                                <li><input name="enombre" type="text" id="enombre" class="required form-control" maxlength="50"></li>
                            </ul>
                            <ul>
                                <li>Teléfono:(*)</li>
                                <li><input name="etelefono" type="text" id="etelefono" class="required form-control" maxlength="50"></li>
                            </ul>
                            <ul>
                                <li>E-Mail:(*)</li>
                                <li><input name="eemail" type="text" id="eemail" class="required email form-control" maxlength="50"></li>
                            </ul>
                            <ul>
                                <li>Comentario:</li>
                                <li><textarea name="ecomentario" rows="5" id="ecomentario" class="required form-control"></textarea></li>
                            </ul>
                            <ul>
                                <li> </li>
                                <li><input name="button" type="submit" class="btn btn-primary" id="button" value="Enviar Mensaje">
                                    o llamenos: <?= $row['telefono'] ?> </li>
                            </ul>
                        </form>
                    </div>

                    <div id="widget">

                        <h3>CAMBIO DE MONEDA</h3>
                        <aside>
                            <iframe scrolling="No" src="http://www.boliviaentusmanos.com/cambio.php" width="280" height="150" frameborder="0"></iframe>
                        </aside>
                        <h3>NOTICIAS DE BOLIVIA</h3>
                        <aside class="noticias">
                            <div id="rss-feeds"></div>
                        </aside>

                    </div>

                </div>
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
        <!--script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script-->
        <script src="../js/jquery-ui.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="../js/plugins.js"></script>
        <script src="../js/main.js"></script>
        <script src="../js/mainC.js"></script>
        
    </body>
</html>