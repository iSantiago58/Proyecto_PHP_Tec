<?php
    session_start();
    Class compra extends Controller{

        function __construct(){ 
            parent::__construct();
            $this->view->pagePath = constant('URL')."compra/";
            $this->view->carro = array();
            $this->view->usuario = array();
            $this->view->fadeModal="fade";
        }

        function render(){
            $this->view->products = getProducts();
            $this->view->render('header_view');
            $this->view->render('menu_view');
            $this->view->render('compra/index');
            $this->view->render('footer_view');

        }

        function loadModels(){
            $this->loadModel('categories');
            $this->loadModel('products');
        }

        function comprar(){

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