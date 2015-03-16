<?php
session_start();
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html; charset=UTF-8');
include_once 'admin/conexion.php';

$query = "SELECT * FROM pag_uno ORDER BY idpag DESC LIMIT 0,1";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?= $row['pestana'] ?></title>
        <meta name="description" content="Descripcion de la página">

        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" >
        <link rel="stylesheet" type="text/css" href="css/noneed.css" media="screen" >
        <link rel="stylesheet" type="text/css" href="css/extralayers.css" media="screen" >
        <link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" >
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
            #main-container{margin:0 auto;width:1100px;}
            #topheader{}
            #main-container header{border-top:#FF8D2C solid 5px; padding:30px 0 10px 0}
            #main-container header a{color:#A1A1A1;}
            #main-container header a.active{color:#FF8D2C;}
            #main-container header a:hover{color:#FF8D2C;}
            #main-container header a:visited{color:#A1A1A1;}
            #main-container header ul{ overflow:hidden; padding-top:10px}
            #main-container header li{float:left; padding:5px 30px 5px 0}
            #main-container header #logo{float:left}
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

            #main-container .parallax{margin-top:10px;height:300px;background-repeat:no-repeat;background-attachment:fixed;background-size:cover; background-position:50% 50%}
            #main-container .parallax-1{background-image: url("imagenes/<?= $row['imagen2'] ?>");}
            #main-container .parallax h3, #main-container .parallax h4{text-transform:uppercase}
            #main-container .parallax h4{color:#CCC;padding:80px 350px 5px 40px;font-size:20px;text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.68);}
            #main-container .parallax h2{color:#FFF;padding:0px 350px 0px 40px;font-size:30px;text-transform:uppercase;text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.68);}
            footer{background:#474747;margin:0 auto;width:1100px; margin-top:10px; padding-bottom:20px}
            footer .table{display:table;width:100%}
            footer .table div{display:table-cell; color:#FFF}
            footer .table div.w1{width:50%;}
            footer .table div.w2{width:25%;}
            footer p{font-size:13px;}
            footer li{float:left;width:45px;height:45px}
            footer li a{display:block;width:45px;height:45px;background-repeat:no-repeat; background-image:url(imagenes/social.png)}
            footer li a.f{background-position:0px 0px}
            footer li a.t{background-position:0px -45px}
            footer li a.g{background-position:0px -135px}
            footer li a.y{background-position:0px -90px}
            footer li a.f:hover{background-color:#3B5998}
            footer li a.t:hover{background-color:#00ACED}
            footer li a.g:hover{background-color:#DD4B39}
            footer li a.y:hover{background-color:#BB0000}
            footer p.mp{background-repeat:no-repeat;background-image:url(imagenes/ph.png);background-position:0px 0px;padding-left:20px;}
            footer p.ph{background-repeat:no-repeat;background-image:url(imagenes/mp.png);background-position:0px 0px;padding-left:20px; margin-top:10px}
            footer h4{padding-top:30px; padding-bottom:10px}
            footer h4.t1{padding-left:40px}
            footer .p1{padding:0px 20px 10px 40px}
            #admin{position: absolute;top:0; right: 10px; z-index: 2;cursor: pointer;}
            .ui-widget-header,.ui-state-default, ui-button{background:#337AB7; border: 1px solid #66afe9; color: #FFFFFF;}
            #pop_logo,#pop_im1,#pop_titulo,#pop_desctit,#pop_bien1,#pop_bien2,#pop_bien3,#pop_titlema,
            #pop_descl,#pop_redes,#pop_dir,#pop_tel,#pop_but,#pop_im2{overflow: auto;display: none}
            #admin #loginContainer {position:relative;float:right;font-size:12px;}
            #admin #loginButton {display:inline-block; float:right; background:#337AB7; border:1px solid #337AB7; border-radius:3px; -moz-border-radius:3px; position:relative; z-index:80; cursor:pointer;}
            /* Login Button Text */
            #admin #loginButton span {color:#FFF;  font-size:14px; font-weight:bold;   padding:7px 29px 9px 10px; background:url(imagenes/loginArrow.png) no-repeat 110px 7px; display:block;float: left}
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
            #admin #loginForm .login { width:auto; float:left; background:#339cdf url(imagenes/loginbuttonbg.png) repeat-x; color:#fff; padding:7px 10px 8px 10px; text-shadow:0px -1px #278db8; border:1px solid #339cdf; box-shadow:none; -moz-box-shadow:none; -webkit-box-shadow:none;  margin:0 12px 0 0;  cursor:pointer; *padding:7px 2px 8px 2px; /* IE7 Fix */}
            #admin #loginForm .loginR { width:auto; float:left; background:#DD4B39; color:#fff; padding:7px 10px 8px 10px; border:1px solid #DD4B39; box-shadow:none; -moz-box-shadow:none; -webkit-box-shadow:none;  margin:0 12px 0 0;  cursor:pointer; *padding:7px 2px 8px 2px; /* IE7 Fix */}
            /* Forgot your password */
            #admin #loginForm span {text-align:center; display:block; padding:7px 0 4px 0;color:#FFF;}
            #admin #loginForm span a {color:#FFF; font-size:12px;}
            #admin input:focus {outline:none;}
        </style>

        <link rel=Stylesheet href="admin/css/<?=$row['estilo']?>.css" type="text/css">

    </head>

    <body>
        <?php
        if (isset($_SESSION['userid'])) {
            ?>
            <div id="admin">

                <div id="loginContainer">
                    <a href="#" id="loginButton"><span>Administrador</span><em></em></a>
                    <div style="clear:both"></div>
                    <div id="loginBox">                
                        <div id="loginForm">
                            <fieldset id="body">
                                <a href="admin/index.php?idpag=<?= $row['idpag'] ?>" class="login">Editar Pagina</a>
                                <a href="usuario/logout.php" class="loginR">Cerrar sesion</a>
                                <!--input type="button" value="Restablecer" class="loginR" /-->                            
                            </fieldset>
                            <span>Ud esta como administrador</span>
                        </div>
                    </div>
                </div>

            </div>
            <?php
        }
        ?>

        <div id="main-container">
            <header>
                <div id="logo"><a href="index.php"><img src="imagenes/<?= $row['logo'] ?>"></a></div>
                <div id="menu">
                    <nav>
                        <ul>
                            <li><a href="index.php" class="active">Inicio</a></li>
                            <li><a href="servicios.php">Servicios</a></li>
                            <li><a href="contactos.php">Contactos</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="clear"></div>
            </header>
            <div class="tp-banner-container">
                <?php
                $img = explode("|", $row['imagen1'])
                ?>
                <div class="tp-banner">
                    <ul>
                        <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="500"  data-saveperformance="off"  data-title="Slide">
                            <img src="imagenes/<?=$img[0]?>"  alt="slidebg1" data-bgposition="left top" data-bgfit="cover" data-bgrepeat="no-repeat">
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
                                 style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;"><?=$img[1]?></div>
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
                                 style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;"><?=$img[2]?>
                            </div>


                        </li>
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on"  data-title="Intro Slide">
                            <img src="imagenes/<?=$img[3]?>"  alt="slidebg1" data-bgposition="left top" data-bgfit="cover" data-bgrepeat="no-repeat">
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
                                 style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;"><?=$img[4]?></div>
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
                                 style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;"><?=$img[5]?>
                            </div>
                        </li>
                    </ul>
                    <div class="tp-bannertimer"></div>
                </div>
            </div>
            <!--div id="slider">
                <img src="imagenes/<?= $row['imagen1'] ?>" >
            </div-->
            <div id="container">
                <div class="table bg1">
                    <div>
                        <section>
                            <h3><?= $row['titulobien1'] ?></h3>
                            <p><?= $row['bien1'] ?></p>
                        </section>
                    </div>
                    <div class="bc">
                        <section>
                            <h3><?= $row['titulobien2'] ?></h3>
                            <p><?= $row['bien2'] ?></p>
                        </section>        
                    </div>
                    <div>
                        <section>
                            <h3><?= $row['titulobien3'] ?></h3>
                            <p><?= $row['bien3'] ?></p>
                        </section>
                    </div>
                </div>
                <div class="parallax parallax-1">
                    <h4><?= $row['titulolema'] ?></h4>
                    <h2><?= $row['desclema'] ?></h2>      
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
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="js/mainI.js"></script>

        <script type="text/javascript" src="js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>
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
                            drag_block_vertical: false,
                        });
            });
        </script>
    </body>
</html>