<?php

    $connect = mysqli_connect('localhost:3306', 'root', 'root', 'test');

    if (!$connect) {
        die('Error connect to DataBase');
    }

    $pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

    ?>