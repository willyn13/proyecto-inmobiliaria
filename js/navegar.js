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

 /*************************************MENU COMERCIALES************************************/
 //Gestión de inmuebles
    cargarDatos("#id_gestionInmueble", "inmuebles/gestiondeinmuebles.php");
    cargarDatos("#id_alta_inmueble", "inmuebles/insertarInmueble.php")
//Gestión de clientes
    cargarDatos("#id_gestionCliente", "clientes/gestion_clientes.php");
    cargarDatos("#id_alta_cliente", "clientes/form_insertar_cliente.php");
    cargarDatos("#id_clientes", "clientes/gestion_clientes.php");
/***********************************FIN MENU COMERCIALES***********************************/

/***********************************MENU ADMINISTRADORES***********************************/
//Gestión de clientes
cargarDatos("#id_gestionusuarios", "usuarios/gestion_usuarios.php");
cargarDatos("#id_alta_usuario", "usuarios/form_insertar_usuario.php");
cargarDatos("#id_usuarios", "usuarios/gestion_usuarios.php");
//Gestión de alquileres
cargarDatos("#id_gestionAlquiler", "alquileres/gestion_alquileres.php");
cargarDatos("#id_alta_alquiler", "alquileres/form_insertar_alquiler.php");
cargarDatos("#id_usuarios", "usuarios/gestion_usuarios.php");
/**********************************FIN MENU ADMINISTRADORES********************************/