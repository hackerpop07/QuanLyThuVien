<?php
include_once "../database/DBConnect.php";
include_once "../database/BooksDB.php";

class App
{
    public $booksDB;

    public function __construct()
    {
        $this->booksDB = new BooksDB();
    }

    public function add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            header('Location: add.php');
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            include_once "../class/Book.php";
            include_once "../database/BooksDB.php";
            $name = $_POST['name'];
            $price = $_POST['price'];
            $author = $_POST['author'];
            $quatity = $_POST['quatity'];
            $image = $_POST['image'];
            $book = new Book($name, $author, $price, $image, $quatity);
            $this->booksDB->add($book);
            header('Location: list.php');
        }
    }
}