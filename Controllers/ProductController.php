<?php

class ProductController extends BaseController
{
    public function index($sort, $show)
    {
        $viewPath = [
            'Views/frontend/products/product.php',
        ];
        $this->view($viewPath);
    }
}

?>