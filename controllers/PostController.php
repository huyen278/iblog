<?php

class PostController extends BaseController
{
    public function show($slug = null)
    {
        if ($slug == null) {
            header("Location: /error");
            return;
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
    public function edit($slug = null)
    {
        if ($slug == null || !isset($_SESSION['id']) || $_SESSION['id'] == '') {
            header("Location: /error");
            return;
        } else {
            $PostModel = $this->callModel("PostModel");
            $data = $PostModel->isOwner($_SESSION['id'], $slug);
            if ($data != []) {
                $this->callView("master1", [
                    "page" => "edit",
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
