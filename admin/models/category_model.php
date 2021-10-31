<?php
  include_once(LIBS.'/database.php');

class CategoryModel {
    public $categoriaNombre;
    public $categoriaId;

    function __construct($id, $nombre){
        $this->categoriaId=$id;
        $this->categoriaNombre=$nombre;
    }
}

     function allCategories(){
        $link = Connect();
        $sql = "SELECT * FROM categoria";
        $result = $link->query($sql);
        $listUsuarios = [];

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $listUsuarios[] = new CategoryModel($row["categoriaid"],$row["categorianombre"]);
            }
        } 

        $link->close();

        return $listUsuarios;
    }





?>