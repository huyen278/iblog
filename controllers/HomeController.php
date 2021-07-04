<?php

class HomeController extends BaseController
{
    public function show()
    {
        $PostModel = $this->callModel("PostModel");
        $recents = $PostModel->listRecents();
        $mostviews = $PostModel->listMostviews();
        $this->callView("master1", [
            "page" => "home",
            "data" => [
                "recent" => $recents,
                "mostview" => $mostviews
            ]
        ]);
    }
}
