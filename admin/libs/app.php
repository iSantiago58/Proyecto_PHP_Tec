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
        }else{
            $archivoController = CONTROLLERS . $url[0] . '.php';
        }

        if(file_exists($archivoController)){
            require_once  $archivoController;

            $controller = new $url[0];
            $controller->loadModels();
            
            $nparam = sizeof($url);

            if($nparam > 1){
                if($nparam > 2){
                    $param = [];
                    for($i = 2; $i<$nparam; $i++){
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                }else{
                    $controller->{$url[1]}();
                }
            }else{
                $controller->render();
            }
        }else{
            echo $url[0];

            echo "Error";
        }
    }
}

?>