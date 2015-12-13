<!--============================================================================
index.html

Autores: SEBASTIÁN HORCAJO ORTEGA
	 GUILLERMO
	 JAVIER

Versión: 1.0

Fecha: Octubre 2015
 
Página de inicio de la Aplicación

=============================================================================-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset="UTF-8"/>
        <title>Proyecto Inmobiliaria</title>

        <!-- Ficheros JavaScript jQuery -->
        <script type="text/javascript" src="/proyecto-inmobiliaria/js/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="/proyecto-inmobiliaria/js/inmobiliaria.js"></script>
        <script type="text/javascript" src="/proyecto-inmobiliaria/js/navegar.js"></script>

        <!-- Ficheros CCS -->
        <link type="text/css" rel="stylesheet" href="/proyecto-inmobiliaria/css/style.css"/>
    </head>
    
    <body id="id_body">
    	<div id="id_wrapper">
            <!--Formulario de login -->
            <!-- Div para superponer el login por encima de todo y poner el fondo en negro trasparente -->
            <div id="id_modalFondo"></div>
            <div id="id_modalPantalla">
                <div id="id_formularioLogin">
                    <form id="id_formularioEntradaIni">
                        <h2>DNI</h2>
                            <input id="id_usuario" type="text" name="dni" size="9" maxlength="9" placeholder="DNI">
                        <h2>Contraseña</h2>
                            <input id="id_password" type="password" name="clave" size="20" maxlength="20" placeholder="Contraseña">
                        <p>&nbsp;</p>
                        <input type="button" value="Enviar" id="btnLogin_inicio" class="cls_btn" />
                    </form>
                    <p id="id_txt_error">Usuario y Contraseña Incorrectos</p>
                </div>
            </div>
            
            <!-- Contenido Superior-->
            <div id="id_header">
                <!-- Cookies --> 
                <div id="id_cookies">
                    <h1><span>Nuestro&nbsp;sitio&nbsp;web&nbsp;utiliza&nbsp;cookies&nbsp;para&nbsp;proporcionarle&nbsp;un&nbsp;mayor&nbsp;servicio. Si&nbsp;continuas,&nbsp;significa&nbsp;que&nbsp;estás&nbsp;de&nbsp;acuerdo.<img src="img/cerrar.png" title="Cerrar"></span></h1>
                </div>

                <!-- Título y Logo inicial-->
                <div id="id_cabeceraIni">
                    <h1><span>Tu&nbsp;Hogar,&nbsp;Tu&nbsp;Inmobiliaria&nbsp;Mas&nbsp;Cercana</span></h1>
                    <a><p id="id_cerrar_sesion">CERRAR SESIÓN</p></a>
                </div>

                <!-- Menus -->
                <div id="id_menu">
<?php
                    session_start();
                        if(isset($_SESSION['dni'])){
                            if ($_SESSION['cargo'] == "Comercial") {
                                echo "<script type='text/javascript'>
                                            cargarMenus('menus/menu_comerciales.html');
                                      </script>";
                            }else if($_SESSION['cargo'] == "Admin"){
                                echo "<script type='text/javascript'>
                                            cargarMenus('menus/menu_administradores.html');
                                      </script>";        
                            }  
                        }else{     
?>
                    <ul class="cls_nav">
                        <li><a><h1>Comprar</h1></a>
                            <ul>
                                <li id="id_comprar"><a><h3>Casas</h3></a></li>
                            </ul>
                        </li>
                        <li><a><h1>Alquilar</h1></a>
                            <ul>
                                <li id="id_alquilar"><a><h3>Casas</h3></a></li>
                            </ul>
                        </li>
                        <li><a><h1>Vender</h1></a>
                            <ul>
                                <li id="id_vender"><a><h3>Casas</h3></a></li>
                            </ul>
                        </li>
                        <li id="id_inicio"><a><h1>Inicio&nbsp;Sesión</h1></a></li>
                    </ul>
<?php
                        }
                        //session_destroy();
?>
                </div>
            </div>
            
            <!-- Contenido General-->
            <div id="id_content" class="cls_content"> 
                <!-- Contenido de los Menus Clientes-->
                <div id="id_contentMenusClientes">      
                </div>
                
                <!-- Contenido de los Menus Usuarios y Administradores-->
                <div id="id_contentMenusAdmin">
                </div>
                
                <!-- Contenido del footer-->
                <div id="id_contentFooter">
                </div>
                
                <!-- Descripcion de la web -->
                <div id="id_descripcion">
                    <h1><span class="cls_descri">Vende tu vivienda mas rapido y al mejor precio, te ofrecemos los mejores servicios para multiplicar tus posibilidades de venta.</span></h1>
                    <h1><span class="cls_descri">Te ayudamos a contactar con usuarios interesados en tu inmueble y te gestionamos todo el papeleo.</span></h1>
                    <h1><span class="cls_descri">Un poquito de texto para que salga en la principal Un poquito de texto para que salga en la principal</span></h1>
                    <h1><span class="cls_descri">Estos cuatro divs son exclusivos del index les podemos poner una imagen al lado (porfavor Ideas)</span></h1>
                </div>
            </div>
            
            <!-- Div para mantener el pie de pagina al final -->
            <div class="push"></div>
        </div>
        <!-- Contenido Inferior -->
        <div id="id_footer">
            <h1><span>
                <a id="id_copyright">Copyright&nbsp;2015</a>|
                <a id="id_contacto">Contacto</a>|
                <a id="id_somos">Quienes&nbsp;Somos</a>|
                <a id="id_politica">Politica&nbsp;Privacidad</a>|
                <a id="id_condiciones">Condiciones&nbsp;Generales</a>
            </span></h1>
        </div>
    </body>
</html>