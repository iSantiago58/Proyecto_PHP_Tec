<?php
    session_start();
    Class perfil extends Controller{

        function __construct(){ 
            parent::__construct();
            $this->view->car=[];
            $this->view->pagePath = constant('URL')."perfil/"; 
            $this->view->user=null;
            $this->view->orders=[];

        }

        function render(){
            if(isset($_SESSION["ci"])){
                $this->view->car = getCartProducts($_SESSION["ci"]);
                $this->view->user = getUserById($_SESSION["ci"]);
                $this->view->orders=getUserOrdersFinished($_SESSION["ci"]);
            }
            $this->view->render('header_view');
            $this->view->render('menu_view');
            $this->view->render('perfil/index');
            $this->view->render('footer_view');
        }

        function loadModels(){
            $this->loadModel('users');
            $this->loadModel('orders');
        }

        function logOut(){
            session_destroy();
            header( "Location: ".URL."Login");
        }

        function send_review(){
            $revew = $_POST['revew'];
            $orderId = $_POST['orderId'];
            echo sendRevew($revew, $orderId);
        }

    }
?>