<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    $stmt = $mysqli->prepare('INSERT INTO products (name, price, quantity, description) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('sdss', $name, $price, $quantity, $description);
    $stmt->execute();

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h1>Add New Product</h1>
    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" required>
        <br>
        <label>Price:</label>
        <input type="text" name="price" required>
        <br>
        <label>Quantity:</label>
        <input type="number" name="quantity" required>
        <br>
        <label>Description:</label>
        <textarea name="description"></textarea>
        <br>
        <button type="submit">Add Product</button>
    </form>
</body>
</html>
