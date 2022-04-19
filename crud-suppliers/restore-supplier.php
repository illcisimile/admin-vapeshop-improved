<?php

require_once '../database/config.php';

$supplierID = $_POST['supplierID'];

$sql = "UPDATE suppliers SET is_deleted = '0' WHERE id = $supplierID";

$query = $connection->query($sql);

if ($query) {
    $response = array('success' => true, 'message' => 'Supplier restored.');
} else {
    $response = array('success' => false, 'message' => 'Error while restoring supplier.');
}

// Close database connection
$connection->close();

echo json_encode($response);
