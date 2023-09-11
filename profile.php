<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <!-- подклчюение Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/AccountStyle.css">
</head>

<body>
<!-- шапка сайта -->
<div id="header_wrapper">
            <a href="IndexMain.php">
            <div class="header_logo">
                <img src="assets/img/logo1.png">
            </div> </a>

                <div class="header_tour" >
                    <a href="travelIndexFind.php" class="link-tour link-tour_search" >
                        <div class="link-tour_icon">
                            <img src="assets/img/loop.png" width="18" height="18">
                        </div>
                        <div class="link-tour_search">
                            Найти поездку
                        </div>
                    </a>

                    <a href="travelIndex.php" class="link-tour link-tour_create" >
                        <div class="link-tour_icon">
                            <img src="assets/img/plus.png" width="18" height="18">
                        </div>
                        <div class="link-tour_create">
                            Создать поездку
                        </div>
                    </a>
                </div>

            <div class="header_auth">
                    <a href="vendor/logout.php" class="logout">Выход</a>
            </div>
        </div>

    <!-- Профиль -->
    <section>

    <div class="main" style="display: flex;">
        <div class="avatar"><img src="<?= $_SESSION['user']['avatar'] ?>" width="450" alt=""></div>

        <div class="user_data">
            <h1>Ваши данные: </h1>
            <hr>
            <h2 style="color: #2196F3">ФИО: <?= $_SESSION['user']['full_name'] ?></h2>
            <h2 style="color: #43c77a;">Email: <?= $_SESSION['user']['email'] ?></h2>
            <h2>Номер телефона: <?= $_SESSION['user']['phone_number'] ?></h2>
            <h2>День рождения: <?= $_SESSION['user']['birthday'] ?></h2>
        </div>
    </div>

    <div class="user_info">
      <div class="user_data">
        <h1 >Данные вашей машины: </h1>
        <hr>
        <h2 style="color: #2196F3"> Марка: <?= $_SESSION ['carinfo']['Mark'] ?></h2>
        <h2 style="color: #43c77a;"> Модель: <?= $_SESSION['carinfo']['Model'] ?></h2>
        <h2> Гос. номер: <?= $_SESSION['carinfo']['GovNum'] ?></h2>
        <h2> Год выпуска: <?= $_SESSION['carinfo']['DevYear'] ?></h2>
        <h2> Кол-во сидячих мест: <?= $_SESSION['carinfo']['NumSeatPlace'] ?></h2>
        <a href="autoInfo.php" class="btn">Заполнить данные об авто</a>
    </div>

     <div class="user_data">
        <h1 >Данные о вашей поездке: </h1>
        <hr>
        <h2 style="color: #2196F3"> Город отправления: <?= $_SESSION['travel']['townFrom'] ?></h2>
        <h2 style="color: #43c77a;"> Город назначения: <?= $_SESSION['travel']['townTo'] ?></h2>
        <h2> Дата: <?= $_SESSION['travel']['date'] ?></h2>
        <h2> Марка автомобиля: <em><?= $_SESSION['travel']['carMark'] ?></em></h2>
        <h2> Модель автомобиля: <em><?= $_SESSION['travel']['carModel'] ?></em></h2>
        <h2> Гос. номер автомобиля: <em><?= $_SESSION['travel']['carGovNum'] ?></em></h2>
        <h2> Кол-во свободных мест: <em><?= $_SESSION['travel']['carNumSeatPlace'] ?></em></h2>
        <a href="travelIndexFind.php" class="btn">Записаться на поездку</a>
     </div>
    </div>
</section>
</body>
</html>
