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
        $listCategorias = [];

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $listCategorias[] = new CategoryModel($row["categoriaid"],$row["categorianombre"]);
            }
        } 

        $link->close();

        return $listCategorias;
    }

    function existsCategory($category){
        $link = Connect();
        $sql = "select * from categoria where categorianombre = '$category' ";
        $result = $link->query($sql);
        $existe=false;
        if($result->num_rows>0){
            $existe=true;
        }
        $link->close();
        
        return $existe;
    }


    function putCategory($name){
        if(!existsCategory($name)){
            $link = Connect();
            $sql = "insert into categoria(categorianombre) values('$name')";
            $result = $link->query($sql);
            $link->close();
    
            return $result;
        }else{
            return -1;
        }
    }

    




?>