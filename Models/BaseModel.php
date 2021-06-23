<?php

class BaseModel
{
    protected $conMysql;

    function __construct()
    {
        $this->connectMysql();
    }

    public function connectMysql()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "db_personal_blog";

        $this->conMysql = mysqli_connect($dbhost, $dbuser, $dbpass);
        mysqli_select_db($this->conMysql, $dbname);
        mysqli_query($this->conMysql, "SET NAMES 'utf8'");
    }
}
