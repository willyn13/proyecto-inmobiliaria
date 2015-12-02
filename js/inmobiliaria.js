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
03.- Login
    03.1.- Pintar Login
    03.2.- Cerrar Login
    03.3.- Validar Logim
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
    
/*******************************************************************************
01.- Pintar Inicio
********************************************************************************/
$(document).on('click',"#id_cabeceraIni",function(event){
    //$("#id_footer").css({"margin-top":"-66px"});
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
    03.1.- Pintar Logim
    ********************************************************************************/
    $(document).on("click","#id_inicio",function(event){
        $("#id_modalFondo").css({"display":"block"});
        $("#id_modalPantalla").css({"display":"block"});

        event.stopImmediatePropagation();
    });

    /*******************************************************************************
    03.2.- Cerrar Logim
    ********************************************************************************/
    $(document).on('mouseleave',"#id_formularioLogin",function(event){
        $("#id_modalFondo").css({"display":"none"});
        $("#id_modalPantalla").css({"display":"none"});

        event.stopImmediatePropagation();
    });

    /*******************************************************************************
    03.3.- Validar Logim
    ********************************************************************************/
    var objetorespuesta = false;

    if (window.XMLHttpRequest){
        objetorespuesta = new XMLHttpRequest();
    } else if (window.ActiveXObject){
        objetorespuesta = new ActiveXObject("Microsoft.XMLHTTP");
    }

    function validarLogin(fuenteDatos){
        if(objetorespuesta){
            objetorespuesta.open("POST", fuenteDatos, true);
            objetorespuesta.onreadystatechange=tratarRespuesta;
            objetorespuesta.send(null);
        }
    }

    function tratarRespuesta(){
        console.log("readystatechange;"+objetorespuesta.readyState);
        if(objetorespuesta.readyState==4 && objetorespuesta.status==200){
            document.getElementById("id_menu").innerHTML = objetorespuesta.responseText;
        }
    }
   
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
            <p>Aqui iran todas la especificaciones del inmuebleespecificaciones del inmuebleespecificaciones del inmuebleespecificaciones del inmuebleespecificaciones del inmuebleespecificaciones del inmuebleespecificaciones del inmuebleespecificaciones del inmuebleespecificaciones del inmuebleespecificaciones del inmuebleespecificaciones del inmuebleespecificaciones del inmuebleespecificaciones del inmuebleespecificaciones del inmuebleespecificaciones del inmueble</p>\n\
            <input type="button" value="Contratar"/>\n\
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
    $('#id_slider a:gt(0)').hide();
    var interval = setInterval(changeDiv, 6000);

    function changeDiv(){
        $('#id_slider a:first-child').fadeOut(1000).next('a').fadeIn(1000).end().appendTo('#id_slider');
    };

    $(document).on('click',".mas",function(event){
        changeDiv();
        clearInterval(interval);
        interval = setInterval(changeDiv, 6000);
    });
    $(document).on('click',".menos",function(event){
        $('#id_slider a:first-child').fadeOut(1000);
        $('#id_slider a:last-child').fadeIn(1000).prependTo('#id_slider');

        clearInterval(interval);
        interval = setInterval(changeDiv, 6000);
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
    
    var v_pantallaComprar = ventanaImagenes();    
    
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

    var v_pantallaAlquilar = ventanaImagenes();
    
    $("#id_contentMenusClientes").html(v_pantallaAlquilar);
    
    event.stopImmediatePropagation();
});

/*******************************************************************************
08- Pintar Ventanas compra-Alquiler
********************************************************************************/
function ventanaImagenes(){
    var v_ventana = "<h1>ALQUILERES COMPRAS</h1>";
    
    for(var i=0; i<5; i++){
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
            <h1>VENTAS</h1>\n\
        </div>';
    
    $("#id_contentMenusClientes").html(v_pantallaVender);
    
    event.stopImmediatePropagation();
});

/*******************************************************************************
10.- Pintar Opciones Footer
********************************************************************************/
$(document).on('click',"#id_copyright",function(event){
    $("#id_contentFooter").css({"display":"block"});
    $("#id_contentMenusClientes").css({"display":"none"});
    $("#id_contentMenusAdmin").css({"display":"none"});
    $("#id_descripcion").css({"display":"none"});

    var v_pantallaCopyright = 
        '<div class="cls_footer">\n\
            <p>COPYRIGHT</p>\n\
            <p>Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer.</p>\n\
        </div>';
    
    $("#id_contentFooter").html(v_pantallaCopyright);
    
    event.stopImmediatePropagation();
});

$(document).on('click',"#id_contacto",function(event){
    $("#id_contentFooter").css({"display":"block"});
    $("#id_contentMenusClientes").css({"display":"none"});
    $("#id_contentMenusAdmin").css({"display":"none"});
    $("#id_descripcion").css({"display":"none"});

    var v_pantallaContacto = 
        '<div class="cls_footer">\n\
            <p>CONTACTO</p>\n\
            <p>Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer.</p>\n\
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
            <p>QUIENES SOMOS</p>\n\
            <p>Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer.</p>\n\
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
            <p>POLITICA PRIVACIDAD</p>\n\
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
            <p>CONDICIONES GENERALES</p>\n\
            <p>Breve descripcion de opcion footer. Breve descripcion de opcion footer. Breve descripcion de opcion footer.</p>\n\
        </div>';
    
    $("#id_contentFooter").html(v_pantallaCondiciones);
    
    event.stopImmediatePropagation();
});

});  