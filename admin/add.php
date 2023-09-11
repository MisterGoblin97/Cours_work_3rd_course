<?php
require_once "../vendor/connect.php";

if ( !empty($_POST['townName']) ) {
    $apppath = dirname(dirname(__FILE__));
    $filepath = 'uploads/' . time() . basename($_FILES['file']['name']);
    $uploadfile = $apppath . '/' . $filepath;

    move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
    $stmt = $pdo->prepare("insert into towns(townName, price, picture) values(?,?,?)");
    $stmt->execute([
       $_POST['townName'],
       $_POST['price'],
       $filepath
    ]);

    header("Location: indexAdmin.php");
 }


?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление города</title>
    <link rel="stylesheet" href="../assets/css/admin.css">   
</head>
<body>
    <form action="add.php" method="post" enctype="multipart/form-data">
        <input required name="townName" type="text" placeholder="Название">
        <input required name="price" type="number">
        <input required name="file" type="file">
        <input type="submit" value="Создать">
    </form>
</body>
</html>