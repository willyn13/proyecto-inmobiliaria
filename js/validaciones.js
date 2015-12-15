function validarClientes(){
    var dni = document.form1.dni_cliente.value;
    var nombre = document.form1.nombre.value;
    var apellidos = document.form1.apellidos.value;
    var telefono = document.form1.telefono.value;
    var email = document.form1.email.value;

    if(/^\d{8}[a-z A-ZñÑ]$/.test(dni)){
        if(/^[a-z A-ZñÑ]{3,15}$/.test(nombre)){
            if(/^[a-z A-ZñÑ]{3,30}$/.test(apellidos)){
                if(/^[6-9]\d{8}$/.test(telefono)){
                    if(/^[a-z]+\.?[a-z]+@[a-z]+\.?[a-z]+\.[a-z]{3}$/.test(email)){
                        ajaxFormulario('clientes/form_insertar_cliente.php', '#form1');
                    }else{document.form1.email.focus();document.form1.email.value="";}
                }else{document.form1.telefono.focus();document.form1.telefono.value="";}
            }else{document.form1.apellidos.focus();document.form1.apellidos.value="";}
        }else{document.form1.nombre.focus();document.form1.nombre.value="";}
    }else{document.form1.dni_cliente.focus();document.form1.dni_cliente.value="";}
}

function validarUsuarios(){
    var dni = document.form1.dni_usuario.value;
    var zona = document.form1.idzona.value;
    var nombre = document.form1.nombre.value;
    var apellidos = document.form1.apellidos.value;
    var cargo = document.form1.cargo.value;
    var password = document.form1.password.value;

    if(/^\d{8}[a-z A-ZñÑ]$/.test(dni)){
        if(/^\d{1,3}$/.test(zona)){
            if(/^[a-z A-ZñÑ]{3,15}$/.test(nombre)){
                if(/^[a-z A-ZñÑ]{3,30}$/.test(apellidos)){
                    if(/^(Admin)|(Comercial)$/.test(cargo)){ 
                        if(/^\s{1,10}$/.test(password)){
                            ajaxFormulario('usuarios/form_insertar_usuario.php', '#form1');
                        }else{document.form1.password.focus();document.form1.password.value="";}
                    }else{document.form1.cargo.focus();document.form1.cargo.value="";}
                }else{document.form1.apellidos.focus();document.form1.apellidos.value="";}
            }else{document.form1.nombre.focus();document.form1.nombre.value="";}
        }else{document.form1.idzona.focus();document.form1.idzona.value="";}
    }else{document.form1.dni_usuario.focus();document.form1.dni_usuario.value="";}
}

function validarPeticiones(){
    var nombre = document.form1.nombre.value;
    var dni = document.form1.dni.value;
    var telefono = document.form1.telefono.value;
    var pvp = document.form1.precio_venta.value;
    var pap = document.form1.precio_alquiler.value;
    var m2 = document.form1.m2.value;
    var banios = document.form1.banios.value;
    var habitaciones = document.form1.habitaciones.value;
    var direccion = document.form1.direccion.value;

    if(/^\d{8}[a-z A-ZñÑ]$/.test(dni)){
        if(/^[a-z A-ZñÑ]{3,15}$/.test(nombre)){
            if(/^[a-z A-ZñÑ]{3,30}$/.test(apellidos)){
                if(/^[6-9]\d{8}$/.test(telefono)){
                    if(/^[a-z]+\.?[a-z]+@[a-z]+\.?[a-z]+\.[a-z]{3}$/.test(email)){
                        ajaxFormulario('peticiones/insertarPeticiones.php', '#form1');
                    }else{document.form1.email.focus();document.form1.email.value="";}
                }else{document.form1.telefono.focus();document.form1.telefono.value="";}
            }else{document.form1.apellidos.focus();document.form1.apellidos.value="";}
        }else{document.form1.nombre.focus();document.form1.nombre.value="";}
    }else{document.form1.dni_cliente.focus();document.form1.dni_cliente.value="";}
}

function validarInmuebles(){
    var habitaciones = document.form1.habitaciones.value;
    var m2 = document.form1.m2.value;
    var banios = document.form1.banios.value;
    var direccion = document.form1.direccion.value;
    var pvp = document.form1.precio_venta.value;
    var pap = document.form1.precio_alquiler.value;
    
    if(/^\d{8}[a-z A-ZñÑ]$/.test(dni)){
        if(/^[a-z A-ZñÑ]{3,15}$/.test(nombre)){
            if(/^[a-z A-ZñÑ]{3,30}$/.test(apellidos)){
                if(/^[6-9]\d{8}$/.test(telefono)){
                    if(/^[a-z]+\.?[a-z]+@[a-z]+\.?[a-z]+\.[a-z]{3}$/.test(email)){
                        ajaxFormulario('inmuebles_usuarios/insertar_inmueble.php', '#form1');
                    }else{document.form1.email.focus();document.form1.email.value="";}
                }else{document.form1.telefono.focus();document.form1.telefono.value="";}
            }else{document.form1.apellidos.focus();document.form1.apellidos.value="";}
        }else{document.form1.nombre.focus();document.form1.nombre.value="";}
    }else{document.form1.dni_cliente.focus();document.form1.dni_cliente.value="";}
}

function validarAlquileres(){
    var dni = document.form1.dni_cliente.value;
    var precio = document.form1.precio_final.value;
    var fechaIni = document.form1.FECHAINICIO.value;
    var fechaFin = document.form1.FECHAFIN.value;
    
    if(/^\d{8}[a-z A-ZñÑ]$/.test(dni)){
        if(/^[a-z A-ZñÑ]{3,15}$/.test(nombre)){
            if(/^[a-z A-ZñÑ]{3,30}$/.test(apellidos)){
                if(/^[6-9]\d{8}$/.test(telefono)){
                    if(/^[a-z]+\.?[a-z]+@[a-z]+\.?[a-z]+\.[a-z]{3}$/.test(email)){
                        ajaxFormulario('alquileres/form_insertar_alquiler.php', '#form1');
                    }else{document.form1.email.focus();document.form1.email.value="";}
                }else{document.form1.telefono.focus();document.form1.telefono.value="";}
            }else{document.form1.apellidos.focus();document.form1.apellidos.value="";}
        }else{document.form1.nombre.focus();document.form1.nombre.value="";}
    }else{document.form1.dni_cliente.focus();document.form1.dni_cliente.value="";}
}

function validarVentas(){
    var dni = document.form1.dni_cliente.value;
    var precio = document.form1.precio_final.value;
    var fechaIni = document.form1.FECHACOMPRA.value;
    
    if(/^\d{8}[a-z A-ZñÑ]$/.test(dni)){
        if(/^[a-z A-ZñÑ]{3,15}$/.test(nombre)){
            if(/^[a-z A-ZñÑ]{3,30}$/.test(apellidos)){
                if(/^[6-9]\d{8}$/.test(telefono)){
                    if(/^[a-z]+\.?[a-z]+@[a-z]+\.?[a-z]+\.[a-z]{3}$/.test(email)){
                        ajaxFormulario('inmuebles_usuarios/insertar_inmueble.php', '#form1');
                    }else{document.form1.email.focus();document.form1.email.value="";}
                }else{document.form1.telefono.focus();document.form1.telefono.value="";}
            }else{document.form1.apellidos.focus();document.form1.apellidos.value="";}
        }else{document.form1.nombre.focus();document.form1.nombre.value="";}
    }else{document.form1.dni_cliente.focus();document.form1.dni_cliente.value="";}
}