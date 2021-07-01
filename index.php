<?php

session_start();
require_once "./core/app.php";
require_once "./controllers/BaseController.php";
require_once "./models/BaseModel.php";
error_reporting(0);
header("Content-Security-Policy: default-src 'self'; img-src * data:; script-src 'self'; object-src 'none'; frame-src 'none'; base-uri 'none';");
$myApp = new App();
