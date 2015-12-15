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
                        if(/^\S{1,10}$/.test(password)){
                            ajaxFormulario('usuarios/form_insertar_usuario.php', '#form1');
                        }else{document.form1.password.focus();document.form1.password.value="";}
                    }else{document.form1.cargo.focus();document.form1.cargo.value="";}
                }else{document.form1.apellidos.focus();document.form1.apellidos.value="";}
            }else{document.form1.nombre.focus();document.form1.nombre.value="";}
        }else{document.form1.idzona.focus();document.form1.idzona.value="";}
    }else{document.form1.dni_usuario.focus();document.form1.dni_usuario.value="";}
}

function validarAlquileres(){
    var idcasa = document.form1.IDCASA.value;
    var dni = document.form1.dni_cliente.value;
    var precio = document.form1.precio_final.value;
    var fechaIni = document.form1.FECHAINICIO.value;
    var fechaFin = document.form1.FECHAFIN.value;
    
    if(/^\S$/.test(idcasa)){
        if(/^\d{8}[a-z A-ZñÑ]$/.test(dni)){
            if(/^\d{1,4}$/.test(precio)){
                if(/^\d{4}\/\d{2}\/\d{2}$/.test(fechaIni)){
                    if(/^\d{4}\/\d{2}\/\d{2}$/.test(fechaFin)){
                         ajaxFormulario('alquileres/form_insertar_alquiler.php', '#form1');
                    }else{document.form1.FECHAFIN.focus();document.form1.FECHAFIN.value="";}              
                }else{document.form1.FECHAINICIO.focus();document.form1.FECHAINICIO.value="";}
            }else{document.form1.precio_final.focus();document.form1.precio_final.value="";}
        }else{document.form1.dni_cliente.focus();}
    }else{document.form1.IDCASA.focus();}
}

function validarVentas(){
    var idcasa = document.form1.IDCASA.value;
    var dni = document.form1.dni_cliente.value;
    var precio = document.form1.precio_final.value;
    var fechaIni = document.form1.FECHACOMPRA.value;
    
    if(/^\S$/.test(idcasa)){
        if(/^\d{8}[a-z A-ZñÑ]$/.test(dni)){
            if(/^\d{1,8}$/.test(precio)){
                if(/^\d{4}\/\d{2}\/\d{2}$/.test(fechaIni)){
                     ajaxFormulario('ventas/form_insertar_venta.php', '#form1');
                }else{document.form1.FECHACOMPRA.focus();document.form1.FECHACOMPRA.value="";}
            }else{document.form1.precio_final.focus();document.form1.precio_final.value="";}
        }else{document.form1.dni_cliente.focus();}
    }else{document.form1.IDCASA.focus();}
}

function validarPeticiones(){
    var nombre = document.form1.nombre.value;
    var dni = document.form1.dni.value;
    var telefono = document.form1.telefono.value;
    var provincia = document.form1.provincia.value;
    var localidad = document.form1.localidad.value;
    var venta = document.form1.venta.value;
    var pvp = document.form1.precio_venta.value;
    var alquiler = document.form1.alquiler.value;
    var pap = document.form1.precio_alquiler.value;
    var m2 = document.form1.m2.value;
    var banios = document.form1.banios.value;
    var habitaciones = document.form1.habitaciones.value;
    var terraza = document.form1.terraza.value;
    var garaje = document.form1.garaje.value;
    var trastero = document.form1.trastero.value;
    var piscina = document.form1.piscina.value;
    var direccion = document.form1.direccion.value;

    if(/^[a-zA-Z_áéíóúñ\s]{3,40}$/.test(nombre)){
        if(/^\d{8}[a-z A-ZñÑ]$/.test(dni)){
            if(/^[6-9]\d{8}$/.test(telefono)){
                if(/^\S$/.test(provincia)){
                    if(/^.$/.test(localidad)){
                        if(/^\S$/.test(venta)){    
                            if(/^\d{1,8}$/.test(pvp)){
                                if(/^\S$/.test(alquiler)){
                                    if(/^\d{1,5}$/.test(pap)){
                                        if(/^\d{1,5}$/.test(m2)){
                                            if(/^\d{1,2}$/.test(banios)){       
                                                if(/^\d{1,2}$/.test(habitaciones)){       
                                                    if(/^\S$/.test(terraza)){  
                                                        if(/^\S$/.test(garaje)){  
                                                            if(/^\S$/.test(trastero)){  
                                                                if(/^\S$/.test(piscina)){  
                                                                    if(/^\w{5,50}$/.test(direccion)){      
                                                                        ajaxFormulario('peticiones/insertarPeticiones.php', '#form1');
                                                                    }else{document.form1.direccion.focus();document.form1.direccion.value="";}
                                                                }else{document.form1.piscina.focus();}
                                                            }else{document.form1.trastero.focus();}
                                                        }else{document.form1.garaje.focus();}
                                                    }else{document.form1.terraza.focus();}
                                                }else{document.form1.habitaciones.focus();document.form1.habitaciones.value="";}
                                            }else{document.form1.banios.focus();document.form1.banios.value="";}
                                        }else{document.form1.m2.focus();document.form1.m2.value="";}
                                    }else{document.form1.precio_alquiler.focus();document.form1.precio_alquiler.value="";}
                                }else{document.form1.alquiler.focus();}
                            }else{document.form1.precio_venta.focus();document.form1.precio_venta.value="";}
                       }else{document.form1.venta.focus();}
                  }else{document.form1.localidad.focus();}
                }else{document.form1.provincia.focus();}
            }else{document.form1.telefono.focus();document.form1.telefono.value="";}
        }else{document.form1.dni.focus();document.form1.dni.value="";}
    }else{document.form1.nombre.focus();document.form1.nombre.value="";}
}

function validarInmuebles(){
    var venta = document.form1.venta.value;
    var alquiler = document.form1.alquiler.value;
    var habitaciones = document.form1.habitaciones.value;
    var m2 = document.form1.m2.value;
    var banios = document.form1.banios.value;
    var terraza = document.form1.terraza.value;
    var trastero = document.form1.trastero.value;
    var piscina = document.form1.piscina.value;
    var garaje = document.form1.garaje.value;
    var direccion = document.form1.direccion.value;
    var localidad = document.form1.localidad.value;
    var pvp = document.form1.precio_venta.value;
    var pap = document.form1.precio_alquiler.value;
    var dni = document.form1.dnipropietario.value;
    
        if(/^\S$/.test(venta)){  
            if(/^\S$/.test(alquiler)){
                if(/^\d{1,2}$/.test(habitaciones)){  
                    if(/^\d{1,5}$/.test(m2)){
                        if(/^\d{1,2}$/.test(banios)){            
                            if(/^\S$/.test(terraza)){
                                if(/^\S$/.test(trastero)){     
                                    if(/^\S$/.test(piscina)){  
                                        if(/^\S$/.test(garaje)){  
                                            if(/^\w{5,50}$/.test(direccion)){  
                                                if(/^.$/.test(localidad)){
                                                    if(/^\d{1,8}$/.test(pvp)){
                                                        if(/^\d{1,5}$/.test(pap)){  
                                                            if(/^\d{8}[a-z A-ZñÑ]$/.test(dni)){
                                                                ajaxFormulario('inmuebles_usuarios/insertar_inmueble.php', '#form1');
                                                            }else{document.form1.dnipropietario.focus();document.form1.dnipropietario.value="";}
                                                        }else{document.form1.precio_alquiler.focus();document.form1.precio_alquiler.value="";}
                                                    }else{document.form1.precio_venta.focus();document.form1.precio_venta.value="";}
                                                }else{document.form1.localidad.focus();}
                                            }else{document.form1.direccion.focus();document.form1.direccion.value="";}
                                        }else{document.form1.garaje.focus();}
                                    }else{document.form1.piscina.focus();}
                                }else{document.form1.trastero.focus();}
                            }else{document.form1.terraza.focus();}
                        }else{document.form1.banios.focus();document.form1.banios.value="";}
                    }else{document.form1.m2.focus();document.form1.m2.value="";}
                }else{document.form1.habitaciones.focus();document.form1.habitaciones.value="";}
            }else{document.form1.alquiler.focus();}
        }else{document.form1.venta.focus();}
}   