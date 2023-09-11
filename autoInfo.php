<?php
    session_start();
    if ($_SESSION['user']) {
        $user_id = $_SESSION['user']['id'];
    }
    if (!$_SESSION['user']) {
    header('Location: /');
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Заполнение данных от авто</title>
    <link rel="stylesheet" href="assets/css/RegistrStyle.css">
</head>
<body>

    <!-- Форма регистрации -->

    <form action="vendor/car.php" method="post" enctype="multipart/form-data">
        <label>Марка автомобиля</label>
        <input type="text" name="Mark" placeholder="Введите марку авто">
        <label>Модель автомобиля</label>
        <input type="text" name="Model" placeholder="Введите мдель авто">
        <label>Год выпуска</label>
        <input type="number" name="DevYear" placeholder="Введите год выпуска">
        <label>Гос. номер</label>
        <input type="text" name="GovNum" placeholder="Введите гос. номер">
        <label>Количество сидячих мест</label>
        <input type="number" name="NumSeatPlace" placeholder="Введите кол-во сидячих мест">

        <button class="btn" type="submit"><h3>Сохранить</h3></button>

        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>