<?php
include 'db.php';
session_start();

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог товаров - Copy Star</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
if (isset($_GET['add'])) {
    $product_id = $_GET['add'];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = 1;
    } else {
        $_SESSION['cart'][$product_id]++;
    }
    header("Location: catalog.php");
    exit;
}
?>

<div class="container mt-5">
    <h1 class="text-center">Каталог товаров</h1>

    <div class="row mt-4">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $product['name']; ?></h3>
                        <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>" class="img-fluid mb-2">
                        <p class="card-text">Цена: <strong><?php echo $product['price']; ?> руб.</strong></p>
                        <p class="card-text">Описание: <?php echo $product['description']; ?></p>
                        <a href="product.php?id=<?php echo $product['id']; ?>" class="btn btn-secondary">Подробнее</a>
                        <a href="catalog.php?add=<?php echo $product['id']; ?>" class="btn btn-success">В корзину</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="text-center mt-4">
        <a href="cart.php" class="btn btn-primary">Перейти в корзину</a>
        <a href="index.php" class="btn btn-danger">Назад на главную</a>
    </div>
</div>

</body>
</html>
