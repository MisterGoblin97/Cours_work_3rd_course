<?php
require_once "../vendor/connect.php";

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('select * from towns where id = ?');
    $stmt->execute([$_GET['id']]);
    $town = $stmt->fetch();

    if ($town) {
        $stmt = $pdo->prepare('delete from towns where id = ?');
        $stmt->execute([$_GET['id']]);

        unlink(dirname(dirname(__FILE__)) . '/' . $town['picture']);
    }
}

header('Location: indexAdmin.php');
?>