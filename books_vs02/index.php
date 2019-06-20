<?php
include_once "class/App.php";
include_once "database/BooksDB.php";
include_once "database/DBConnect.php";
include_once "class/Book.php";
$app = new App();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;
switch ($page) {
    case "add":
        $app->add();
        break;
    case "delete":
        $app->delete();
        break;
    case "update":
        $app->update();
        break;
    default:
        $app->listPHP();
        break;
}