<?php
session_start();
require_once 'connect.php';

$login = $_POST['login'];
$password = md5($_POST['password']);

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");



if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);

    // Проверяем, является ли пользователь админом
    if ($login === "admin" && $password === md5("admin11")) {
        header('Location: ../admin/indexAdmin.php'); // Переходим на страницу админа
        exit();
    }

    $_SESSION['user'] = [
        "id" => $user['id'],
        "full_name" => $user['full_name'],
        "avatar" => $user['avatar'],
        "email" => $user['email'],
        "birthday" => $user['birthday'],
        "phone_number" => $user['phone_number']
    ];

    $user_id = $_SESSION['user']['id'];

    $car_query = mysqli_query($connect, "SELECT * FROM `carinfo` WHERE `user_id` = '$user_id'");

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

    header('Location: ../profile.php');

} else {
    $_SESSION['message'] = 'Не верный логин или пароль';
    header('Location: ../index.php');
}

    ?>

<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>
