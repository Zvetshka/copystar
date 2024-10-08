<?php
include 'db.php';
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "Доступ запрещен.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель - Copy Star</title>
</head>
<body>

<h1>Админ-панель</h1>

<h2>Управление товарами</h2>

<a href="index.php">Назад на главную</a>

</body>
</html>