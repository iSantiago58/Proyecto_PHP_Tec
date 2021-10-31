<?php
  include_once(LIBS.'/database.php');

class ProductModel {
    public $ProductoId;
    public $ProductoNombre;
    public $ProductoDescripcion;
    public $ProductoPrecio;
    public $ProductoStock;
    public $ProductoActivo;
    public $categoriaId;



    public function __construct(){}

    public function allProducts(){
        $link = Connect();
        $sql = "SELECT * FROM producto";
        $result = $link->query($sql);
        $listUsuarios = [];

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $listUsuarios[] = new ProductModel($row["productoid"],$row["productonombre"],$row["productodescripcion"],$row["productoprecio"],$row["stock"],$row["productoesactivo"],$row["categoriaid"]);
            }
        } 

        $link->close();

        return $listUsuarios;
    }


}


?>