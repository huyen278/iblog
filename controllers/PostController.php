<?php

class PostController extends BaseController
{
    public function show($slug = null)
    {
        if ($slug == null) {
            header("Location: /error");
        } else {
            $PostModel = $this->callModel("PostModel");
            $data = $PostModel->viewPost($slug);
            if ($data != []) {
                $this->callView("master1", [
                    "page" => "view",
                    "data" => [
                        "data" => $data
                    ]
                ]);
            } else {
                $this->callView("master1", [
                    "page" => "error"
                ]);
            }
        }
    }
}
