<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "../class/Book.php";
    include_once "../database/BooksDB.php";
    $name = $_POST['name'];
    $price = $_POST['price'];
    $author = $_POST['author'];
    $quatity = $_POST['quatity'];
    $image = $_POST['image'];
    $book = new Book($name, $author, $price, $image, $quatity);
    $bookDB = new BooksDB();
    $bookDB->add($book);
    header('Location: list.php');
}
?>
<!doctype html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" class="profile">
    <input id="name" name="name" required placeholder="Tên sản phẩm">
    <span class="error">*</span>
    <br>
    <input id="price" name="price" required type="number" placeholder="Giá bán">
    <span class="error">*</span>
    <br>
    <input id="author" name="author" required placeholder="Tác giả">
    <span class="error">*</span>
    <br>
    <input id="quatity" name="quatity" required placeholder="Số lượng" type="number">
    <span class="error">*</span>
    <br>
    <input id="image" name="image" required placeholder="image" type="file">
    <br>
    <input id="submit" type="submit" value="ADD">
    <br>
</form>
<style>
    #name, #price, #author, #quatity, #image {
        width: 200px;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        padding: 12px 10px 12px 10px;
    }

    #submit {
        border-radius: 2px;
        padding: 10px 32px;
        font-size: 16px;
    }

    .profile {
        height: auto;
        width: 1000px;
        overflow: hidden;
    }

    .error {
        color: #FF0000;
    }

</style>

</body>
</html>


