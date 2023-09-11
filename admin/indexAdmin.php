<?php
require_once "../vendor/connect.php";


$stmt = $pdo->query("select * from towns");
$towns = $stmt->fetchAll();


?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ панель</title>
    <link rel="stylesheet" href="../assets/css/adminStyle.css">
</head>
<body>
    <header>
        <h1>Админ панель</h1>
        <div>
        <button class="add" onclick="location.href='add.php'">Добавить</button> <!-- Кнопка добавления -->
        <button class="add"  onclick="location.href='../IndexMain.php'">На главную</button> <!-- Кнопка добавления -->
    </div>
    </header>

        <h2>Добавленные маршруты</h2>
        <div class="admin-panel">

            <?php foreach ($towns as $town) : ?>
            <div class="admin_element">
                <img src="http://krestinenko/<?= $town['picture'] ?>" />
                <p> <?php echo $town['townName'] ?></p>

                <div class="admin-btn">
                    <button class="edit" onclick="location.href='edit.php?id=<?= $town['id'] ?>'">Изменить</button> <!-- Кнопка редактирования -->
                    <button class="delete" onclick="if(confirm('Вы действительно хотите удалить это фото?')) location.href='remove.php?id=<?= $town['id'] ?>'">Удалить</button> <!-- Кнопка удаления -->
                </div>
    	    </div>
            <?php endforeach; ?>
        </div>

</body>
</html>