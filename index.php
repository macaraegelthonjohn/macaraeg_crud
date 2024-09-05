<?php
include 'db.php';

$result = $mysqli->query('SELECT * FROM products');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product CRUD Application</title>
</head>
<body>
    <h1>Products</h1>
    <a href="create.php">Add New Product</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
        <?php while ($product = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($product['id']); ?></td>
            <td><?php echo htmlspecialchars($product['name']); ?></td>
            <td><?php echo htmlspecialchars($product['price']); ?></td>
            <td><?php echo htmlspecialchars($product['quantity']); ?></td>
            <td><?php echo htmlspecialchars($product['description']); ?></td>
            <td><?php echo htmlspecialchars($product['created_at']); ?></td>
            <td><?php echo htmlspecialchars($product['updated_at']); ?></td>
            <td>
                <a href="update.php?id=<?php echo $product['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
