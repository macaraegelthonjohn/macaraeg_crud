<?php
include 'db.php';

$id = $_GET['id'];

$stmt = $mysqli->prepare('DELETE FROM products WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();

header('Location: index.php');
exit;
?>
