<?php

require_once '../database/config.php';

$supplierID = $_POST['supplierID'];

$sql = "UPDATE suppliers SET is_deleted = '1' WHERE id = $supplierID";

$query = $connection->query($sql);

if ($query) {
    $response = array('success' => true, 'message' => 'Supplier removed.');
} else {
    $response = array('success' => false, 'message' => 'Error while removing supplier.');
}

// Close database connection
$connection->close();

echo json_encode($response);
