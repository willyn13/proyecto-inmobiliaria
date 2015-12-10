/************************************FUNCIONES GENERALES***********************************/
function cargarDatos(selector, url){
    $(document).ready(function(){
             $(function(){
                    $(selector).click(function() {
                           $("#id_content").load(url);
                   });
            });
    });
}

function cargarMenus(url){
    $(document).ready(function(){
        $(function(){
                $("#id_menu").load(url);
        });
    });
}

function ajaxFormulario(urlAjax, idformulario){
    $(document).ready(function(){
             $(function(){
                    $.ajax({ 
                    type: "POST",
                    url: urlAjax,
                    data: $(idformulario).serialize(),
                    success: function(data){
                        $("#id_content").html(data);
                    }
                });
            });
    });
}

function ajaxSinFormulario(dni_cliente,url){
        $(document).ready(function(){
                    $(function(){
                               $.get(url, {dni_cliente : dni_cliente}, function(respuesta) {
                                    $("#id_content").html(respuesta);
                               });  
                    });
        });
}
/******************************FIN FUNCIONES GENERALES*************************************/

 /*************************************MENU COMERCIALES************************************/
    //Enlace gestion de inmuebles
    cargarDatos("#id_gestionInmueble", "inmuebles/gestiondeinmuebles.php");
    //Enlace gestion de clientes
    cargarDatos("#id_gestionCliente", "clientes/gestion_clientes.php");
    //Dentro del enlace gestion de clientes, los enlaces de la tabla
    cargarDatos("#id_alta_cliente", "clientes/alta_cliente.php");
    cargarDatos("#id_registrado", "clientes/gestion_clientes.php");
    cargarDatos("#id_eliminar", "clientes/gestion_clientes.php"); 
    cargarDatos("#id_modificar_cliente", "clientes/modificar_cliente");
    cargarDatos("#id_actualizar_cliente", "clientes/gestion_clientes.php");
    cargarDatos("#id_error_actualizar_cliente", "clientes/gestion_clientes.php");
/***********************************FIN MENU COMERCIALES***********************************/