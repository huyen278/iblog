<?php

class HomeController extends BaseController
{
    public function show()
    {
        $this->callView("master1", [
            "page" => "home"
        ]);
    }
}
