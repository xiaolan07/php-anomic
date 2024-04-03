<?php


function call($controller,$action)
{

    require_once("Controller/$controller.php");
    require_once("Models/$controller.php");

    $controller = new $controller;
    $controller->{$action}();


    $controllers = array('Admin' => ['allAdmins', 'add', 'delete']);

}

