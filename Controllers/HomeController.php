<?php

class HomeController extends BaseController
{
    public function index()
    {
        $viewPath = [
            'Views/frontend/other/slider.php',
            'Views/frontend/home/popular.php',
            'Views/frontend/home/latest.php',
            'Views/frontend/other/banner.php',
        ];
        $this->view($viewPath);
    }
}

?>