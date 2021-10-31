<?php
    session_start();
    Class main extends Controller{

        function __construct(){ 
            parent::__construct();
            $this->view->pagePath = constant('URL')."main/";
            $this->view->products = array();
            $this->view->categories = array();
            $this->view->nameProduct = "";
            $this->view->fadeModal="fade";
        }

        function render(){
            $this->view->categories = getCategorias();
            $this->view->products = getProducts();
            $this->view->render('header_view');
            $this->view->render('menu_view');
            $this->view->render('main/index');
            $this->view->render('footer_view');

        }

        function loadModels(){
            $this->loadModel('categories');
            $this->loadModel('products');
        }

        function modal($param){
            $this->render();
            if($this->view->fadeModal=="fade"){
                $this->view->fadeModal="";
                $this->view->nameProduct = "hola".$param[0];
                $this->view->render('main/productInfo');

            }else{
                $this->view->fadeModal=="fade";
            }

        }

        function fillCar(){
            $this->render();
        }
        function logOut(){
            session_destroy();
            header( "Location: ".URL."Login");
        }

    }
?>