<?php

    Class User extends Controller{

        function __construct(){ 
            parent::__construct();
            $this->view->message=null;
            $this->view->users=null;
            $this->view->place=null;
        }

        function loadModels(){
            $this->loadModel('user');
        }


        function render(){
            if(isset($_GET['msj'])){
	            if($_GET['msj']=="agregar"){
	                $this->view->message="<div class='alert alert-success'>Agregado correctamente.</div>";
	            }elseif($_GET['msj']=="editar"){
	                $this->view->message="<div class='alert alert-success'>Editado correctamente.</div>";
	            }elseif($_GET['msj']=="eliminar"){
                    $this->view->message="<div class='alert alert-success'>Eliminado correctamente.</div>";
	            }
	        }
            $this->view->users=allUsers();
            $this->view->place="user";
            $this->view->render('header_view');
            $this->view->render('user/list');
            $this->view->render('footer_view');
        }

        function getAll(){
            $this->model->getAll();

        }

        function add(){
            $this->view->place="user";
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
            $this->view->place="user";
            $this->view->render('header_view');
            $this->view->render('user/edit');
            $this->view->render('footer_view');


        }

        function edit_user_db(){
            $userName = $_POST['userName'];
            $userId = $_POST['userId'];
            $userPassword = $_POST['userPassword'];
            echo editUser($userId,$userPassword,$userName);
        }
    }

?>