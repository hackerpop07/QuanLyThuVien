<?php


class DBConnect
{
    private $dsn;
    private $useName;
    private $password;

    public function __construct($dsn = "mysql:host=localhost;dbname=QuanLyThuVien", $useName = "root", $password = "123456@Abc")
    {
        $this->dsn = $dsn;
        $this->useName = $useName;
        $this->password = $password;
    }

    public function connect()
    {
        try {
            $conn = new PDO($this->dsn, $this->useName, $this->password);
            return $conn;
        } catch (PDOException $exception) {
            echo $exception;
        }
    }
}