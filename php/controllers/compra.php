<?php
    session_start();
    Class compra extends Controller{

        function __construct(){ 
            parent::__construct();
            $this->view->pagePath = constant('URL')."compra/";
            $this->view->carro = array();
            $this->view->usuario = array();
            $this->view->fadeModal="fade";
            $this->view->metodospagos ="fgf";
            $this->view->mensaje = ""; 
        }
        function render(){
            $this->view->products = getProducts();
            $this->view->metodospagos = getPayments(); 
            if(isset($_SESSION["ci"])){
                $this->view->car = getCartProducts($_SESSION["ci"]);
            }
            $this->view->nocarro = "seteado"; 
            $this->view->mensaje = ""; 
            $this->view->render('header_view');
            $this->view->render('menu_view');
            $this->view->render('compra/index');
            $this->view->render('footer_view');

        }

        function loadModels(){
            $this->loadModel('categories');
            $this->loadModel('products');
            $this->loadModel('Orders');
            $this->loadModel('Payments');
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