<?php
include_once "../database/BooksDB.php";
$bookDB = new BooksDB();
$id=$_GET["id"];
var_dump($id);
$bookDB->deleteById($id);
header('Location: list.php');
?>