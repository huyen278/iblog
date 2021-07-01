<?php

class BaseModel
{
    protected $conMysql;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "db_iblog";

    function __construct()
    {
        $this->connectMysql();
    }

    public function connectMysql()
    {
        $this->conMysql = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }

    function __destruct()
    {
        $this->conMysql->close();
    }
}
