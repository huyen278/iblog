<?php

class ErrorController extends BaseController
{
    public function index()
    {
        $viewPath = [
            'Views/frontend/inc/404.php',
        ];
        $this->view($viewPath);
    }
}

?>