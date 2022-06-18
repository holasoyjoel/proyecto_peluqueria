<?php

    require_once "model/db/database.model.php";
    require_once "controller/menu.controller.php";

    if(!isset($_REQUEST["c"]))
    {
        $controller = new MenuController();
        call_user_func(array($controller , "index"));
    }
    else{
        $controller = strtolower($_REQUEST["c"]);
        $accion = isset($_REQUEST['a'])? $_REQUEST['a'] : "Index";

        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . "Controller";
        $controller = new $controller;

        call_user_func(array($controller , $accion));
    }

?>