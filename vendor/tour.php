<?php

session_start();
require_once 'connect.php';

$User_id = $_SESSION['user']['id'];
$Car_id = $_SESSION['carinfo']['ID_car'];

$TownFrom = $_POST["TownFrom"];
$TownTo = $_POST["TownTo"];
$Date = $_POST["Date"];

mysqli_query($connect, "INSERT INTO `travel` (`travel_id `, `TownFrom`, `TownTo`, `Date`, `Car_id`, `User_id`)
VALUES (NULL, '$TownFrom', '$TownTo', '$Date', '$Car_id', '$User_id')");

$travel_query = mysqli_query($connect, "SELECT * FROM `travel` WHERE `User_ID` = '$User_id' AND `Car_Id` = '$Car_id'");
if (mysqli_num_rows($travel_query) > 0) {

    $travel = mysqli_fetch_assoc($travel_query);

    $_SESSION['travel'] = [
        "travel_id" => $travel['travel_id'],
        "TownFrom" => $travel['TownFrom'],
        "TownTo" => $travel['TownTo'],
        "Date" => $travel['Date'],
        "Car_id" => $travel['Car_Id'],
        "User_id" => $travel['User_ID']
    ];
}

header('Location: ../profile.php');
