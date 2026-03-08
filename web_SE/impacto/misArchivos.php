
<!DOCTYPE html>
<html dir="ltr" lang="es">
<head>
    <?php
        session_start();
        if(!isset($_SESSION["usrActual"])) header("Location: index.php");
    ?>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Facultad de Ingenieria" />

    <!-- Stylesheets
    ============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <link rel="stylesheet" href="../css/dark.css" type="text/css" />
    <link rel="stylesheet" href="../css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="../css/animate.css" type="text/css" />
    <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="../css/colors.css" type="text/css" />

    <link rel="stylesheet" href="../css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--[if lte IE 8]><script src="../js/ie6/warning.js"></script><script>window.onload=function(){e("../js/ie6/")}</script><![endif]-->

    <!-- External JavaScripts
    ============================================= -->
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/plugins.js"></script>

    <!-- Document Title
    ============================================= -->
	<title>Facultad de Ingeniería | Académico</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
        ============================================= -->
        <header id="header" class="sticky-style-2">

            <div class="container clearfix">

                <!-- Logo 225
                ============================================= -->
                <div id="logo" class="divcenter">
                	
                    <a href="http://www.unam.mx" class="standard-logo1" target="_blank"><img class="divcenter2" src="../images/logos/logo_1.png" alt="UNAM" title="UNAM"></a>
                    
                    
                    <a href="http://www.ingenieria.unam.mx" class="standard-logo2"><img class="divcenter3" src="../images/logos/logo_225a.png" alt="Facultad de Ingenieria" title="Facultad de Ingenieria"></a>
                    
                    <a href="http://www.unam.mx" class="standard-logo3" target="_blank"><img  src="../images/logos/logo_1.png" alt="UNAM" title="UNAM"></a>
                    
                    <a href="http://www.ingenieria.unam.mx" class="standard-logo4"><img  src="../images/logos/logo_225c.png" alt="Facultad de Ingenieria" title="Facultad de Ingenieria"></a>
                     
                    <a href="http://www.unam.mx" class="standard-logo5" target="_blank"><img  src="../images/logos/unam_02.png" alt="UNAM" title="UNAM"></a>
                     
                     <a href="http://www.ingenieria.unam.mx" class="standard-logo6"><img  src="../images/logos/logo_225d.png" alt="Facultad de Ingenieria" title="Facultad de Ingenieria"></a>

                </div>
                <!-- #logo 225 end -->

            </div>

            <div id="header-wrap">

                <!-- Menu
                ============================================= -->
                <nav id="primary-menu" class="style-2 center">

                    <div class="container clearfix">

                        <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                        <ul>
                            <li class="current"><a href="index.php"><div>Inicio</div></a></li>
                            <li class="current"><a href="misArchivos.php"><div>Mis archivos</div></a></li>
                            <li class="current"><a href="upload.php"><div>Subir archivos</div></a></li>
                            <li class="current"><a href="todosArchivos.php"><div>Todos los archivos</div></a></li>
                            <li class="current"><a href="logout.php"><div>Cerrar sesión</div></a></li>
                        </ul>

                    </div>

                </nav><!-- #primary-menu end -->

            </div>

        </header><!-- #header end -->

        <!-- Titulo de pagina
        ============================================= -->
        <section id="page-title">

            <div class="container clearfix">
                <h1><?php echo $_SESSION["usrActual"]; ?></h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://www.ingenieria.unam.mx/">Asignatura</a></li>
                    <li class="breadcrumb-item active"><a href="http://odin.fi-b.unam.mx/paeunam/">Energía e impacto ambiental</a></li>
                </ol>
            </div>

        </section><!-- Titulo de pagina end -->

        <!-- Contenido
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

                <div class="container clearfix">

                    <!-- Post
                    ============================================= -->
                    <div class="postcontent nobottommargin clearfix">

                        <div class="single-post nobottommargin">

                            <!--Post sencillo
                            ============================================= -->
                            <div class="entry clearfix">

                                <!-- Titulo
                                ============================================= -->
                                <div class="entry-title">
                                 	<h4>Mis archivos</h4>
                                </div><!-- Fin titulo end -->

                                <!-- Meta
                                ============================================= -->
                                <!-- meta end -->
                                
                                <!-- Contenido post
                                ============================================= -->
                                <div class="entry-content notopmargin">

						<!--Toggle-->
                                <?php
                                    $usrDirPath = $_SESSION["principal"]."/".$_SESSION["usrID"];

                                    if(!file_exists($usrDirPath)) echo "<p style=\"text-align: center\">No hay archivos para mostrar</p>";
                                    else{
                                        $data_state = "data-state=\"open\"";
                                        $first = true;

                                        $usrDirCont = scandir($usrDirPath, SCANDIR_SORT_NONE);

                                        for($i = 0; $i < count($usrDirCont); $i++){
                                            if($usrDirCont[$i] != "." && $usrDirCont[$i] != ".."){
                                                $file_path_info = pathinfo($usrDirCont[$i]);
                                                if($file_path_info["extension"] != "txt"){
                                                    if(file_exists($usrDirPath."/".$file_path_info["filename"].".txt")) $file_info = file_get_contents($usrDirPath."/".$file_path_info["filename"].".txt");
                                    ?>
                                                    <div class="toggle toggle-border" <?php if($first) echo $data_state; ?> >
                                                        <div class="togglet" style="background: #cd171e; color: white; font-weight: bold;"><i class="toggle-closed icon-ok-circle"></i><i class="toggle-open icon-remove-circle"></i><?php echo $usrDirCont[$i]; ?></div>
                                                        <div class="togglec">
                                                            <?php $item = $usrDirPath."/".$usrDirCont[$i]; ?>
                                                            <p><?php echo "<br>".$file_info; ?></p>
                                                            <a href="<?php echo $item; ?>" target="_blank"> Abrir archivo </a>
                                                        </div>
                                                    </div>

                                    <?php 
                                                    $first = false;
                                                }
                                            } 
                                        }
                                    }
                                    ?>
								<!--Toggle end-->
                                                                     
										
                        			<div class="divider"><i class="line"></div>
                                    <!-- Post Contenido End -->

                                    

                                </div>
                            </div><!-- Contenido end -->

                           
                           
                        </div>

                    </div><!-- .post contenido end -->
                    

                    <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar col_last clearfix">
                        <div class="sidebar-widgets-wrap">                          
							<!--Noticias-->
                            <div class="widget clearfix">

                                <h4>Últimos archivos cargados</h4>
                                <div id="popular-post-list-sidebar">

                                    <?php
                                        $lastFilesDirs = scandir($_SESSION["principal"], SCANDIR_SORT_NONE);
                                        $lastFiles = array();
                                        $lastFile = "";
                                        foreach ($lastFilesDirs as $k) {
                                            if($k != '.' && $k != '..') {
                                                $ruta = $_SESSION["principal"]."/".$k;
                                                $archUsr = scandir($ruta, SCANDIR_SORT_NONE);
                                                $lastADate = 0;
                                                foreach ($archUsr as $ar) {
                                                	$fpk = pathinfo($ar);
                                                    if($ar != '.' && $ar != '..' && $fpk['extension'] != "txt") {
                                                        if(($t = filemtime($ruta."/".$ar)) > $lastADate) {
                                                            $lastADate = $t;
                                                            $lastFile = $ruta."/".$ar;
                                                        }
                                                    }
                                                }
                                                if($lastFile != "") $lastFiles[] = $lastFile;
                                            }
                                        }
                                    ?>

                                    <?php

                                        foreach ($lastFiles as $item) {
                                            $info_item = pathinfo($item);
                                    ?>

                                        <div class="spost clearfix">
                                            <div class="entry-c">
                                                <div class="entry-title">
                                                    <h4><a href="<?php echo $item ?>"><?php echo $info_item["basename"];?></a></h4>
                                                </div>
                                                <ul class="entry-meta">
                                                    <li><?php echo file_get_contents($info_item["dirname"]."/".$info_item["filename"].".txt"); ?></li>
                                                </ul>
                                            </div>
                                        </div>

                                    <?php
                                        }
                                    ?>
                                    
                                </div>

                            </div>

                            <!--Noticias end-->

                        </div>

                    </div><!-- .sidebar end -->

                </div>

            </div>

        </section><!-- #contenido end -->

         <!-- Footer
        ============================================= -->
        <footer id="footer" class="dark" >

            <div class="container">

                <!-- Footer Widgets
                ============================================= -->
                <div class="footer-widgets-wrap clearfix">

                    <div class="col_two_third">

                        <div class="widget clearfix">

                           

                           <div class="col_one_third">
                           		 <img src="../images/logofooter.png" alt="" class="footer-logo">  
                                  <div style="padding-left:40px">
                                 	<button type="submit" id="quick-contact-form-submit" name="quick-contact-form-submit" class="btn-contacto" value="submit">Contacto</button>
                                 </div>  
                                 
                                 	
								
                             </div>
                                
                            <div class="col_two_third col_last">
                            		 <address class="nobottommargin">
                                        <abbr title="Headquarters" style="display: inline-block;margin-bottom: 7px;"><strong>Universidad Nacional Autónoma de México</strong></abbr><br>
                                        Facultad de Ingeniería, Av. Universidad 3000, Ciudad Universitaria, Coyoacán, México D. F., CP 04510<br>
                                       </address>
                            
                                    <abbr title="Phone Number"><strong>Teléfono:</strong></abbr> 56 22 08 66<br>
                                    <abbr title="Fax"><strong>Fax:</strong></abbr> 56 16 28 90<br>
                                    <a href="#" class="social-icon si-small si-rounded topmargin-sm si-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
                                        <i class="icon-facebook"></i>
                                        <i class="icon-facebook"></i>
                            		</a>

                            		<a href="#" class="social-icon si-small si-rounded topmargin-sm si-twitter" data-toggle="tooltip" data-placement="top" title="Twitter">
                                        <i class="icon-twitter"></i>
                                        <i class="icon-twitter"></i>
                            		</a>

                          			<a href="#" class="social-icon si-small si-rounded topmargin-sm si-instagram" data-toggle="tooltip" data-placement="top" title="Instagram">
                                        <i class="icon-instagram"></i>
                                        <i class="icon-instagram"></i>
                        			</a>
                            
                            		<a href="#" class="social-icon si-small si-rounded topmargin-sm si-youtube" data-toggle="tooltip" data-placement="top" title="Youtube">
                                        <i class="icon-youtube"></i>
                                        <i class="icon-youtube"></i>
                        			</a>
                                    
                                    
                                    
                                   
                           </div>
                                

                        </div>

                    </div>

                    <div class="col_one_third col_last">
                    	<div class="widget clearfix">
                            <h4>Sitios de Interés</h4>
								<div class="widget_links">
                                    <ul>
                                        <li><a href="http://www.anfei.mx" target="_blank">ANFEI</a></li>
                                        <li><a href="http://cacei.org.mx" target="_blank">CACEI</a></li>
                                        <li><a href="http://www.alianzafiidem.org" target="_blank">Alianza FIDEM</a></li>
                                        <li><a href="http://ingenet.com.mx" target="_blank">INGENET</a></li>
                                    </ul>
                                </div>
                        </div>
                        

                        

                        

                    </div>

                </div><!-- .footer-widgets-wrap end -->

            </div>

            <!-- Copyrights
            ============================================= -->
            <div id="copyrights2">

                <div class="container clearfix">

                   
                        <div class="copyrights2">
                        	 Copyrights &copy; 2016 /
                            <a href="http://www.ingenieria.unam.mx">Facultad de Ingeniería</a>/<a href="http://www.unam.mx">UNAM</a>/
                        </div>
                       
                   

                    

                </div>

            </div><!-- #copyrights end -->

        </footer><!-- #footer end -->

    </div><!-- #wrapper end '../images/footer-bg.jpg'-->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript" src="../js/functions.js"></script>

</body>
</html>