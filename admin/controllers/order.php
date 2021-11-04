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

        /*function add(){
            $this->view->render('header_view');
            $this->view->render('user/add');
            $this->view->render('footer_view');
        }

        function add_user_db(){
            $userName = $_POST['userName'];
            $userId = $_POST['userId'];
            $userPassword = $_POST['userPassword'];
            $isAdmin = $_POST['isAdmin'];
            echo putUser($userName,$userId,$userPassword,$isAdmin);

        }

        function update_user_state(){
            $id = $_POST['id'];
            echo updateUserState($id);
        }

        function update_user_admin_state(){
            $id = $_POST['id'];
            echo updateUserAdminState($id);
        }

        function edit($id){
            $this->view->users=getUserById($id[0]);

            $this->view->render('header_view');
            $this->view->render('user/edit');
            $this->view->render('footer_view');


        }

        function edit_user_db(){
            $userName = $_POST['userName'];
            $userId = $_POST['userId'];
            $userPassword = $_POST['userPassword'];
            echo editUser($userId,$userPassword,$userName);
        }*/
    }

?>