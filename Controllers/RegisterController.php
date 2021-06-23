<?php

class RegisterController extends BaseController
{
    public function show()
    {
        $this->callView("master2", [
            "page" => "register"
        ]);
    }

    public function signin()
    {
    }
}
