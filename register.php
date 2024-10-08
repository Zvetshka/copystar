<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($name) && !empty($surname) && !empty($login) && !empty($email) && !empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users (name, surname, login, email, password) VALUES (?, ?, ?, ?, ?)");
        if ($stmt->execute([$name, $surname, $login, $email, $hashed_password])) {

            header('Location: index.php');
            exit();
        } else {
            echo "Ошибка при регистрации.";
        }
    } else {
        echo "Все поля обязательны для заполнения.";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация - Copy Star</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Регистрация</h1>
    <form method="post" class="mt-4">
        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="surname">Фамилия:</label>
            <input type="text" class="form-control" id="surname" name="surname" required>
        </div>
        <div class="form-group">
            <label for="login">Логин:</label>
            <input type="text" class="form-control" id="login" name="login" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="mt-4 btn btn-primary">Зарегистрироваться</button>
    </form>

    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-danger">Назад на главную</a>
    </div>
</div>

</body>
</html>
