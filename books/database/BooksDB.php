<?php
include_once "DBConnect.php";
include_once "../class/Book.php";

class BooksDB
{
    private $conn;

    public function __construct()
    {
        $DB = new DBConnect();
        $this->conn = $DB->connect();
    }

    public function add($obj)
    {
        $sql = "INSERT INTO `books`(`name`, `author`, `price`, `image`, `quatity`) VALUES (?,?,?,?,?)";
        $data = array($obj->name, $obj->author, $obj->price, $obj->image, $obj->quatity);
        $this->conn->prepare($sql)->execute($data);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `books`";
        $data = $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $arrayBooks = array();
        foreach ($data as $value) {
            $book = new Book($value['name'], $value['author'], $value['price'], $value['image'], $value['quatity'], $value['id']);
            array_push($arrayBooks, $book);
        }
        return $arrayBooks;
    }

    public function getBookById($id)
    {
        $sql = "SELECT * FROM `books` WHERE id =" . $id;
        $value = $this->conn->query($sql)->fetch(PDO::FETCH_ASSOC);
        $book = new Book($value['name'], $value['author'], $value['price'], $value['image'], $value['quatity']);
        return $book;
    }

    public function deleteById($id)
    {
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Câu SQL
        $sql = "DELETE FROM `books` WHERE id=" . $id;
        // Prepared câu SQL
        $stmt = $this->conn->prepare($sql);
        // Thực thi câu SQL
        $stmt->execute();
    }

    public function update($obj, $id)
    {

        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Câu SQL
        $sql = "UPDATE `books` SET `name`=?,`author`=?,`price`=?,`image`=?,`quatity`=? WHERE id=?";
        // Prepared câu SQL
        $array = [$obj->name, $obj->author, $obj->price, $obj->image, $obj->quatity, $id];
        $stmt = $this->conn->prepare($sql);
        // Thực thi câu SQL
        $stmt->execute($array);
    }
}