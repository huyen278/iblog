<?php

class BaseController
{
    public $mdw;
    public $cates;
    public $token;

    function __construct()
    {
        //Middleware
        require_once "./core/middleware.php";
        $this->mdw = new Middleware();
    }

    public function callModel($model)
    {
        require_once "./models/" . $model . ".php";
        return new $model;
    }

    public function callView($view, $data = [])
    {
        require_once "./views/layouts/" . $view . ".php";
    }

    public function callController($controller)
    {
        require_once "./controllers/" . $controller . ".php";
        return new $controller;
    }
}
