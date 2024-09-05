<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    $stmt = $mysqli->prepare('UPDATE products SET name = ?, price = ?, quantity = ?, description = ? WHERE id = ?');
    $stmt->bind_param('sdssi', $name, $price, $quantity, $description, $id);
    $stmt->execute();

    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$stmt = $mysqli->prepare('SELECT * FROM products WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
</head>
<body>
    <h1>Update Product</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
        <br>
        <label>Price:</label>
        <input type="text" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>
        <br>
        <label>Quantity:</label>
        <input type="number" name="quantity" value="<?php echo htmlspecialchars($product['quantity']); ?>" required>
        <br>
        <label>Description:</label>
        <textarea name="description"><?php echo htmlspecialchars($product['description']); ?></textarea>
        <br>
        <button type="submit">Update Product</button>
    </form>
</body>
</html>
