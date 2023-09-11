<?php

    session_start();
    require_once 'connect.php';

    $user_id = $_SESSION['user']['id'];

    $Mark = $_POST['Mark'];
    $Model = $_POST['Model'];
    $DevYear = $_POST['DevYear'];
    $GovNum = $_POST['GovNum'];
    $NumSeatPlace = $_POST['NumSeatPlace'];


        mysqli_query($connect, "INSERT INTO `carinfo` (`ID_car`, `user_id`, `Mark`, `Model`, `DevYear`, `GovNum`, `NumSeatPlace`)
        VALUES (NULL, '$user_id', '$Mark', '$Model', '$DevYear', '$GovNum', '$NumSeatPlace')");


    $car_query = mysqli_query($connect, "SELECT * FROM `carinfo` WHERE `user_id` = '$user_id'");
    if (mysqli_num_rows($car_query) > 0) {

        $carinfo = mysqli_fetch_assoc($car_query);

       $_SESSION['carinfo'] = [
        "ID_car" => $carinfo['ID_car'],
        "user_id" => $carinfo['user_id'],
        "Mark" => $carinfo['Mark'],
        "Model" => $carinfo['Model'],
        "DevYear" => $carinfo['DevYear'],
        "NumSeatPlace" => $carinfo['NumSeatPlace'],
        "GovNum" => $carinfo['GovNum']

        ];
}

header('Location: ../profile.php');
?>

