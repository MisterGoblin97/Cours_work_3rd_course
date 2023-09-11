<?php
session_start();
require_once "connect.php";

$travel_id=$_GET['id'];
$user_id=$_SESSION['user']['id'];

if (!$_SESSION['user']) {
    header('Location: ../register.php');
}

// Подключаемся к базе данных
$query = "INSERT INTO traveluser (travel_id, user_id) VALUES ('$travel_id', '$user_id')";
mysqli_query($connect, $query);

// Получаем данные о поездке и машине из базы данных
$query = "SELECT travel.townFrom, travel.townTo, travel.date, carinfo.Mark, carinfo.Model, carinfo.GovNum, carinfo.NumSeatPlace
          FROM travel
          INNER JOIN carinfo ON travel.car_id = carinfo.ID_car
          WHERE travel.id = '$travel_id'";

$query_set = "UPDATE carinfo 
              SET NumSeatPlace = NumSeatPlace - 1 
              WHERE ID_car = (SELECT car_id FROM travel WHERE id = '$travel_id')";

$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

// Обновляем количество свободных мест в машине
mysqli_query($connect, $query_set);

// Сохраняем данные о поездке и машине в $_SESSION
$_SESSION['travel'] = [
  'townFrom' => $row['townFrom'],
  'townTo' => $row['townTo'],
  'date' => $row['date'],
  'carMark' => $row['Mark'],
  'carModel' => $row['Model'],
  'carGovNum' => $row['GovNum'],
  'carNumSeatPlace' => $row['NumSeatPlace']
];

// Перенаправляем пользователя на страницу профиля
header('Location: ../profile.php');
?>
