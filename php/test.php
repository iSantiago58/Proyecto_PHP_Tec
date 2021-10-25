<?php 

include_once '.\Connection.php';


class Categoria {
  // Properties
  public $idCategoria;
  public $nombre;
    function __construct($idCategoria,$nombre) {
       $this->idCategoria=$idCategoria;
       $this->nombre=$nombre;
   }
}

$conn = Connect();



                $con = Connect();
                $sql = "SELECT * FROM categoria";
                $result = $conn->query($sql);
                $listCategorias = [];

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $listCategorias[] = new Categoria($row["categoriaid"],$row["categorianombre"]);
                    }
                } 

                $conn->close();

                $aResult["categorias"] = $listCategorias;
echo json_encode($aResult);