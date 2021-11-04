<?php
header('Content-Type: application/json');
include_once($_SERVER['DOCUMENT_ROOT']."/proyecto_php_tec/php/models/Orders.php");

if (isset($_POST['addToCart'])) {
    $res = addToCart($_POST['ci'],$_POST['idProduct'],$_POST['precio']);
    $result=[];
    $result["resultado"]=$res;
    echo json_encode($result);
}
?>