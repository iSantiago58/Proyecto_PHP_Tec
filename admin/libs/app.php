<?php

class App{

    function __construct(){

        $url = rtrim($_GET['url'], "/");
        $url = explode('/', $url);
        //var_dump($url);
        $nombreControlador = $url[0];
        $archivoController = 'controllers/'.$nombreControlador.'.php';

        if(file_exists($archivoController)){
            require_once  $_SERVER['DOCUMENT_ROOT'].'/proyecto_php_tec/admin/'.$archivoController;
            $controller = new $nombreControlador;

             if(isset($url[1])){
                $controller->{$url[1]}();

             }

        }else{

            echo "crear clase error o no ";


         }
      


    }

}

?>