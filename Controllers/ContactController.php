<?php

class ContactController extends BaseController
{
    public function index()
    {
        $viewPath = [
            'Views/frontend/contact/contact.php',
        ];
        $this->view($viewPath);
    }
}

?>