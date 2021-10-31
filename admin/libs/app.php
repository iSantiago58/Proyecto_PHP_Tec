<?php

class App{

    function __construct(){

        $url = isset($_GET['url']) ? rtrim($_GET['url'], "/") : null;
        $url = explode('/', $url);
        if(empty($url[0])){
            $archivoController = CONTROLLERS.'main.php';
            require_once $archivoController;
            $controller = new Main();
            $controller->loadModels();
            $controller->render();
            return false;
        }
        $nombreControlador = $url[0];
        $archivoController = CONTROLLERS.$nombreControlador.'.php';

        if(file_exists($archivoController)){
            require_once  $archivoController;
            $controller = new $nombreControlador;
            $controller->loadModels();
             if(isset($url[1])){

                $controller->{$url[1]}();
             }else{
                $controller->render();
             }
        }else{
            echo "crear clase error o no ";
         }
    }
}

?>