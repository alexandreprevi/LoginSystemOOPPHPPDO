<?php

class Dbh
{
    private $host = "localhost";
    private $user = "root";
    private $password = "root123456";
    private $dbN = "loginsystemuppgift";

    protected function connect()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->dbN";
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
