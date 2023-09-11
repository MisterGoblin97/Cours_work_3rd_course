<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['carinfo']);
unset($_SESSION['travel']);
header('Location: ../index.php');
?>