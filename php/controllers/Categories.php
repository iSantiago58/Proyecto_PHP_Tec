<?php

    header('Content-Type: application/json');
    include_once($_SERVER['DOCUMENT_ROOT']."/proyecto_php_tec/php/models/Categories.php");

    $accion = $_GET['accion'];

    switch ($accion){
        case 1:
            $nombre = $_GET['nombre'];
            putCategoria($nombre);
            echo "se insertó la categoria con nombre $nombre";
            break;

        case 2:
            $nombre = $_GET['nombre'];
            //$categoria = getCategoria($nombre);
            $filas = getCategoria($nombre);
            $id=$filas["categoriaid"];
            $catNombre = $filas["categorianombre"];
            echo $id. " " .$catNombre. "<br>";
            break;
        
        case 3:
            $categorias = getCategorias();
            var_dump($categorias);
            echo "<br>";
            
            for($i = 0; $i < count($categorias); $i++){
                echo $categorias[$i]->categoriaid. " " .$categorias[$i]->categorianombre. "<br>";
            }
            break;
    }
?>