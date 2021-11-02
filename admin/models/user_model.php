<?php
  include_once(LIBS.'/database.php');

class UserModel {
    public $usuarioNombre;
    public $esHabilitado;
    public $cedula;

     function __construct($usuarioNombre,$esHabilitado,$cedula){
        $this->$usuarioNombre=$usuarioNombre;
        $this->$esHabilitado=$esHabilitado;
        $this->$cedula=$cedula;
    }
}

     function allUsers(){
        $link = Connect();
        $sql = "SELECT * FROM usuario";
        $result = $link->query($sql);
        $listUsuarios = [];

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $listUsuarios[] = new UserModel($row["usuarionombre"],$row["eshabilitado"],$row["cedula"]);
            }
        } 

        $link->close();
        return $listUsuarios;
    }


    function existsUser($id){
        $link = Connect();
        $sql = "SELECT * FROM usuario WHERE cedula=$id";
        $result = $link->query($sql);
        $existe=false;
        if($result->num_rows>0){
            $existe=true;
        }
        $link->close();
        return $existe;
    }


    function putUser($userName,$userId,$userPassword,$isAdmin){
        if(!existsUser($userId)){
            $link = Connect();
            $sql = "INSERT INTO usuario(cedula, password, usuarionombre, eshabilitado, esadmin) VALUES ($userId,'$userPassword','$userName',1,'$isAdmin')";
            return $link->query($sql);
        }else{
            return -1;
        }
    }




?>