<?php

class DashboardController extends BaseController
{
    public function show()
    {
        $this->callView("master1", [
            "page" => "dashboard"
        ]);
    }
}
