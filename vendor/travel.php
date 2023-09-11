<?php
session_start();
require_once "connect.php";



    $user_id = $_SESSION['carinfo']['user_id'];
    $car_id = $_SESSION['carinfo']['ID_car'];

    $townFrom = $_POST['townFrom'];
    $townTo = $_POST['townTo'];
    $date = $_POST['date'];

    mysqli_query($connect, "INSERT INTO `travel` (`id`, `townFrom`, `townTo`, `date`, `user_id`, `car_id`)
    VALUES (NULL, '$townFrom', '$townTo', '$date', '$user_id', '$car_id')");



    $travel_query = mysqli_query($connect, "SELECT * FROM `travel` WHERE `user_id` = '$user_id' and `car_id` = '$car_id'");
    if (mysqli_num_rows($travel_query) > 0) {

        $travel = mysqli_fetch_assoc($travel_query);

$_SESSION['travel'] = [
    "id" => $travel['id'],
    "townFrom" => $travel['townFrom'],
    "townTo" => $travel['townTo'],
    "date" => $travel['date'],
    "user_id" => $travel['user_id'],
    "car_id" => $travel['car_id'],
    "carMark" => $_SESSION['carinfo']['Mark'],
    "carModel" => $_SESSION['carinfo']['Model'],
    "carGovNum" => $_SESSION['carinfo']['GovNum'],
    "carNumSeatPlace" => $_SESSION['carinfo']['NumSeatPlace']
];

        $_POST['message1'] = 'Ваша поездка создана успешно';

}else{
    $_POST['message1'] = 'Ваша поездка не создана успешно';
}

header('Location: ../profile.php');
?>
