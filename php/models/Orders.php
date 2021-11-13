<?php 
    include_once($_SERVER['DOCUMENT_ROOT']."/proyecto_php_tec/php/Connection.php");

    class Order {

        public $pedidoid;
        public $fechacompra;
        public $direccionenvio;
        public $direccionfacturacion;
        public $feedback;
        public $importetotal;

        function __construct($pedidoid,$fechacompra,$direccionenvio,$direccionfacturacion,$feedback,$importetotal) {
            $this->pedidoid=$pedidoid;
            $this->fechacompra=$fechacompra;
            $this->direccionenvio=$direccionenvio;
            $this->direccionfacturacion=$direccionfacturacion;
            $this->feedback=$feedback;
            $this->importetotal=$importetotal;
        }
        
    }

    function getCartProducts($ci){
        $con = Connect();
        $sql =
        "SELECT pl.pedidolineaid,pl.productoid,pl.precio,pl.cantidad,pro.productonombre,pro.productodescripcion,pro.stock
        FROM `pedido` p join usuariopedido up on p.pedidoid= up.pedidoid 
        join usuario u on u.cedula= up.cedula 
        join pedidolinea pl on pl.pedidoid=p.pedidoid
        join producto pro on pro.productoid=pl.productoid 
        WHERE u.cedula='".$ci."' 
        and up.esfinalizado=0;";
        $result = $con->query($sql);
        $pedidos = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $row["productodescripcion"]= str_replace(array("\r", "\n"),"", $row["productodescripcion"]);
                $pedidos[] = $row;
            }
            foreach($pedidos as $key=>$pedido){
                $imagen = getImages($pedido['productoid'])[0];
                $pedidos[$key]['imagen'] = $imagen;
            }
        } 
        $con->close();

        return $pedidos;
    }

    function getImages($productId){
        $files=glob(BASE.'admin/productImages/'.$productId.'/*');
        return $files;
    }

    function getOrders(){
        $con = Connect();
        $sql = "SELECT * FROM pedido";
        $result = $con->query($sql);
        $pedidos = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $pedidos[] = new Order(
                    $row["pedidoid"],$row["fechacompra"],$row["direccionenvio"],
                        $row["direccionfacturacion"],$row["feedback"],$row["importetotal"]);
            }
        } 
        $con->close();
        return $pedidos;
    }

    function getOrderById($pedidoid){
        $con = Connect();
        $sql = "SELECT * FROM pedido WHERE pedidoid = $pedidoid";
        $result = $con->query($sql);
        $pedidos = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $pedidos[] = new Order(
                    $row["pedidoid"],$row["fechacompra"],$row["direccionenvio"],
                        $row["direccionfacturacion"],$row["feedback"],$row["importetotal"]);
            }
        }  
        $con->close();
        return $pedidos;
    }

    function getOrderByFilter($filter){
        $con = Connect();
        $sql = "SELECT * FROM pedido WHERE $filter";
        $result = $con->query($sql);
        $pedidos = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $pedidos[] = new Order(
                    $row["pedidoid"],$row["fechacompra"],$row["direccionenvio"],
                        $row["direccionfacturacion"],$row["feedback"],$row["importetotal"]);
            }
        }  
        $con->close();
        return $pedidos;
    }

    function setOrderFeedback($pedidoid, $comment){
        $con = Connect();
        $sql = "SELECT * FROM pedido WHERE pedidoid = $pedidoid";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $pedido = new Order(
                    $row["pedidoid"],$row["fechacompra"],$row["direccionenvio"],
                        $row["direccionfacturacion"],$row["feedback"],$row["importetotal"]);
            }
        }   
        
        if ($pedido->$feedback != null){
            $sql = "UPDATE pedido SET feedback = '$comment' WHERE pedidoid = $pedidoid";
            $result = $con->query($sql);
        }
        $con->close();
        if($result == true) {
            return true;   
        } else {
            return false;
        }
    }

    function setOrder($pedido){

        $id = $pedido->$pedidoid;
        $fchCompra = $pedido->$fechacompra;
        $dirEnvio = $pedido->$direccionenvio;
        $dirFact = $pedido->$direccionfacturacion;
        $feedb = $pedido->$feedback;
        $imp = $pedido->$importetotal;

        $con = Connect();
        $sql = "INSERT INTO pedido (fechacompra, direccionenvio, direccionenvio, direccionfacturacion, feedback, importetotal)
                VALUES ('$fchCompra', '$dirEnvio', '$dirFact', '$feedb', $imp)";

        $result = $con->query($sql);
        $pedidoid = $con->insert_id;
        $con->close();

        if ($result == true) {
            return $pedidoid;   
        } else {
            return null;
        }
    }

    function updateOrderById($pedidoid, $update){
        $con = Connect();
        $sql = "update pedido set $update where pedidoid = $pedidoid";
        if ( $con->query($sql) ){
            $con->close();
            return true;
        } else {
            $con->close();
            return false;
        }
    }
    function addToCart($ci,$idProduct,$precio){
        $con = Connect();
        $sql = "SELECT pedidoid FROM `usuariopedido` WHERE cedula='".$ci."' and esfinalizado=0;";
        $result = $con->query($sql);
        $row_cnt = $result->num_rows;
        $cantidad=0;
        if($row_cnt ==0){
            $con = Connect();
            $sql = "INSERT INTO `pedido` (`pedidoid`, `fechacompra`, `direccionenvio`, `direccionfacturacion`, `feedback`, `importetotal`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL)";
            $result = $con->query($sql);
            $idPedido = $con->insert_id;
            $con = Connect();
            $sql = "INSERT INTO `pedidolinea` (`pedidoid`, `productoid`, `precio`, `cantidad`) VALUES ('".$idPedido."', '".$idProduct."', '".$precio."', '1')";
            $result = $con->query($sql);
            $con = Connect();
            $sql = "INSERT INTO `usuariopedido` (`cedula`, `pedidoid`, `esfinalizado`) VALUES ('".$ci."', '".$idPedido."', '0');";
            $result = $con->query($sql);
            $cantidad=1;
        }else{
            $linea_pedido= $result->fetch_assoc();
            $idPedido = $linea_pedido["pedidoid"];
            $con = Connect();
            $sql = "SELECT * FROM `pedidolinea` WHERE  `pedidoid`='".$idPedido."' and `productoid`='".$idProduct."';";
            $result = $con->query($sql);
            $row_cnt = $result->num_rows;
            if($row_cnt <=0){
                $sql = "INSERT INTO `pedidolinea` (`pedidoid`, `productoid`, `precio`, `cantidad`) VALUES ('".$idPedido."', '".$idProduct."', '".$precio."', '1')";
                $result = $con->query($sql);
                $cantidad=1;
            }else{
                $sql = "UPDATE `pedidolinea` SET `cantidad` = `cantidad`+1 WHERE `pedidoid` ='".$idPedido."' and `productoid` ='".$idProduct."'";
                $result = $con->query($sql);

                $sql = "SELECT cantidad FROM `pedidolinea` WHERE  `pedidoid`='".$idPedido."' and `productoid`='".$idProduct."';";
                $result = $con->query($sql);
                $linea_pedido= $result->fetch_assoc();
                $cantidad = $linea_pedido["cantidad"];
            }
        }
        return $cantidad;
    }

    function comprar($ci,$metodopago,$dirEnvio,$dirFacturacion,$improtetotal){
        $con = Connect();
        $sql = "SELECT pedidoid FROM `usuariopedido` WHERE cedula='$ci' and esfinalizado=0;";
        $result = $con->query($sql);
        $row_cnt = $result->num_rows;
        $resultado="devuelta ";
        if($row_cnt ==0){
            return "error";
        }else{
            $linea_pedido= $result->fetch_assoc();
            $idPedido = $linea_pedido["pedidoid"];
            $con = Connect();
            $sql = "UPDATE `pedido` SET `fechacompra` = NOW(), `direccionenvio`= '$dirEnvio' , `direccionfacturacion`= '$dirFacturacion', `importetotal`='$improtetotal' WHERE `pedidoid` ='$idPedido'";
            $result = $con->query($sql);
            $sql = "UPDATE `usuariopedido` SET `esfinalizado` = '1' WHERE `usuariopedido`.`cedula` = $ci AND `usuariopedido`.`pedidoid` = '$idPedido';";
            $result = $con->query($sql);
            $sql = "INSERT INTO `usuariopedidopago`(`cedula`, `pedidoid`, `mediodepagoid`, `descripciondepago`) VALUES ('$ci','$idPedido','$metodopago','')";
            $result = $con->query($sql);
           
            $sql = "SELECT * FROM `pedidolinea` where pedidoid=$idPedido";
            $result = $con->query($sql);

            
            while($row = $result->fetch_assoc()) {
                $productoId= $row["productoid"];
                $cantidad= $row["cantidad"];
                $sql = "UPDATE `producto` SET stock = stock-$cantidad WHERE productoid='$productoId';";
                $result2 = $con->query($sql);
                $resultado=$resultado." ". $sql;
            }
        }
        return "ok";
    }

    function removeItem($ci,$idProduct,$precio){
        $con = Connect();
        $sql = "SELECT pedidoid FROM `usuariopedido` WHERE cedula='".$ci."' and esfinalizado=0;";
        $result = $con->query($sql);
        $row_cnt = $result->num_rows;
        if($row_cnt ==0){
            return "error";
        }else{
            $usuariopedido= $result->fetch_assoc();
            $idPedido = $usuariopedido["pedidoid"];
            $con = Connect();
            $sql = "SELECT cantidad FROM `pedidolinea` WHERE  `pedidoid`='".$idPedido."' and `productoid`='".$idProduct."';";
            $result = $con->query($sql);
            $linea_pedido= $result->fetch_assoc();
            $cantidad = $linea_pedido["cantidad"];
            if($cantidad <=1){
                $sql = "DELETE FROM `pedidolinea` WHERE `productoid` ='".$idProduct."'";
                $result = $con->query($sql);
                return 0;
            }else{
                $sql = "UPDATE `pedidolinea` SET `cantidad` = `cantidad`-1 WHERE `pedidoid` ='".$idPedido."' and `productoid` ='".$idProduct."'";
                $result = $con->query($sql);             
                return $cantidad-1;
            }
        }
    }
    function addOrderProduct($pedidoid, $productoid, $cantidad){
        //PRE: existe producto con productoid = $productoid
        //PRE: stock de producto >= $cantidad
        //POST: invoca agregar producto/cantidad en línea
        //POST: actualiza importetotal
        //POST: devuelve true en caso de éxito y false en contrario
        
        $producto = getProductById($productoid)[0];
        $pedidoLineas = getOrderLines($pedidoid);
        if( count($pedidoLineas) == 0 ){
            $pedidoLinea = new OrderLine($pedidoid, 1, $productoid, $producto->productoprecio, $cantidad);
            $ok = setOrderLine($pedidoLinea);
        }else {
            $filter = "productoid = $productoid";
            $pedidoLineas = getOrderLinesByFilter($filter);
            if ( count($pedidoLineas) > 0 ) {
                $pedidoLinea = $pedidoLineas[0];
                $update = "precio = $producto->productoprecio, cantidad = (cantidad + $cantidad)";
                $ok = updateOrderLineById($pedidoid, $pedidoLinea->pedidolineaid, $update); 
            } else {
                $pedidoLinea = new OrderLine($pedidoid, 1, $productoid, $producto->productoprecio, $cantidad);
                $ok = setOrderLine($pedidoLinea);
            }
        }
        if ( $ok ){
            $update = "importetotal = (importetotal + ($producto->productoprecio * $cantidad))";
            if( updateOrderById($pedidoid, $update) ) {
                return true;
            }
        }
        return false;

    }

    function removeOrderProduct($pedidoid, $productoid, $cantidad){
        /**
         * PRE: existe pedido con pedidoid = $pedidoid
         * PRE: existe producto con productoid = $productoid
         * PRE: existen líneas con productoid = $productoid
         * PRE: la cantidad del producto en la línea siempre es >= $cantidad
         */
        /**
         * POST: invoca quitar producto/cantidad en línea. si la línea queda con cantidad cero, se elimina
         * POST: actualiza importetotal
         * POST: se actualiza el stock del producto
         * POST: devuelve true en caso de éxito y false en contrario
         */
        
        //$producto = getProductById($productoid)[0];
        $filter = "productoid = $productoid";
        $pedidoLineas = getOrderLinesByFilter($filter);
        $pedidoLinea = $pedidoLineas[0];
        $ok = true;
        if ($pedidoLinea->cantidad >= $cantidad) {
            $ok = deleteOrderLine($pedidoLinea);
        }else {
            //ajustar cantidad en linea
            $update = "cantidad = (cantidad - $cantidad)";
            $ok = updateOrderLineById($pedidoid, $pedidoLinea->pedidolineaid, $update);
        }
        if ($ok) {
            if (getOrderLines($pedidoId) > 0) {
                $update = "importetotal = (importetotal - ($cantidad * $pedidoLinea->precio) )";
                $ok = updateOrderById($pedidoid, $update);
            }
        }
        if ($ok) {
            return updateProductStock($productoid, (-1)*$cantidad);
        }

        return false;
    }

    function deleteOrderById($pedidoid){
        $con = Connect();
        $sql = "delete from pedido where pedidoid = $pedidoid";
        $ok = $con->query($sql);
        $con->close();
        return $ok;
    }


  /*  function getUserOrdersFinished($cedula){
        $con = Connect();
        $sql = "SELECT up.cedula, up.pedidoid, p.direccionenvio, p.feedback, p.importetotal, p.fechacompra FROM usuariopedido up INNER JOIN pedido p ON p.pedidoid=up.pedidoid WHERE up.cedula = $cedula and esfinalizado=1";
        $result = $con->query($sql);
        $usuarioPedidos = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $usuarioPedidos[] = $row;
                $pedidoid=$row['pedidoid'];
                $sql2="SELECT p.productonombre, pl.precio, pl.cantidad FROM pedidolinea pl INNER JOIN producto p ON p.productoid=pl.productoid WHERE pl.pedidoid=8";
                $result2=$con->query($sql2);
                $prods=[];
                if ($result2->num_rows > 0) {
                    while($p = $result2->fetch_assoc()){
                        $prods[] = $p;
                    }

                    $usuarioPedidos[]['productos'] = $p;
                }
            }
        }  
        $con->close();
        return $usuarioPedidos;
    }*/

    function getUserOrdersFinished($cedula){
        $con = Connect();
        $sql = "SELECT up.cedula, up.pedidoid, p.direccionenvio, p.feedback, p.importetotal, p.fechacompra FROM usuariopedido up INNER JOIN pedido p ON p.pedidoid=up.pedidoid WHERE up.cedula = $cedula and esfinalizado=1";
        $result = $con->query($sql);
        $usuarioPedidos = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $usuarioPedidos[] = $row;
            }
            foreach($usuarioPedidos as $key=>$pedido){
                $id=$pedido['pedidoid'];
                $sql2="SELECT p.productonombre, pl.precio, pl.cantidad FROM pedidolinea pl INNER JOIN producto p ON p.productoid=pl.productoid WHERE pl.pedidoid=$id";
                $result2=$con->query($sql2);
                $prods=[];
                if ($result2->num_rows > 0) {
                    while($p = $result2->fetch_assoc()) {
                         $prods[]= $p;
                    }
                }
                $usuarioPedidos[$key]['productos'] = $prods;
            }
        }  

        $con->close();
        return $usuarioPedidos;
    }


?>