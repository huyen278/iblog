<?php

class App
{
    protected $controller = "HomeController";
    protected $action = "show";
    protected $params = [];

    function __construct()
    {
        $arr = $this->proceedUrl();

        //get Controller
        if (isset($arr[0])) {
            if (file_exists("./controllers/" . ucfirst($arr[0]) . "Controller.php")) {
                $this->controller = ucfirst($arr[0]) . "Controller";
                unset($arr[0]);
            } else {
                $this->controller = "ErrorController";
                unset($arr[0]);
            }
        }

        //require controller
        require_once "./controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        //get Action
        if (isset($arr[1]) && method_exists($this->controller, $arr[1])) {
            $this->action = $arr[1];
            unset($arr[1]);
        }

        //get Params
        $this->params = $arr ? array_values($arr) : [];

        //execute method of object w params
        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    public function proceedUrl()
    {
        $url = null;
        if (isset($_GET["url"])) {
            //to lower
            $url = strtolower($_GET["url"]);
            //split '/'
            $url = explode('/', $url);
        }
        return $url;
    }
}
