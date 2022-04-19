<?php

require_once '../database/config.php';

$output = array('data' => array());

$sql = "SELECT * FROM products WHERE is_deleted = '0' AND warning_quantity = 0 ORDER BY id DESC";

$query = $connection->query($sql);

$x = 1;

while ($row = $query->fetch_assoc()) {

    $actionButtons = '
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editStockModal" onclick="editNewStock(' . $row['id'] . ')">
      <i class="fa-solid fa-pen"></i>
    </button>
    ';

    $output['data'][] = array(
        $x++,
        $row['product_name'],
        $row['product_category'],
        $row['quantity'],
        $row['warning_quantity'],
        $actionButtons,
    );

    // $x++;
}

// Close database connection
$connection->close();

echo json_encode($output);
