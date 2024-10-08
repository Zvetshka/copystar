<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Copy Star - Главная</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Добро пожаловать в Copy Star</h1>
    <p class="text-center">Здесь вы можете купить копировальное оборудование.</p>

    <h2 class="mt-4">Навигация</h2>
    <div class="list-group">
        <a href="register.php" class="list-group-item list-group-item-action">Регистрация</a>
        <a href="login.php" class="list-group-item list-group-item-action">Вход</a>
        <a href="catalog.php" class="list-group-item list-group-item-action">Каталог товаров</a>
        <a href="cart.php" class="list-group-item list-group-item-action">Корзина</a>

        <?php
        session_start();
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            echo '<a href="admin.php" class="list-group-item list-group-item-action">Админ-панель</a>';
        }
        ?>

        <a href="about.php" class="list-group-item list-group-item-action">О нас</a>
        <a href="contact.php" class="list-group-item list-group-item-action">Где нас найти?</a>
    </div>
</div>
</body>
</html>
