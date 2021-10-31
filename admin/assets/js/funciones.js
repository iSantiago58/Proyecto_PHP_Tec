function login(){
    var usuario=$('#usuario').val();
    var contrasena=$('#contrasena').val();
    if(usuario=='' || contrasena==''){
        $('#error_registro_usuario').html("<div class='alert alert-danger margin-bottom-30'>Complete todos los campos.</div>");
    }else{
        $('#error_registro_usuario').html("<div class='alert alert-success margin-bottom-30'>Enviando...</div>");
        $.post(ruta+"usuario/login",{usuario:usuario,contrasena:contrasena},function(respuesta){
            if(respuesta==1){
                $('#error_registro_usuario').html("<div class='alert alert-success margin-bottom-30'>Redireccionando...</div>");
                window.location=ruta;
            }else{
                $('#error_registro_usuario').html("<div class ='alert alert-danger margin-bottom-30'>Usuario/contraseña incorrectos.</div>");
            }
        });
    }
    return false;
}


function agregarUsuario(){
    var usuario=$('#user').val();
    var contrasena=$('#pass').val();
    if(usuario!='' && contrasena!=''){
        $('#error_registro_usuario').html("<div class='alert alert-success margin-bottom-30'>Procesando...</div>");
        $('#btn-guardar-usuario').css('display', 'none');
        $.post(ruta+"usuario/agregar_usuario",{usuario:usuario,contrasena:contrasena},function(respuesta){
            if(respuesta==1){
                window.location=ruta+"usuario?msj=agregar"
            }else{
                $('#error_registro_usuario').html("<div class='alert alert-danger margin-bottom-30'>Error. Intentá de nuevo</div>");
                $('#btn-guardar-usuario').css('display', '');
            }
        });
    }else{
        $('#error_registro_usuario').html("<div class='alert alert-danger margin-bottom-30'>Los campos son obligatorios</div>");
        $('#btn-guardar-usuario').css('display', '');
    }
    
    return false;

}


// CATEGORIAS
function agregarCategoria(){
    var titulo=$('#titulo').val();
    if(titulo!=""){
        $('#btn-enviar').css('display', 'none');
        $('#errorAgregar').html("<div class='alert alert-success margin-bottom-30'>Enviando...</div>");
        $.post(ruta+"categorias/agregarCategoria", {titulo:titulo}, function(respuesta){
            if(respuesta==1){
                window.location=ruta+"categorias?msj=agregar"
            }else{
                $('#btn-enviar').css('display', 'block');
                $('#errorAgregar').html("<div class='alert alert-danger margin-bottom-30'>Ocurrió un problema, intentá nuevamente.</div>");
            }
        });
    }else{
        $('#errorAgregar').html("<div class='alert alert-danger margin-bottom-30'>Todos los campos son obigatorios.</div>");
    }
    return false;
}


function cambiarEstadoCategoria(slug){
    $.post(ruta+"categorias/cambiarEstado", {slug:slug}, function(respuesta){
        if(respuesta==1){
            alert("Estado cambiado correctamente");
        }else{
            alert("Ocurrió un error al intentar, intentá nuevamente.");
        }
    });
    return false;
}

function editarCategoria(){
    var slug=$('#slug').val();
    var titulo=$('#titulo').val();
    if(slug!="" && titulo!=""){
        $('#btn-enviar').css('display', 'none');
        $('#errorEditar').html("<div class='alert alert-success margin-bottom-30'>Enviando...</div>");
        $.post(ruta+"categorias/editarCategoria", {slug:slug, titulo:titulo}, function(respuesta){
            if(respuesta==1){
                window.location=ruta+"categorias?msj=editar"
            }else{
                $('#btn-enviar').css('display','block');
                $('#errorEditar').html("<div class='alert alert-danger margin-bottom-30'>Ocurrió un problema, intentá nuevamente.</div>");
            }
        });
    }else{
        $('#errorEditar').html("<div class='alert alert-danger margin-bottom-30'>Todos los campos son obigatorios.</div>");
    }
    return false;
}
//--CATEGORIAS






// FUNCIONES PARA LOS SLIDES//

function cambiarEstadoSlide(id){
    $.post(ruta+"slider/cambiarEstado", {id:id}, function(respuesta){
        if(respuesta){
            alert("Estado cambiado correctamente");
        }else{
            alert("Ocurrió un error al intentar, intentá nuevamente.");
        }
    });
    return false;
}

function ponerCampoOcultoSlide(error, data, response){
    if(error==null && response["status"]=="success"){
        document.getElementById("subirFotoSlide").value=response["file"];
    }
}

function eliminarFotoSlide(data){
    document.getElementById("subirFotoSlide").value="";
}

function agregarSlide(){
    var titulo=$('#titulo').val();
    var orden=$('#orden').val();
    var subirFotoSlide=$('#subirFotoSlide').val();
    if(titulo!="" && orden!="" && subirFotoSlide!=""){
        $('#btn-enviar').css('display', 'none');
        $('#errorAgregar').html("<div class='alert alert-success margin-bottom-30'>Enviando...</div>");
        $.post(ruta+"slider/agregarSlide", {titulo:titulo, orden:orden, subirFotoSlide:subirFotoSlide}, function(respuesta){
            if(respuesta){
                window.location=ruta+"slider?msj=agregar"
            }else{
                $('#btn-enviar').css('display', 'block');
                $('#errorAgregar').html("<div class='alert alert-danger margin-bottom-30'>Ocurrió un problema, intentá nuevamente.</div>");
            }
        });
    }else{
        $('#errorAgregar').html("<div class='alert alert-danger margin-bottom-30'>Todos los campos son obigatorios.</div>");
    }
    return false;
}

function editarSlide(){
    var id=$('#id').val();
    var titulo=$('#titulo').val();
    var orden=$('#orden').val();
    var subirFotoSlide=$('#subirFotoSlide').val();
    if(id!="" && titulo!="" && orden!="" && subirFotoSlide!=""){
        $('#btn-enviar').css('display', 'none');
        $('#errorEditar').html("<div class='alert alert-success margin-bottom-30'>Enviando...</div>");
        $.post(ruta+"slider/editarSlide", {id:id, titulo:titulo, orden:orden, subirFotoSlide:subirFotoSlide} ,function(respuesta){
            if(respuesta==1){
                window.location=ruta+"slider?msj=editar"
            }else{
                $('#btn-enviar').css('display','block');
                $('#errorEditar').html("<div class='alert alert-danger margin-bottom-30'>Ocurrió un problema, intentá nuevamente.</div>");
            }
        });
    }else{
        $('#errorEditar').html("<div class='alert alert-danger margin-bottom-30'>Todos los campos son obigatorios.</div>");
    }
    return false;
}




// FUNCIONES PARA LAS NOTICIAS//



function agregarNoticias(){
    var titulo=$('#titulo').val();
    var categoria=$('#categoria').val();
    var descripcionCorta=$('#descripcion_corta').val();
    var descripcion=$('#descripcion').val();
    var keywords=$('#keywords').val();
    var metatag=$('#metatags').val();
    var subirFotoNoticia1=$('#subirFotoNoticia1').val();
    var subirFotoNoticia2=$('#subirFotoNoticia2').val();
    console.log(metatag);
    if(titulo!="" && categoria!="" && descripcionCorta!="" && descripcion!="" && keywords!="" && metatag!="" &&subirFotoNoticia1!="" && subirFotoNoticia2!=""){
        $('#btn-enviar').css('display', 'none');
        $('#errorAgregar').html("<div class='alert alert-success margin-bottom-30'>Enviando...</div>");
        try {
           $.post(ruta+"noticias/agregarNoticia", {titulo:titulo, categoria:categoria,descripcionCorta:descripcionCorta, descripcion:descripcion,keywords:keywords,metatag:metatag,subirFotoNoticia1:subirFotoNoticia1, subirFotoNoticia2:subirFotoNoticia2}, function(respuesta){
                if(respuesta==1){
                    window.location=ruta+"noticias?msj=agregar"
                }else{
                    $('#btn-enviar').css('display', '');
                    $('#errorAgregar').html("<div class='alert alert-danger margin-bottom-30'>Ocurrió un problema, intentá nuevamente.</div>");
                }
            });
        } catch (error) {
          console.error(error);
          // expected output: ReferenceError: nonExistentFunction is not defined
          // Note - error messages will vary depending on browser
        }

    }else{
        console.log("estp");
        $('#errorAgregar').html("<div class='alert alert-danger margin-bottom-30'>Todos los campos con * son obigatorios.</div>");
    }
return false;
}




function editarNoticias(){
    var id=$('#id').val();
    var titulo=$('#titulo').val();
    var categoria=$('#categoria').val();
    var descripcionCorta=$('#descripcion_corta').val();
    var descripcion=$('#descripcion').val();
    var keywords=$('#keywords').val();
    var metatag=$('#metatags').val();
    var subirFotoNoticia1=$('#subirFotoNoticia1').val();
    var subirFotoNoticia2=$('#subirFotoNoticia2').val();
    if(id!="" && titulo!="" && categoria!="" && descripcionCorta!="" && descripcion!="" && keywords!="" && metatag!="" &&subirFotoNoticia1!="" && subirFotoNoticia2!=""){
        $('#btn-enviar').css('display', 'none');
        $('#errorEditar').html("<div class='alert alert-success margin-bottom-30'>Enviando...</div>");
        $.post(ruta+"noticias/editarNoticias", {id:id,titulo:titulo, categoria:categoria,descripcionCorta:descripcionCorta, descripcion:descripcion,keywords:keywords,metatag:metatag,subirFotoNoticia1:subirFotoNoticia1, subirFotoNoticia2:subirFotoNoticia2}, function(respuesta){
            if(respuesta==1){
                window.location=ruta+"noticias?msj=editar"
            }else{
                $('#btn-enviar').css('display', '');
                $('#errorEditar').html("<div class='alert alert-danger margin-bottom-30'>Ocurrió un problema, intentá nuevamente.</div>");
            }
        });
    }else{
        $('#errorEditar').html("<div class='alert alert-danger margin-bottom-30'>Todos los campos con * son obigatorios.</div>");
    }
    return false;
}
function destacadoNoticias(id){
    $.post(ruta+"noticias/destacado", {id:id}, function(respuesta){
        if(respuesta==1){
            alert("Estado cambiado correctamente");
        }else{
            alert("Ocurrió un error al intentar, intentá nuevamente.");
        }
    });
    return false;
}
function eliminarFotoNoticias(data){
    document.getElementById("subirFotoNoticia"+data["server"]["orden"]).value="";
}

function cambiarEstadoNoticias(id){
    $.post(ruta+"noticias/cambiarEstado", {id:id}, function(respuesta){
        if(respuesta==1){
            alert("Estado cambiado correctamente");
        }else{
            alert("Ocurrió un error al intentar, intentá nuevamente.");
        }
    });
    return false;
}
function ponerCampoOcultoNoticias(error, data, response){
    if(error==null && response["status"]=="success"){
        document.getElementById("subirFotoNoticia"+response["orden"]).value=response["file"];
    }
}
// FUNCIONES PARA LOS TAGS//
function agregarTag(){
    var tag=$('#tag').val();
    if(tag!="" ){
        $('#btn-enviar').css('display', 'none');
        $('#errorAgregar').html("<div class='alert alert-success margin-bottom-30'>Enviando...</div>");
        $.post(ruta+"tags/agregarTag", {tag:tag}, function(respuesta){
            if(respuesta==1){
                window.location=ruta+"tags?msj=agregar"
            }else{
                $('#btn-enviar').css('display', '');
                $('#errorAgregar').html("<div class='alert alert-danger margin-bottom-30'>Ocurrió un problema, intentá nuevamente.</div>");
            }
        });
    }else{
        $('#errorAgregar').html("<div class='alert alert-danger margin-bottom-30'>Todos los campos con * son obigatorios.</div>");
    }
    return false;
}
function editarTag(){
    var id=$('#id').val();
    var nombre=$('#nombre').val();
    if(id!="" && nombre!="" ){
        $('#btn-enviar').css('display', 'none');
        $('#errorEditar').html("<div class='alert alert-success margin-bottom-30'>Enviando...</div>");
        $.post(ruta+"tags/editarTag", {id:id, nombre:nombre}, function(respuesta){
            if(respuesta==1){
                window.location=ruta+"tags?msj=editar"
            }else{
                $('#btn-enviar').css('display', '');
                $('#errorEditar').html("<div class='alert alert-danger margin-bottom-30'>Ocurrió un problema, intentá nuevamente.</div>");
            }
        });
    }else{
        $('#errorEditar').html("<div class='alert alert-danger margin-bottom-30'>Todos los campos con * son obigatorios.</div>");
    }
    return false;
}