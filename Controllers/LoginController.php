<?php

class LoginController extends BaseController
{
    public function show()
    {
        $this->callView("master2", [
            "page" => "login"
        ]);
    }

    public function signin()
    {
        var_dump($_SERVER['REQUEST_URI']);
        //header('Location: ./Dashboard');
        if (isset($_POST['submit'])/* && isset($_POST['inputPassword'])*/) {
            var_dump($_SERVER['REQUEST_URI']);
        }
    }
}
