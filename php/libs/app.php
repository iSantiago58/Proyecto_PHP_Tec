<?php

class App{

    function __construct(){

        $url = rtrim($_GET['url'], "/");
        $url = explode('/', $url);
        //var_dump($url);
        $nombreControlador = $url[0];
        $archivoController = CONTROLLERS.$nombreControlador.'.php';

        if(file_exists($archivoController)){
            require_once  $archivoController;
            $controller = new $nombreControlador;
            $controller->loadModels();

            $controller->render();
             if(isset($url[1])){
                $controller->{$url[1]}();

             }

        }else{

            echo "ruta ". $_SERVER['DOCUMENT_ROOT'].'/proyecto_php_tec/php/'.$archivoController;
            echo "crear clase error o no ";

         }
    }

}

?>