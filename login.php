<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $stmt->execute([$login]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header("Location: index.php");
        exit;
    } else {
        echo "Неверный логин или пароль.";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход - Copy Star</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Вход</h1>
    <form method="post" class="mt-4">
        <div class="form-group">
            <label for="login">Логин:</label>
            <input type="text" class="form-control" id="login" name="login" required>
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class=" mt-4 btn btn-primary btn-block">Войти</button>
    </form>

    <div class="text-center mt-4">
        <a href="index.php" class="btn btn btn btn-danger">Назад на главную</a>
    </div>
</div>

</body>
</html>

