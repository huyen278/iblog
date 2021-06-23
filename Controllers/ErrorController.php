<?php

class ErrorController extends BaseController
{
    public function show()
    {
        http_response_code(404);
        $this->callView("master1", [
            "page" => "error"
        ]);
    }
}
