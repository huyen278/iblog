<?php

class BaseController
{
    const HEADER = 'Views/frontend/header/header.php';
    const FOOTER = 'Views/frontend/footer/footer.php';

    public function view(array $path = [])
    {
       require BaseController::HEADER;

       foreach ($path as $val) {
           require $val;
       }

       require BaseController::FOOTER;
    }
}

?>