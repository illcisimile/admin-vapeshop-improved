<?php

require_once '../database/config.php';

$productID = $_POST['productID'];

$sql = "SELECT * FROM products WHERE id = $productID";

$query = $connection->query($sql);

$result = $query->fetch_assoc();

$connection->close();

echo json_encode($result);
