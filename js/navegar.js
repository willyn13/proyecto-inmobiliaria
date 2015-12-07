/*
 ***********************************FUNCIONES GENERALES*****************************************
 */
function cargarDatos(selector, url){
    $(document).ready(function(){
             $(function(){
                    $(selector).click(function() {
                           $("#id_content").load(url);
                   });
            });
    });
}

function ajaxFormulario(urlAjax, idformulario ,urlCargar){
    $(document).ready(function(){
             $(function(){
                    $.ajax({ 
                    type: "POST",
                    url: urlAjax,
                    data: $(idformulario).serialize(),
                    success: function(){
                        $("#id_content").load(urlCargar);
                    }
                });
            });
    });
}

function ajaxSinFormulario(url, dni_cliente){
    $(document).ready(function(){
             $(function(){
                    $.ajax({ 
                    url: url,
                    data: "dni_cliente?="+dni_cliente,
                    success: function(){
                        $("#id_content").load(url);
                    }
                });
            });
    });
}
/*
 * *****************************FIN FUNCIONES GENERALES*******************************************
 */

 /*
 ************************************MENU COMERCIALES***********************************
 */
//Enlace gestion de inmuebles
cargarDatos("#id_gestionInmueble", "inmuebles/gestiondeinmuebles.php");
//Enlace gestion de clientes
cargarDatos("#id_gestionCliente", "clientes/gestion_clientes.php");
//Dentro del enlace gestion de clientes, los enlaces de la tabla
cargarDatos("#id_alta_cliente", "clientes/alta_cliente.php");
cargarDatos("#id_registrado", "clientes/gestion_clientes.php");
/*
 ***********************************FIN MENU COMERCIALES*********************************
 */

