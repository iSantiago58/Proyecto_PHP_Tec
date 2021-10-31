<?php
    session_start();
    Class Login extends Controller{
        function __construct(){ 
            parent::__construct();
            $this->view->mensaje = "";
        }
        function render(){
            if(isset($_SESSION["ci"])){
                header( "Location: ".URL."main");
            }else{
                $this->view->render('header_view');
                $this->view->render('menu_view');
                $this->view->render('login/index');
                $this->view->render('footer_view');
            }
            
        }

        function loadModels(){
            $this->loadModel('Categories');
            $this->loadModel('Users');

        }
        function run(){
            $this->view->mensaje = "Alumno actualizado correctamente";
        }
        function verify()
        {
            $usuario=$_POST['ci'];
            $password =$_POST['password'];
            $logData=login($usuario,$password);
            
            if($logData == null){
                $mensaje = "Contraseña o password incorrectos";
                $this->view->mensaje = $mensaje;
                $this->render();
            }else{
                $_SESSION["ci"] = "usuario";
                $mensaje = "LOGUEADO";
                $this->goToMain();
            }
            
        }
        function goToMain(){
            header( "Location: ".URL."main");

        }
    }
?>