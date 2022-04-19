<?php

require_once '../database/config.php';

$stockID = $_POST['stockID'];

$sql = "SELECT * FROM products WHERE id = $stockID";

$query = $connection->query($sql);

$result = $query->fetch_assoc();

$connection->close();

echo json_encode($result);
