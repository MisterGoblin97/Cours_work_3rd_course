<?php
session_start();
require_once 'connect.php';

//подключаем библиотеку PHPMailer для отправки подтвержедния на почту
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';
require_once 'PHPMailer/Exception.php';

$full_name = $_POST['full_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$phone_number = $_POST['phone_number'];
$birthday = $_POST['birthday'];

$lenPas = strlen($_POST["password"]);
// Проверяем, существует ли пользователь с таким email
$check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
if (mysqli_num_rows($check_email) > 0) {
    $_SESSION['message'] = 'Пользователь с таким email уже зарегистрирован';
    header('Location: ../register.php');
    exit();
}

if ($lenPas <= 8){
    $_SESSION['message'] = 'Пароль не может быть меньше 8 символов';
    header('Location: ../register.php');
    exit();
}


if ($password === $password_confirm) {

    $path = 'uploads/' . time() . $_FILES['avatar']['name'];
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = 'Ошибка при загрузке сообщения';
        header('Location: ../register.php');
    }

    $password = md5($password);

    mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`, `phone_number`, `birthday`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path', '$phone_number','$birthday')");

    //Отправляем сообщение на email пользователя с подтверждением регистрации
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail ->CharSet = 'utf-8';
    $mail->setLanguage("ru");
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl'; // ssl если используется SSL, иначе - tls
    $mail->Host = 'smtp.mail.ru'; // SMTP сервер
    $mail->Port = 465; // Порт SMTP сервера
    $mail->Username = 'roadmate@mail.ru'; // Логин на почте
    $mail->Password = 'dZEeqJbcqQdQs49WGTn0'; // Пароль на почте
    $mail->setFrom('roadmate@mail.ru', 'Road Mate'); // От кого
    $mail->addAddress($email); // Кому
    $mail->Subject = 'Подтверждение регистрации'; // Тема письма
    $mail->msgHTML('Поздравляем с регистрацией на сайте RoadMate. Желаем хорошего пользования.'); // Текст письма
    $mail->send();

    $_SESSION['message'] = 'Регистрация прошла успешно!';
    header('Location: ../index.php');


} else {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../register.php');
}


?>
