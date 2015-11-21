/*==============================================================================
0.- Pintar Inicio
1.- Cerrar Cookies
2.- Pintar Logim
3.- Cerrar Logim
4.- Slider
5.- Pintar Opciones Menu Comprar
6.- Pintar Opciones Menu Alquiler
7.- Pintar Opciones Menu Venta
8.- Pintar Opciones Footer

================================================================================
********************************************************************************/

$(document).ready(function() {
    $.ajaxSetup({ cache: false });
    
/*******************************************************************************
0.- Pintar Inicio
********************************************************************************/
$(document).on('click',"#id_cabeceraIni",function(event){
    //$("#id_footer").css({"margin-top":"-66px"});
    $("##id_contentMenusClientes").css({"display":"none"});
    $("##id_contentMenusAdmin").css({"display":"none"});
    $("#id_contentFooter").css({"display":"none"});
    $("#id_descripcion").css({"display":"block"});
    
    event.stopImmediatePropagation();
});

/*******************************************************************************
1.- Cerrar Cookies
********************************************************************************/
$(document).on('click',"#id_cookies img",function(event){
    $("#id_cookies").css({"display":"none"});

    event.stopImmediatePropagation();
});

/*******************************************************************************
2.- Pintar Logim
********************************************************************************/
$(document).on('click',"#id_inicio",function(event){
    $("#id_modalFondo").css({"display":"block"});
    $("#id_modalPantalla").css({"display":"block"});

    var v_pantallaLogin = 
        '<div id="id_formularioLogin">\n\
            <form id="id_formularioEntradaIni">\n\
                <h2>Usuario</h2>\n\
                    <input id="id_usuario" type="text" name="loginNombre" size="9" maxlength="9" placeholder="Usuario">\n\
                <h2>Contraseña</h2>\n\
                    <input id="id_password" type="password" name="loginPassword" size="20" maxlength="20" placeholder="Contraseña">\n\
                <div id="btnLogin_inicio" class="cls_btn">Aceptar</div>\n\
            </form>\n\
            <p id="id_txt_error">Usuario y Contraseña Incorrectos</p>\n\
        </div>';
    
    $("#id_modalPantalla").html(v_pantallaLogin);
    
    event.stopImmediatePropagation();
});

/*******************************************************************************
3.- Cerrar Logim
********************************************************************************/
$(document).on('mouseleave',"#id_formularioLogin",function(event){
    $("#id_modalFondo").css({"display":"none"});
    $("#id_modalPantalla").css({"display":"none"});

    event.stopImmediatePropagation();
});

/*******************************************************************************
4.- Slider
********************************************************************************/

    $(function(){
        $('#slider a:gt(0)').hide();
        var interval = setInterval(changeDiv, 6000);
        
        function changeDiv(){
            $('#slider a:first-child').fadeOut(1000).next('a').fadeIn(1000).end().appendTo('#slider');
        };
        
        $(document).on('click',".mas",function(event){
            changeDiv();
            clearInterval(interval);
            interval = setInterval(changeDiv, 6000);
        });
        $(document).on('click',".menos",function(event){
            $('#slider a:first-child').fadeOut(1000);
            $('#slider a:last-child').fadeIn(1000).prependTo('#slider');
            
        clearInterval(interval);
        interval = setInterval(changeDiv, 6000);
    });
});

/*******************************************************************************
5.- Pintar Opciones Menu Comprar
********************************************************************************/
$(document).on('click',"#id_comprar",function(event){
    //$("#id_footer").css({"margin-top":"0px"});
    $("#id_contentMenus").css({"display":"block"});
    $("#id_descripcion").css({"display":"none"});
    $("#id_contentFooter").css({"display":"none"});
    
var v_pantallaComprar = 
    '<h1>COMPRAS</h1>\n\
    <div id="slider-wrapper">\n\
        <div id="slider">\n\
            <a href="URL_ENLACE1"><img src="img/img1.jpg"/><p>TEXTO1</p></a>\n\
            <a href="URL_ENLACE2"><img src="img/img2.jpg"/><p>TEXTO2</p></a>\n\
            <a href="URL_ENLACE3"><img src="img/img3.jpg"/><p>TEXTO3</p></a>\n\
            <a href="URL_ENLACE3"><img src="img/img4.jpg"/><p>TEXTO3</p></a>\n\
        </div>\n\
        <a href="javascript:void();" class="mas">&rsaquo;</a>\n\
        <a href="javascript:void();" class="menos">&lsaquo;</a>\n\
    </div>';
    
    $("#id_contentMenus").html(v_pantallaComprar);
    
    event.stopImmediatePropagation();
});

/*******************************************************************************
6.- Pintar Opciones Menu Alquiler
********************************************************************************/
$(document).on('click',"#id_alquilar",function(event){
    //$("#id_footer").css({"margin-top":"0px"});
    $("#id_contentMenus").css({"display":"block"});
    $("#id_descripcion").css({"display":"none"});
    $("#id_contentFooter").css({"display":"none"});

    var v_pantallaAlquilar = 
        '<h1>ALQUILERES</h1>\n\
        <div class="cls_ventanas" id="id_inmuebleAlquiler1">\n\
            <div class="cls_slider">\n\
                <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
            </div>\n\
            <p>Aqui iran todas la especificaciones del inmueble</p>\n\
        </div>\n\
        <div class="cls_ventanas" id="id_inmuebleAlquiler2">\n\
            <div class="cls_slider">\n\
                <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
            </div>\n\
            <p>Aqui iran todas la especificaciones del inmueble</p>\n\
        </div>\n\
        <div class="cls_ventanas" id="id_inmuebleAlquiler3">\n\
            <div class="cls_slider">\n\
                <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
            </div>\n\
            <p>Aqui iran todas la especificaciones del inmueble</p>\n\
        </div>\n\
        <div class="cls_ventanas" id="id_inmuebleAlquiler4">\n\
            <div class="cls_slider">\n\
                <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
            </div>\n\
            <p>Aqui iran todas la especificaciones del inmueble</p>\n\
        </div>\n\
        <div class="cls_ventanas" id="id_inmuebleAlquiler5">\n\
            <div class="cls_slider">\n\
                <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
            </div>\n\
            <p>Aqui iran todas la especificaciones del inmueble</p>\n\
        </div>\n\
        <div class="cls_ventanas" id="id_inmuebleAlquiler6">\n\
            <div class="cls_slider">\n\
                <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
            </div>\n\
            <p>Aqui iran todas la especificaciones del inmueble</p>\n\
        </div>';
    
    $("#id_contentMenus").html(v_pantallaAlquilar);
    
    event.stopImmediatePropagation();
});

/*******************************************************************************
7.- Pintar Opciones Menu Venta
********************************************************************************/
$(document).on('click',"#id_vender",function(event){
    //$("#id_footer").css({"margin-top":"-66px"});
    $("#id_contentMenus").css({"display":"block"});
    $("#id_descripcion").css({"display":"none"});
    $("#id_contentFooter").css({"display":"none"});

    var v_pantallaVender = 
        '<div class="cls_vender">\n\
            <h1>VENTAS</h1>\n\
        </div>';
    
    $("#id_contentMenus").html(v_pantallaVender);
    
    event.stopImmediatePropagation();
});

/*******************************************************************************
8.- Pintar Opciones Footer
********************************************************************************/
$(document).on('click',"#id_copyright",function(event){
    //$("#id_footer").css({"margin-top":"-66px"});
    $("#id_contentFooter").css({"display":"block"});
    $("#id_contentMenus").css({"display":"none"});
    $("#id_descripcion").css({"display":"none"});

    var v_pantallaCopyright = 
        '<div class="cls_footer">\n\
            <p>COPYRIGHT</p>\n\
            <p>Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer.</p>\n\
        </div>';
    
    $("#id_contentFooter").html(v_pantallaCopyright);
    
    event.stopImmediatePropagation();
});

$(document).on('click',"#id_contacto",function(event){
    //$("#id_footer").css({"margin-top":"-66px"});
    $("#id_contentFooter").css({"display":"block"});
    $("#id_contentMenus").css({"display":"none"});
    $("#id_descripcion").css({"display":"none"});

    var v_pantallaContacto = 
        '<div class="cls_footer">\n\
            <p>CONTACTO</p>\n\
            <p>Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer.</p>\n\
        </div>';
    
    $("#id_contentFooter").html(v_pantallaContacto);
    
    event.stopImmediatePropagation();
});

$(document).on('click',"#id_somos",function(event){
    //$("#id_footer").css({"margin-top":"-66px"});
    $("#id_contentFooter").css({"display":"block"});
    $("#id_contentMenus").css({"display":"none"});
    $("#id_descripcion").css({"display":"none"});

    var v_pantallaSomos = 
        '<div class="cls_footer">\n\
            <p>QUIENES SOMOS</p>\n\
            <p>Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer.</p>\n\
        </div>';
    
    $("#id_contentFooter").html(v_pantallaSomos);
    
    event.stopImmediatePropagation();
});

$(document).on('click',"#id_politica",function(event){
    //$("#id_footer").css({"margin-top":"-66px"});
    $("#id_contentFooter").css({"display":"block"});
    $("#id_contentMenus").css({"display":"none"});
    $("#id_descripcion").css({"display":"none"});

    var v_pantallaPolitica = 
        '<div class="cls_footer">\n\
            <p>POLITICA</p>\n\
            <p>Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer.</p>\n\
        </div>';
    
    $("#id_contentFooter").html(v_pantallaPolitica);
    
    event.stopImmediatePropagation();
});

$(document).on('click',"#id_condiciones",function(event){
    //$("#id_footer").css({"margin-top":"-66px"});
    $("#id_contentFooter").css({"display":"block"});
    $("#id_contentMenus").css({"display":"none"});
    $("#id_descripcion").css({"display":"none"});

    var v_pantallaCondiciones = 
        '<div class="cls_footer">\n\
            <p>CONDICIONES GENERALES</p>\n\
            <p>Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer.</p>\n\
        </div>';
    
    $("#id_contentFooter").html(v_pantallaCondiciones);
    
    event.stopImmediatePropagation();
});
});  