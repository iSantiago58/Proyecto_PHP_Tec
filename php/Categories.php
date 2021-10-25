<?php
header('Content-Type: application/json');

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

    $aResult = array();

    if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

    if( !isset($aResult['error']) ) {

        switch($_POST['functionname']) {
            case 'add':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) {
                   $aResult['error'] = 'Error in arguments!';
               }
               else {
                   $aResult['result'] = add(floatval($_POST['arguments'][0]), floatval($_POST['arguments'][1]));
               }
               break;
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
    echo json_encode($aResult);

?>