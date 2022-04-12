<?php

require_once '../database/config.php';

$productID = $_POST['productID'];

$sql = "DELETE FROM products WHERE id = $productID";

$query = $connection->query($sql);

if ($query) {
    $response = array('success' => true, 'message' => 'Product deleted.');
} else {
    $response = array('success' => false, 'message' => 'Error while deleting product.');
}

// Close database connection
$connection->close();

echo json_encode($response);
