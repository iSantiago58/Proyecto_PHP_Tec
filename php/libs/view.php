<?php

class View{

    function __construct(){}

    function render($nombre){
        require_once VIEWS.$nombre.'.php';
    }
}
?>