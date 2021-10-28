<?php

    Class Main extends Controller{

        function __construct(){ 
            parent::__construct();
            $this->view->render('header_view');
            $this->view->render('index');
            $this->view->render('footer_view');
        }

    }


?>