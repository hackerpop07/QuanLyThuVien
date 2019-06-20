<?php
include_once "../database/DBConnect.php";
include_once "../database/BooksDB.php";
include_once "../class/Book.php";

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
            include "view/add.php";
        } else {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $author = $_POST['author'];
            $quatity = $_POST['quatity'];
            $image = $_POST['image'];
            $book = new Book($name, $author, $price, $image, $quatity);
            $this->booksDB->add($book);
            header('Location: index.php');
        }
    }

    public function listPHP()
    {
        $books = $this->booksDB->getAll();
        include 'view/list.php';
    }

    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            include "view/delete.php";
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_GET["id"];
            $this->booksDB->deleteById($id);
            header('Location: index.php');
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $book = $this->booksDB->getBookById($_GET['id']);
            include "view/update.php";
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_GET['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $author = $_POST['author'];
            $quatity = $_POST['quatity'];
            $image = $_POST['image'];
            $book = new Book($name, $author, $price, $image, $quatity);
            $this->booksDB->update($book, $id);
            header('Location: index.php');
        }
    }
}