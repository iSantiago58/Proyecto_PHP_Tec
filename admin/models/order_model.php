<?php
  include_once(LIBS.'/database.php');

class OrderModel {
    public $pedidoId;
    public $cedula;
    public $fechacompra;
    public $usuarioNombre;
    public $feedback;
    

     function __construct($pedidoId,$cedula,$fechacompra,$usuarioNombre,$feedback){
        $this->pedidoId=$pedidoId;
        $this->cedula=$cedula;
        $this->fechacompra=$fechacompra;
        $this->usuarioNombre=$usuarioNombre;
        $this->feedback=$feedback;
    }
}

class OrderProductDetail{
    public $productoNombre;
    public $productoDescripcion;
    public $precio;
    public $cantidad;
    

     function __construct($productoNombre,$productoDescripcion,$precio,$cantidad){
        $this->productoNombre=$productoNombre;
        $this->productoDescripcion=$productoDescripcion;
        $this->precio=$precio;
        $this->cantidad=$cantidad;
    }
}

function getOrders(){
    $link = Connect();
    $sql = "SELECT * FROM pedido p INNER JOIN usuariopedido up ON
                p.pedidoid = up.pedidoid INNER JOIN usuario u ON
                    up.cedula = u.cedula WHERE up.esfinalizado = 1";

    $result = $link->query($sql);
    $listOrders = [];

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $listOrders[] = new OrderModel($row["pedidoid"],$row["cedula"],$row["fechacompra"],$row["usuarionombre"],$row["feedback"]);
        }
    } 
    $link->close();
    return $listOrders;
}

function getOrderById($pedidoid){
    $link = Connect();
    $sql = "SELECT * FROM pedido p INNER JOIN usuariopedido up ON
                p.pedidoid = up.pedidoid INNER JOIN usuario u ON
                    up.cedula = u.cedula WHERE up.esfinalizado = 1 and p.pedidoid = $pedidoid";

    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            return new OrderModel($row["pedidoid"],$row["cedula"],$row["fechacompra"],$row["usuarionombre"],$row["feedback"]);
        }
    } 
    $link->close();
    return $listOrders;
}

function getOrderProductsDetail($pedidoid){
    $link = Connect();
    $sql = "SELECT * FROM pedidolinea pl INNER JOIN producto p ON
                pl.productoid = p.productoid WHERE pl.pedidoid = $pedidoid";

    $result = $link->query($sql);
    $listOrderProducts = [];
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $listOrderProducts[] = new OrderProductDetail($row["productonombre"],$row["productodescripcion"],$row["precio"],$row["cantidad"]);
        }
    } 
    $link->close();
    return $listOrderProducts;
}





?>