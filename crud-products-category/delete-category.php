<?php

require_once '../database/config.php';

$categoryID = $_POST['categoryID'];

$sql = "DELETE FROM products_category WHERE id = $categoryID";

$query = $connection->query($sql);

if ($query) {
    $response = array('success' => true, 'message' => 'Category deleted.');
} else {
    $response = array('success' => false, 'message' => 'Error while deleting category.');
}

// Close database connection
$connection->close();

echo json_encode($response);
