<?php

require_once '../database/config.php';

$categoryID = $_POST['categoryID'];

$sql = "SELECT * FROM products_category WHERE id = $categoryID";

$query = $connection->query($sql);

$result = $query->fetch_assoc();

$connection->close();

echo json_encode($result);
