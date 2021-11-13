<?php
    session_start();
    Class producto extends Controller{
        function __construct(){ 
            parent::__construct();
            $this->view->mensaje = "";
            $this->view->pagePath = constant('URL')."producto/";
            $this->view->products = array();
            $this->view->categories = array();
            $this->view->producto = "";
            $this->view->fadeModal="fade";
            $this->view->precio="";
            $this->view->idProduct="";
            $this->view->car=[];
        }
        function render($data){
            $this->view->categories = getCategorias();
            $this->view->product = getProductById($data[0]);
            if(isset($_SESSION["ci"])){
                $this->view->car = getCartProducts($_SESSION["ci"]);
                $this->view->products = $this->deducirProductosEnCarro($this->view->products,$this->view->car);
            }
            $this->view->render('header_view');
            $this->view->render('menu_view');
            $this->view->render('producto/index');
            $this->view->render('footer_view');
            
        }
        function loadModels(){
            $this->loadModel('categories');
            $this->loadModel('products');
            $this->loadModel('Orders');

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
    }
?>