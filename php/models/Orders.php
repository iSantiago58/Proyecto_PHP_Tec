<?php 
    header('Content-Type: application/json');
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
?>