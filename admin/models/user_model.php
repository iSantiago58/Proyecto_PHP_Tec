<?php
  include_once(LIBS.'/database.php');

class UserModel {
    public $usuarioNombre;
    public $esHabilitado;
    public $cedula;

    public function __construct(){}

    public function allUsers(){
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


}


?>