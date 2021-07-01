<?php

class HomeController extends BaseController
{
    public function show()
    {
        $this->callModel("UserModel");
        $this->callView("master1", [
            "page" => "home",
            "data" => [
                "recent" => [
                    1 => [
                        "title" => "tít le tít le tít le tít le",
                        "brief" => "brief nè",
                        "img" => "https://media-cdn.laodong.vn/storage/newsportal/2021/5/24/912666/Doraemon-Luon-Ben-Ba.jpg"
                    ],
                    2 => [
                        "title" => "tít le",
                        "brief" => "<h1>haha</h1>",
                        "img" => "./assets/icon/logo.png"
                    ]
                ]
            ]
        ]);
    }
}
