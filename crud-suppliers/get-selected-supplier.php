<?php

require_once '../database/config.php';

$supplierID = $_POST['supplierID'];

$sql = "SELECT * FROM suppliers WHERE id = $supplierID";

$query = $connection->query($sql);

$result = $query->fetch_assoc();

$connection->close();

echo json_encode($result);
