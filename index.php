<?php

session_start();
require_once "./core/app.php";
require_once "./controllers/BaseController.php";
require_once "./models/BaseModel.php";
//header("Content-Security-Policy: default-src 'self'");
$myApp = new App();
