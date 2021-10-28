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