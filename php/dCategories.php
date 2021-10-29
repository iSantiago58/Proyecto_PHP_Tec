<?php

include_once($_SERVER['DOCUMENT_ROOT']."/proyecto_php_tec/php/Connection.php");

class Categoria {
  // Properties
  public $idCategoria;
  public $nombre;
    function __construct($idCategoria,$nombre) {
       $this->idCategoria=$idCategoria;
       $this->nombre=$nombre;
   }
}

    $aResult = array();

    if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

    if( !isset($aResult['error']) ) {

        switch($_POST['functionname']) {
            case 'getCategories':
               //llamada a la base de datos
                
                $conn = Connect();
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
               break;
            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }

    }
    //echo json_encode($aResult);

   function get_categories(){
       $conn = Connect();
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

        return $listCategorias;
   } 
?>