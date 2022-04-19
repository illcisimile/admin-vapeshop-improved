<?php

require_once '../database/config.php';

$supplierID = $_POST['supplierID'];

$sql = "DELETE FROM suppliers WHERE id = $supplierID";

$query = $connection->query($sql);

if ($query) {
    $response = array('success' => true, 'message' => 'Supplier deleted.');
} else {
    $response = array('success' => false, 'message' => 'Error while deleting supplier.');
}

// Close database connection
$connection->close();

echo json_encode($response);
