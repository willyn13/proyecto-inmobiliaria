/*
 ***********************************FUNCION GENERAL PARA AJAX*************************************
 */

/*function ajax(id_selector, url){
    $(function(){
        $(id_selector).on('click', function(){
                $.ajax({ 
                    url: url,
                })
                .done(function(html){
                    $("#id_content").empty().append(html);
                })
                });
            $("#id_modalFondo").css({"display":"none"});
            $("#id_modalPantalla").css({"display":"none"});
            $("#id_cookies").css({"display": "none"});
            return false;
        });
   };
*/

function cargarDatos(selector, url){
    $(function(){
    $(selector).click(function() {
	$("#id_content").load(url);
    });
    });
}

/*
 ************************************MENU COMERCIALES***********************************
 */
//Enlace gestion de inmuebles
cargarDatos("#id_gestionInmueble", "inmuebles/gestiondeinmuebles.php");
//Enlace gestion de clientes
cargarDatos("#id_gestionCliente", "clientes/gestion_clientes.php");

/*
 ***********************************FIN MENU COMERCIALES*********************************
 */

