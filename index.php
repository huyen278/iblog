<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
//error_reporting(0);
header("Content-Security-Policy: default-src 'self'; img-src 'self' data:; script-src 'self'; object-src 'none'; frame-src 'none'; base-uri 'none';");
header_remove("Server");

//session_name('sessione');
session_start();
require_once './core/app.php';
require_once './controllers/BaseController.php';
require_once './models/BaseModel.php';
$myApp = new App();
