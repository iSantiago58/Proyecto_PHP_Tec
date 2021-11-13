<?php
    session_start();
    Class main extends Controller{

        function __construct(){ 
            parent::__construct();
            $this->view->pagePath = constant('URL')."main/";
            $this->view->products = array();
            $this->view->categories = array();
            $this->view->producto = "";
            $this->view->fadeModal="fade";
            $this->view->precio="";
            $this->view->idProduct="";
            $this->view->car=[];
        }

        function render(){
            $this->view->categories = getCategorias();
            $this->view->products = getProducts();
            if(isset($_SESSION["ci"])){
                $this->view->car = getCartProducts($_SESSION["ci"]);
                $this->view->products = $this->deducirProductosEnCarro($this->view->products,$this->view->car);
            }
            $this->view->render('header_view');
            $this->view->render('menu_view');
            $this->view->render('main/index');
            $this->view->render('footer_view');

        }
        
        function deducirProductosEnCarro($productos,$carro){
            foreach ($carro as $keyItem => $item) {
                foreach ($productos as $keyProducto => $producto) {
                    if($producto->idProducto == $item['productoid']){
                        $productos[$keyProducto]->stock = $producto->stock - $item['cantidad'];
                    }
                    
                }
            }
            return $productos;
        }
        
        function loadModels(){
            $this->loadModel('categories');
            $this->loadModel('products');
            $this->loadModel('Orders');
        }

        function modal($param){
            if($this->view->fadeModal=="fade"){
                $this->view->fadeModal="";
                $this->view->producto = getProductById($param[0])[0];
                $this->view->render('header_view');
                $this->view->render('menu_view');
                $this->view->render('main/productInfo');
                $this->view->render('main/index');
                $this->view->render('footer_view');

            }else{
                $this->view->render('header_view');
                $this->view->render('menu_view');
                $this->view->render('main/index');
                $this->view->render('footer_view');
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