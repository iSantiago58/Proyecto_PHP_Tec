<?php

    header('Content-Type: application/json');
    include_once($_SERVER['DOCUMENT_ROOT']."/proyecto_php_tec/php/models/Categories.php");

    //$accion = $_GET['accion'];
    
    
    Class Categories extends Controller{

        function __construct(){ 
            parent::__construct();
            $controller->loadModel('categories');

        }
        function render(){
            $this->view->render('header_view');
            $this->view->render('home_view');
            $this->view->render('footer_view');
        }

        function getCategory(){
            $categorias = getCategorias();
            var_dump($categorias);
            for($i = 0; $i < count($categorias); $i++){
                echo $categorias[$i]->categoriaid. " " .$categorias[$i]->categorianombre. "<br>";
            }
            return ;
        }

        function getCategoryOpt(){
            $categorias = getCategorias();
            var_dump($categorias);
            $htmlCategories="";

            foreach($categorias as $c){    

                $categorie = "<option value=".
                    $c->categoriaid.
                    ">".
                    $c->categorianombre.
                    "</option>";
                $htmlCategories = $htmlCategories. $categorie;
            }
            return $htmlCategories;
        }

    }
/*
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
    */
?>