<?php

class View{

    function __construct(){}

    function render($nombre){

        require VIEWS.$nombre.'.php';
    }



}

?>