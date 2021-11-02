<?php

    Class User extends Controller{

        function __construct(){ 
            parent::__construct();
            $this->view->message=null;
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
            $this->view->render('header_view');
            $this->view->render('user/list');
            $this->view->render('footer_view');
        }

        function getAll(){
            $this->model->getAll();

        }

        function add(){
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
    

    }


?>