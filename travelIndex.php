<?php
    session_start();

    if (!$_SESSION['user']) {

    header('Location: /register.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Заполнение данных от авто</title>
   <!-- подклчюение Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/travelStyle.css">
</head>
<script src="assets/js/script.js"></script>
<body>
    <!-- шапка -->
<div id="header_wrapper">
    <a href="IndexMain.php">
            <div class="header_logo">
                <img src="assets/img/logo1.png">

            </div>
    </a>
                <div class="header_tour">
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
                    <a href="register.php" class="header_auth-link">
                      Ваш аккаунт
                    </a>
            </div>
        </div>
        <br>

<div class="main-board carpooling">
    <h2>
           Выгодные междугородние поездки<br> для Пассажиров и Водителей
    </h2>
    <div class="search-wrapp">
    <div class="search_container">
        <form action="vendor/travel.php" method="POST" enctype="multipart/form-data">
            <label>Город отправления</label>
            <input type="text" name="townFrom" placeholder="Введите город">
            <label>Город прибытия</label>
            <input type="text" name="townTo" placeholder="Введите город">
            <label>Желаемая дата</label>
            <input type="date" name="date" placeholder="Введите дату">

            <button class="btn" type="submit"><h3>Сохранить</h3></button>
    </div>

            <?php
                if ($_SESSION['message1']) {
                    echo '<p class="msg"> ' . $_SESSION['message1'] . ' </p>';
                }
                unset($_SESSION['message1']);
            ?>
        </form>
    </div>
</div>
</body>
</html>