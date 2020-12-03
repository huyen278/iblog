<?php

class ProductController extends BaseController
{
    public function index($sort = "default", $show = 12)
    {
        $viewPath = [
            'Views/frontend/products/product.php',
        ];
        $this->view($viewPath);
    }
}

?>