/*==============================================================================
administracion.js

Autores: SEBASTIÁN HORCAJO ORTEGA
	 GUILLERMO
	 JAVIER

Versión: 1.0

Fecha: Octubre 2015
 
javascript y jquery de la Aplicación

================================================================================
==============================================================================

01.- Pintar Inicio
02.- Cerrar Cookies
03.- Logim
    03.1.- Pintar Login
    03.2.- Cerrar Login
    03.3.- Validar Login
    03.4.- Cerrar Sesion
04.- Pintar Slider
05.- Activar Slider
06.- Activar Menu Comprar
07.- Activar Menu Alquiler
08.- Pintar Ventanas Compra-Alquiler
09.- Formulario Menu Venta
10.- Pintar Opciones Footer

================================================================================
********************************************************************************/
$(document).ready(function() {
    $.ajaxSetup({ cache: false });
    //$(this).load('login/cerrarSesion.php');
    
/*******************************************************************************
01.- Pintar Inicio
********************************************************************************/
$(document).on('click',"#id_nombre",function(event){
    $("#id_contentMenusClientes").css({"display":"none"});
    $("#id_contentMenusAdmin").css({"display":"none"});
    $("#id_contentFooter").css({"display":"none"});
    $("#id_descripcion").css({"display":"block"});
    
    event.stopImmediatePropagation();
});

/*******************************************************************************
02.- Cerrar Cookies
********************************************************************************/
$(document).on('click',"#id_cookies img",function(event){
    $("#id_cookies").css({"display":"none"});

    event.stopImmediatePropagation();
});

/*******************************************************************************
03.- Logim
********************************************************************************/
    /*******************************************************************************
    03.1.- Pintar Login
    ********************************************************************************/
    $(document).on("click","#id_inicio",function(event){
        $("#id_modalFondo").css({"display":"block"});
        $("#id_modalPantalla").css({"display":"block"});

        event.stopImmediatePropagation();
    });

    /*******************************************************************************
    03.2.- Cerrar Login
    ********************************************************************************/
    $(document).on('mouseleave',"#id_formularioLogin",function(event){
        $("#id_modalFondo").css({"display":"none"});
        $("#id_modalPantalla").css({"display":"none"});

        event.stopImmediatePropagation();
    });

    /*******************************************************************************
    03.3.- Validar Login
    ********************************************************************************/
    $(function(){
        $("#btnLogin_inicio").on('click', function(){
            var url = "login/login.php";
            $.ajax({ 
                type: 'POST',
                url: url,
                data: $("#id_formularioEntradaIni").serialize(),
                success: function(data){
                    $("#id_menu").html(data); 
                }
            });
            $("#id_modalFondo").css({"display":"none"});
            $("#id_modalPantalla").css({"display":"none"});
        });
    });

    /*******************************************************************************
    03.4.- Cerrar Sesion
    ********************************************************************************/
    $(document).on("click","#btnLogin_inicio",function(event){
        $("#id_cerrar").css({"display":"block"});
        event.stopImmediatePropagation();
    });
    
    $(document).on("click","#id_cerrar",function(event){
        $("#id_cerrar").css({"display":"none"});
        $(this).load('login/cerrarSesion.php');
        event.stopImmediatePropagation();
    }); 
    
/*******************************************************************************
04.- Pintar Slider
********************************************************************************/
$(document).on('click',"#id_informacion",function(event){
    $("#id_contentMenusClientes").css({"display":"block"});
    $("#id_contentMenusAdmin").css({"display":"none"});
    $("#id_descripcion").css({"display":"none"});
    $("#id_contentFooter").css({"display":"none"});
    
    var v_slider = 
        '<div id="id_slider_wrapper">\n\
            <div id="id_slider">\n\
                <a href="#"><img src="img/img1.jpg"/></a>\n\
                <a href="#"><img src="img/img2.jpg"/></a>\n\
                <a href="#"><img src="img/img3.jpg"/></a>\n\
                <a href="#"><img src="img/img4.jpg"/></a>\n\
            </div>\n\
            <p>AQUI IRAN TODAS LA ESPECIFICACIONES DEL INMUEBLE</p>\n\
            <input type="button" value="Contratar" id="id_contratar"/>\n\
            <a href="javascript:void();" class="mas">></a>\n\
            <a href="javascript:void();" class="menos"><</a>\n\
        </div>';
    
    $("#id_contentMenusClientes").html(v_slider);
    
    event.stopImmediatePropagation();
});

/*******************************************************************************
05.- Activar Slider
********************************************************************************/    
$(function(){
    $(document).on('click',".mas",function(event){
        $('#id_slider a:first-child');
        $('#id_slider a:last-child').prependTo('#id_slider');
    });
    
    $(document).on('click',".menos",function(event){
        $('#id_slider a:first-child');
        $('#id_slider a:last-child').prependTo('#id_slider');
    });
});

/*******************************************************************************
06.- Activar Menu Comprar
********************************************************************************/
$(document).on('click',"#id_comprar",function(event){
    $("#id_contentMenusClientes").css({"display":"block"});
    $("#id_contentMenusAdmin").css({"display":"none"});
    $("#id_descripcion").css({"display":"none"});
    $("#id_contentFooter").css({"display":"none"});
    
    var v_pantallaComprar = pintaVentanasCompras();    
    
    $("#id_contentMenusClientes").html(v_pantallaComprar);
    
    event.stopImmediatePropagation();
});

/*******************************************************************************
07.- Activar Menu Alquiler
********************************************************************************/
$(document).on('click',"#id_alquilar",function(event){
    //$("#id_footer").css({"margin-top":"0px"});
    $("#id_contentMenusClientes").css({"display":"block"});
    $("#id_contentMenusAdmin").css({"display":"none"});
    $("#id_descripcion").css({"display":"none"});
    $("#id_contentFooter").css({"display":"none"});

    var v_pantallaAlquilar = pintaVentanasAlquiler();
    
    $("#id_contentMenusClientes").html(v_pantallaAlquilar);
    
    event.stopImmediatePropagation();
});

/*******************************************************************************
08- Pintar Ventanas Compras / Alquiler
********************************************************************************/
function pintaVentanasCompras(){
    var v_ventana = "<h1>COMPRAS</h1>";
    
    for(var i=0; i<4; i++){
        v_ventana = v_ventana + 
        '<div class="cls_ventanas" id="id_inmuebleAlquiler1">\n\
            <div class="cls_slider">\n\
                <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
            </div>\n\
            <p>Aqui iran todas la especificaciones del inmueble  &nbsp;<a id="id_informacion">+info</a></p>\n\
        </div>';
    }
    return v_ventana;
}

function pintaVentanasAlquiler(){
    var v_ventana = "<h1>ALQUILERES</h1>";
    
    for(var i=0; i<7; i++){
        v_ventana = v_ventana + 
        '<div class="cls_ventanas" id="id_inmuebleAlquiler1">\n\
            <div class="cls_slider">\n\
                <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
            </div>\n\
            <p>Aqui iran todas la especificaciones del inmueble  &nbsp;<a href="#" id="id_informacion">+info</a></p>\n\
        </div>';
    }
    return v_ventana;
}

/*******************************************************************************
09.- Formulario Menu Venta
********************************************************************************/
$(document).on('click',"#id_vender",function(event){
    $("#id_contentMenusClientes").css({"display":"block"});
    $("#id_contentMenusAdmin").css({"display":"none"});
    $("#id_descripcion").css({"display":"none"});
    $("#id_contentFooter").css({"display":"none"});

    var v_pantallaVender = 
        '<div class="cls_vender">\n\
        </div>';
    
    $("#id_contentMenusClientes").html(v_pantallaVender);
    
    event.stopImmediatePropagation();
});

$(document).on('click',"#id_contratar",function(event){
    $("#id_contentMenusClientes").css({"display":"block"});
    $("#id_contentMenusAdmin").css({"display":"none"});
    $("#id_descripcion").css({"display":"none"});
    $("#id_contentFooter").css({"display":"none"});

    var v_pantallaVender = 
        '<div class="cls_vender">\n\
            <h1>CONTRATADO</h1>\n\
            </br><h2>En breve recibira noticias nuestras, gracias por confiar en TU HOGAR</h2>\n\
        </div>';
    
    $("#id_contentMenusClientes").html(v_pantallaVender);
    
    event.stopImmediatePropagation();
});

/*******************************************************************************
10.- Pintar Opciones Footer
********************************************************************************/

$(document).on('click',"#id_contacto",function(event){
    $("#id_contentFooter").css({"display":"block"});
    $("#id_contentMenusClientes").css({"display":"none"});
    $("#id_contentMenusAdmin").css({"display":"none"});
    $("#id_descripcion").css({"display":"none"});

    var v_pantallaContacto = 
        '<div class="cls_footer">\n\
            <h1>CONTACTO</h1></br>\n\
            <p>C/Uruguay N-118 Poligono (Puerto Seco)</p>\n\
            <p>Coslada (Madrid)</p>\n\
            <p>CP: 28843</p>\n\
            <p>Tlf: 91 669 38 65</p>\n\
            <p>Fax: 91 759 38 65</p>\n\
                </br><p>Lunes a viernes de 9:00 a 21:00</p>\n\
                </br><p>Si tu llamada tiene que ver con un anuncio que has puesto llámanos desde el teléfono de contacto que indicaste en él formulario.</p>\n\
                </br><p>De esta forma podremos acceder a los datos de tu anuncio y ayudarte lo más rápido posible.</p>\n\
                </br><p>Sentimos mucho que la atención telefónica no pueda ser gratuita, pero el servicio personal tiene un coste que no podemos asumir.</p>\n\
                </br><p>También puedes enviarnos un mensaje por aquí <a href="mailto:tuhogar@inmobiliaria.com?subject=Asunto&body=Mensaje">tuhogar@inmobiliaria.com</a></p>\n\
        </div>';
    
    $("#id_contentFooter").html(v_pantallaContacto);
    
    event.stopImmediatePropagation();
});

$(document).on('click',"#id_somos",function(event){
    $("#id_contentFooter").css({"display":"block"});
    $("#id_contentMenusClientes").css({"display":"none"});
    $("#id_contentMenusAdmin").css({"display":"none"});
    $("#id_descripcion").css({"display":"none"});

    var v_pantallaSomos = 
        '<div class="cls_footer">\n\
            <h1>QUIENES SOMOS</h1></br>\n\
                <p>Nuestra empresa está formada por un equipo profesional Joven y Dinámico con un objetivo común: \n\
                Satisfacer las demandas de nuestros Clientes.<p></br>\n\
                <p>La sociedad tiene por objeto: la Promocion, Compra, Venta y Construcción de toda clase de Bienes Inmuebles Urbanos y Rústicos.<p>\n\
                </br><p>Una agencia joven con profesionales expertos y dinámicos.<p></br>\n\
                <p>Disponemos de una amplia oferta inmobiliaria de Viviendas Nuevas y 2ª Mano, Alquileres y Traspasos por (Madrid, Valencia y Barcelona), \n\
                todo ello con las mejores garantias económicas del mercado hasta el 100% de su Credito ó Hipoteca para que usted pueda adquirirlos.</p>\n\
        </div>';
    
    $("#id_contentFooter").html(v_pantallaSomos);
    
    event.stopImmediatePropagation();
});

$(document).on('click',"#id_politica",function(event){
    $("#id_contentFooter").css({"display":"block"});
    $("#id_contentMenusClientes").css({"display":"none"});
    $("#id_contentMenusAdmin").css({"display":"none"});
    $("#id_descripcion").css({"display":"none"});

    var v_pantallaPolitica = 
        '<div class="cls_footer">\n\
            <h1>POLITICA PRIVACIDAD</h1></br>\n\
                <p>Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer.</p>\n\
        </div>';
    
    $("#id_contentFooter").html(v_pantallaPolitica);
    
    event.stopImmediatePropagation();
});

$(document).on('click',"#id_condiciones",function(event){
    $("#id_contentFooter").css({"display":"block"});
    $("#id_contentMenusClientes").css({"display":"none"});
    $("#id_contentMenusAdmin").css({"display":"none"});
    $("#id_descripcion").css({"display":"none"});

    var v_pantallaCondiciones = 
        '<div class="cls_footer">\n\
            <h1>CONDICIONES GENERALES</h1></br>\n\
            <h3>CONTRATO ENTRE EL USUARIO Y LA WEB</h3>\n\
                <p>Este sitio Web le es ofrecido a condición de que usted acepte íntegramente los términos,\n\
                condiciones y comunicaciones contenidos en las presentes Condiciones de Uso. \n\
                El hecho de que usted utilice este sitio Web constituye por sí solo su aceptación de los mencionados términos, \n\
                condiciones y comunicaciones. En el supuesto de que cualquiera de los términos, condiciones y/o notificaciones \n\
                contenidas en las presentes Condiciones de Uso sea incompatible con las Condiciones de Uso contenidas, \n\
                estas últimas prevalecerán.</p></br>\n\
            <h3>LIMITACIÓN AL USO PERSONAL Y NO COMERCIAL</h3>\n\
                <p>Este sitio Web es para su uso personal y no comercial. Usted no está autorizado a modificar, copiar, distribuir, transmitir, \n\
                divulgar, utilizar, reproducir, publicar, licenciar, ceder, vender ni crear trabajos derivados a partir de la información, \n\
                el software, los productos o los servicios que pueda obtener de este sitio Web.</p></br>\n\
            <h3>CONEXIONES CON SITIOS DE TERCEROS</h3>\n\
                <p>Este sitio Web pueden contener conexiones con sitios Web operados por terceros ajenos al tu Hogar. Estas conexiones le son \n\
                facilitadas exclusivamente para su comodidad. La web no controla estos sitios y no es responsable de sus contenidos. \n\
                La inclusión de dichas conexiones con sitios Web de terceros no implica necesariamente la aprobación del contenido \n\
                de los mismos por parte nuestra ni la existencia de ningún tipo de asociación ni las personas que los operan.</p></br>\n\
            <h3>RENUNCIA A POSIBLE RESPONSABILIDAD</h3>\n\
                <p>El contenido ofrecido por este medio se hace únicamente a título informativo; usted no debe tener en cuenta la información \n\
                obtenida de este sitio Web para la adopción de decisiones, sean éstas personales, médicas, legales, financieras o de cualquier \n\
                otro orden; debe usted consultar a un profesional apropiado que pueda aconsejarle de acuerdo con sus necesidades. \n\
                La información, el software y/o los productos o servicios contenidos en este sitio Web pueden contener errores tipográficos, \n\
                imprecisiones e inexactitudes de los que el Grupo Ibercaja no se responsabiliza.\n\
                Periódicamente se añaden cambios a la información contenida en este sitio Web. El Grupo Ibercaja se reserva el derecho de \n\
                suspender su difusión total o parcialmente y de modificar la estructura y contenido de este sitio sin previo aviso.</p></br>\n\
            <h3>INFORMACIÓN</h3>\n\
                <p>Para la resolución de problemas o preguntas relacionadas con este sitio Web, por favor póngase en contacto con la inmobiliaria \n\
                por medio de nuestro Buzón.</p></br>\n\
            <h3>RESTRICCIONES DE ACCESO</h3>\n\
                <p>El Grupo Ibercaja se reserva el derecho a denegar discrecionalmente, en cualquier momento y sin necesidad de preaviso, \n\
                el acceso de cualquier usuario a este sitio Web o a alguna parte del mismo.</p></br>\n\
            <h3>MODIFICACIÓN DE LOS PRESENTES TÉRMINOS Y CONDICIONES</h3>\n\
                <p>Tu Hogar se reserva el derecho a modificar los términos, condiciones y comunicaciones en base a los cuales se ofrece este sitio Web.</p>\n\
        </div>';
    
    $("#id_contentFooter").html(v_pantallaCondiciones);
    
    event.stopImmediatePropagation();
});

});

//Recoger localidades segun la provincia seleccionada
$(function(){
    $("#localidades").css({"display":"none"});
    $("#provincia").on("change",function(){
           var provincia = $("#provincia").val();
           var url = "peticiones/recogerLocalidades.php";
           $.ajax({
               type: 'POST',
               url:url,
               data: 'id='+provincia,
               success: function (data) {
                   $("#localidades").css({"display":"block"});
                   $("#localidad").html(data);    
            }
           });
    });
});
//Poner precio_venta si la venta esta marcada como SI
$(function(){
    $("#precio_venta").css({"display":"none"});
    $("#venta").on("change",function(){
           var seleccion = $("#venta").val();
           var url = "peticiones/pintarPrecioVenta.php";
           $.ajax({
               type: 'POST',
               url:url,
               data: 'seleccion='+seleccion,
               success: function (data) {
                   if(seleccion == "S"){
                       $("#precio_venta").css({"display":"block"});
                       $("#precio_venta").html(data);
                   }else{
                       $("#precio_venta").css({"display":"none"});
                   }   
            }
           });
    });
});
//Poner precio_alquiler si el alquiler esta marcado como SI
$(function(){
    $("#precio_alquiler").css({"display":"none"});
    $("#alquiler").on("change",function(){
           var seleccion = $("#alquiler").val();
           var url = "peticiones/pintarPrecioAlquiler.php";
           $.ajax({
               type: 'POST',
               url:url,
               data: 'seleccion='+seleccion,
               success: function (data) {
                   if(seleccion == "S"){
                       $("#precio_alquiler").css({"display":"block"});
                       $("#precio_alquiler").html(data);
                   }else{
                       $("#precio_alquiler").css({"display":"none"});
                   }   
            }
           });
    });
});


