<?php

class BaseController
{
    public function callModel($model)
    {
        require_once "./models/" . $model . ".php";
        return new $model;
    }

    public function callView($view, $data = [])
    {
        require_once "./views/layouts/" . $view . ".php";
    }
}
