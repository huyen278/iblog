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
    }
}
