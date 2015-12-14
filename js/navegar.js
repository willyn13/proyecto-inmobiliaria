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

function ajaxSinFormulario(dato,url){
        $(document).ready(function(){
                    $(function(){
                               $.get(url, {dato : dato}, function(respuesta) {
                                    $("#id_content").html(respuesta);
                               });  
                    });
        });
}
/******************************FIN FUNCIONES GENERALES*************************************/

 /**************************MENU COMERCIALES - ADMINISTRADORES*****************************/
 //Gestión de inmuebles
    cargarDatos("#id_gestionInmueble", "inmuebles/gestiondeinmuebles.php");
    cargarDatos("#id_alta_inmueble", "inmuebles/insertarInmueble.php");
    cargarDatos("#id_inmuebles", "clientes/gestiondeinmuebles.php");
//Gestión de clientes
    cargarDatos("#id_gestionCliente", "clientes/gestion_clientes.php");
    cargarDatos("#id_alta_cliente", "clientes/form_insertar_cliente.php");
    cargarDatos("#id_clientes", "clientes/gestion_clientes.php");
//Gestión de usuarios
    cargarDatos("#id_gestionUsuarios", "usuarios/gestion_usuarios.php");
    cargarDatos("#id_alta_usuario", "usuarios/form_insertar_usuario.php");
    cargarDatos("#id_usuarios", "usuarios/gestion_usuarios.php");
//Gestión de alquileres
    cargarDatos("#id_gestionAlquiler", "alquileres/gestion_alquileres.php");
    cargarDatos("#id_alta_alquiler", "alquileres/form_insertar_alquiler.php");
    cargarDatos("#id_alquileres", "usuarios/gestion_alquileres.php");
//Gestión de compra-ventas
    cargarDatos("#id_gestionCompra", "alquileres/gestion_ventas.php");
    cargarDatos("#id_alta_compra", "alquileres/form_insertar_venta.php");
    cargarDatos("#id_compras", "usuarios/gestion_venta.php");
//Gestión de peticiones
    cargarDatos("#id_gestionAPeticiones", "alquileres/gestion_peticiones.php");
    cargarDatos("#id_alta_peticion", "alquileres/form_insertar_peticion.php");
    cargarDatos("#id_peticion", "usuarios/gestion_peticion.php");
//Gestión de localizaciones
    cargarDatos("#id_gestionLocalizacion", "alquileres/gestion_localizaciones.php");
    cargarDatos("#id_alta_localizacion", "alquileres/form_insertar_localizacion.php");
    cargarDatos("#id_localizaciones", "usuarios/gestion_localizaciones.php");
/***************************************FIN MENUS******************************************/