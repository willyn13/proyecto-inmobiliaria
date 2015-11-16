/*
================================================================================
Maestros.js

Autor: JOSE CARLOS ELVIRA GOMEZ
Versión: 1.0
Fecha: Agosto 2015
 
Javascript General Administración
================================================================================
0.- Pintar Inicio
1.- Cerrar Cookies
2.- Pintar Logim
3.- Cerrar Logim
4.- Slider
5.- Pintar Opciones Menu Comprar
6.- Pintar Opciones Menu Alquiler
7.- Pintar Opciones Menu Venta
================================================================================
********************************************************************************/

$(document).ready(function() {
    $.ajaxSetup({ cache: false });
    
/*******************************************************************************
0.- Pintar Inicio
********************************************************************************/
$(document).on('click',"#id_cabeceraIni",function(event){
    $("#id_contentMenus").css({"display":"none"});
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
$(document).on('click',"#id_wrapper",function(event){
    $("#id_modalFondo").css({"display":"none"});
    $("#id_modalPantalla").css({"display":"none"});
    
    event.stopImmediatePropagation();
});

/*******************************************************************************
4.- Slider
********************************************************************************/
$(function(){
    $(".cls_slider div:gt(0)").hide();
    setInterval(function(){
      $(".cls_slider div:first-child").fadeOut(0)
         .next('div').fadeIn(1000)
         .end().appendTo('#id_slider');}, 4000);
});

/*******************************************************************************
5.- Pintar Opciones Menu Comprar
********************************************************************************/
$(document).on('click',"#id_comprar",function(event){
    $("#id_contentMenus").css({"display":"block"});
    $("#id_descripcion").css({"display":"none"});
    
var v_pantallaComprar = 
    '<h1>COMPRAS</h1>\n\
    <div class="cls_ventanas">\n\
        <div class="cls_slider">\n\
            <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
            <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
            <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
            <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
        </div>\n\
        <p>Aqui iran todas la especificaciones del inmueble</p>\n\
    </div>\n\
    <div class="cls_ventanas">\n\
        <div class="cls_slider">\n\
            <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
            <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
            <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
            <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
        </div>\n\
        <p>Aqui iran todas la especificaciones del inmueble</p>\n\
    </div>\n\
    <div class="cls_ventanas">\n\
        <div class="cls_slider">\n\
            <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
            <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
            <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
            <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
        </div>\n\
        <p>Aqui iran todas la especificaciones del inmueble</p>\n\
    </div>\n\
    <div class="cls_ventanas">\n\
        <div class="cls_slider">\n\
            <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
            <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
            <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
            <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
        </div>\n\
        <p>Aqui iran todas la especificaciones del inmueble</p>\n\
    </div>\n\
    <div class="cls_ventanas">\n\
        <div class="cls_slider">\n\
            <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
            <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
            <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
            <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
        </div>\n\
        <p>Aqui iran todas la especificaciones del inmueble</p>\n\
    </div>\n\
    <div class="cls_ventanas">\n\
        <div class="cls_slider">\n\
            <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
            <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
            <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
            <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
        </div>\n\
        <p>Aqui iran todas la especificaciones del inmueble</p>\n\
    </div>';
    
    $("#id_contentMenus").html(v_pantallaComprar);
    
    event.stopImmediatePropagation();
});

/*******************************************************************************
6.- Pintar Opciones Menu Alquiler
********************************************************************************/
$(document).on('click',"#id_alquilar",function(event){
    $("#id_contentMenus").css({"display":"block"});
    $("#id_descripcion").css({"display":"none"});

    var v_pantallaAlquilar = 
        '<h1>ALQUILERES</h1>\n\
        <div class="cls_ventanas">\n\
            <div class="cls_slider">\n\
                <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
            </div>\n\
            <p>Aqui iran todas la especificaciones del inmueble</p>\n\
        </div>\n\
        <div class="cls_ventanas">\n\
            <div class="cls_slider">\n\
                <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
            </div>\n\
            <p>Aqui iran todas la especificaciones del inmueble</p>\n\
        </div>\n\
        <div class="cls_ventanas">\n\
            <div class="cls_slider">\n\
                <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
            </div>\n\
            <p>Aqui iran todas la especificaciones del inmueble</p>\n\
        </div>\n\
        <div class="cls_ventanas">\n\
            <div class="cls_slider">\n\
                <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
            </div>\n\
            <p>Aqui iran todas la especificaciones del inmueble</p>\n\
        </div>\n\
        <div class="cls_ventanas">\n\
            <div class="cls_slider">\n\
                <div class="cls_imgPrincipal"><img src="img/img1.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img2.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img3.jpg"></div>\n\
                <div class="cls_imgSecundaria"><img src="img/img4.jpg"></div>\n\
            </div>\n\
            <p>Aqui iran todas la especificaciones del inmueble</p>\n\
        </div>\n\
        <div class="cls_ventanas">\n\
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
    $("#id_contentMenus").css({"display":"block"});
    $("#id_descripcion").css({"display":"none"});

    var v_pantallaVender = 
        '<div class="cls_vender">\n\
            <h1>VENTAS</h1>\n\
        </div>';
    
    $("#id_contentMenus").html(v_pantallaVender);
    
    event.stopImmediatePropagation();
});


});  