<?php

require_once '../database/config.php';

$output = array('data' => array());

$sql = "SELECT * FROM suppliers WHERE is_deleted = '1' ORDER BY id DESC";

$query = $connection->query($sql);

$x = 1;

while ($row = $query->fetch_assoc()) {

    $actionButtons = '
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#restoreSupplierModal" onclick="restoreSupplier(' . $row['id'] . ')">
      <i class="fa-solid fa-rotate-left"></i>
    </button>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSupplierModal" onclick="deleteSupplier(' . $row['id'] . ')">
      <i class="fa-solid fa-ban"></i>
    </button>
    ';

    $output['data'][] = array(
        $x++,
        $row['supplier_name'],
        $row['contact_no'],
        $row['email'],
        $row['website'],
        $row['address'],
        $actionButtons,
    );

    // $x++;
}

// Close database connection
$connection->close();

echo json_encode($output);
