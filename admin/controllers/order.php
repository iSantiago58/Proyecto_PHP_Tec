<?php

    Class Order extends Controller{

        function __construct(){ 
            parent::__construct();
            $this->view->message=null;
            $this->view->orders=null;
            $this->view->prodsDetail=null;
        }

        function loadModels(){
            $this->loadModel('order');
        }


        function render(){
            
            $this->view->orders=getOrders();
            
            $this->view->render('header_view');
            $this->view->render('order/list');
            $this->view->render('footer_view');
        }

        function detail($pedidoid){
            $this->view->orders=getOrderById($pedidoid[0]);
            $this->view->prodsDetail=getOrderProductsDetail($pedidoid[0]);
            $this->view->render('header_view');
            $this->view->render('order/detail');
            $this->view->render('footer_view');
        }
    }

?>