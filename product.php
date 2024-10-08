<?php
include 'db.php';
session_start();

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {
    echo "Товар не найден.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?> - Copy Star</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center"><?php echo $product['name']; ?></h1>
    <p class="text-center">Цена: <strong><?php echo $product['price']; ?> руб.</strong></p>
    <p class="text-center">Описание: <?php echo $product['description']; ?></p>

    <div class="text-center mt-4">
        <a href="catalog.php" class="btn btn-secondary">Назад к каталогу</a>
        <a href="index.php" class="btn btn btn-danger">Назад на главную</a>
    </div>
</div>
</body>
</html>

