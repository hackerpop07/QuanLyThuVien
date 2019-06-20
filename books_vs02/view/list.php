
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
    <a href="index.php?page=add"><input class="add" type="button" value="ADD"></a>
    <h2 id="tieude">Danh sách</h2>
    <table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Tác Giả</td>
            <td>Giá Bán</td>
            <td>Ảnh</td>
            <td>Số Lượng</td>

        </tr><?php
        foreach ($books as $value): ?>
            <tr>
                <td><?php echo $value->id; ?></td>
                <td><?php echo $value->name; ?></td>
                <td><?php echo $value->author; ?></td>
                <td><?php echo $value->price; ?></td>
                <td><?php echo $value->image; ?></td>
                <td><?php echo $value->quatity; ?></td>
                <td>
                    <a type="btn" href="index.php?page=update&id=<?php echo $value->id; ?>">Edit</a>
                </td>
                <td>
                    <a type="btn" href="index.php?page=delete&id=<?php echo $value->id; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    #tieude {
        text-align: center;
    }


    .profile img {
        width: 100%;
    }

    .add {
        border-radius: 2px;
        padding: 10px 32px;
        font-size: 16px;
    }
    a{
        width: 80px;
        height: 30px;
        display: inline-block;
        background: #fff9e6;
        border: 1px solid;
        text-align: center;
        line-height: 30px;
        color: #ff2d21;
    }
    a:hover{
        background: #00A000;
        color: white;
    }
</style>
