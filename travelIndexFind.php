<?php
 session_start();

require_once "vendor/connect.php";

    if (!$_SESSION['user']) {
    header('Location: /register.php');
    }
  // Подключаемся к базе данных

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
    <link rel="stylesheet" type="text/css" href='assets/css/footer.css'>
    <link rel="stylesheet" type="text/css" href="assets/css/travelFindStyle.css">
 </head>
<body>
<div id="header_wrapper">
  <a href="IndexMain.php">
            <div class="header_logo">
                <img src="assets/img/logo1.png">
            </div>
    </a>

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
                    <a href="register.php" class="header_auth-link">
                      Ваш аккаунт
                    </a>
            </div>
        </div>
        <br>
  <div class="div-main">
  <h2 class="discription">
           Выгодные междугородние поездки<br> для Пассажиров и Водителей
    </h2>
  <form  method="post" class="travel-con">
    <label for="townFrom"><b>Откуда:</b></label>
    <input type="text" name="townFrom" id="townFrom"><br>

    <label for="townTo"><b>Куда:</b></label>
    <input type="text" name="townTo" id="townTo"><br>

    <input type="submit" name="submit" value="Найти">
  </form>


</body>
</html>

<?php
if(isset($_POST['submit'])):
  // Получаем значения полей ввода
  $townFrom = mysqli_real_escape_string($connect, $_POST['townFrom']);
  $townTo = mysqli_real_escape_string($connect, $_POST['townTo']);

  // Формируем SQL-запрос для выборки записей из базы данных
  $sql = "SELECT travel.id, travel.townFrom, travel.townTo, travel.date, carinfo.Mark, carinfo.Model, carinfo.GovNum, carinfo.NumSeatPlace
          FROM travel
          INNER JOIN carinfo ON travel.car_id = carinfo.ID_car
          WHERE townFrom = '$townFrom' OR townTo = '$townTo'";

  // Выполняем запрос
  $result = mysqli_query($connect, $sql);

  // Проверяем наличие результатов
  if(mysqli_num_rows($result) > 0) : ?>
    <div class='table-con'>
        <table class='tbl'>
    <tr><th><h2>Откуда</h2></th><th><h2>Куда</h2></th><th><h2>Дата</h2></th><th><h2>Марка автомобиля</h2></th><th><h2>Модель</h2></th><th><h2>Рег. номер</h2></th><th><h2>Свободных мест</h2></th><th></th></tr>
    <?php while($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
    <td><?= $row['townFrom'] ?></td>
     <td class='td_border-left'><?= $row['townTo']?></td>
     <td class='td_border-left'><?= $row['date']?></td>
     <td class='td_border-left'><?= $row['Mark']?></td>
     <td class='td_border-left'><?= $row['Model']?></td>
     <td class='td_border-left'><?= $row['GovNum']?></td>
     <td class='td_border-left'><?= $row['NumSeatPlace']?></td>
      <td><a href="vendor/bookTravel.php?id=<?= $row['id'] ?>">Забронировать</a></td> <!-- Кнопка бронирования -->
      </tr>
      <?php endwhile; ?>
    </table><br></div><br></div>
  <?php else: ?>
    <p>По вашему запросу ничего не найдено</p>
<?php endif;  endif;
?>