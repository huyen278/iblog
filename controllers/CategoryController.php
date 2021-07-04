<?php

class CategoryController extends BaseController
{
    public function show($cat = null)
    {
        $PostModel = $this->callModel("PostModel");
        $posts = $PostModel->listPostCate($cat);
        if ($cat == null) {
            header("Location: /error");
        } else {
            $this->callView("master1", [
                "page" => "category",
                "data" => [
                    "posts" => $posts
                ]
            ]);
        }
    }

    public function getCategories()
    {
        $PostModel = $this->callModel("PostModel");
        return $PostModel->listCategories();
    }
}
