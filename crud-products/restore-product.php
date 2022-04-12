<?php

require_once '../database/config.php';

$productID = $_POST['productID'];

$sql = "UPDATE products SET is_deleted = '0' WHERE id = $productID";

$query = $connection->query($sql);

if ($query) {
    $response = array('success' => true, 'message' => 'Product restored.');
} else {
    $response = array('success' => false, 'message' => 'Error while restoring product.');
}

// Close database connection
$connection->close();

echo json_encode($response);
