<?php

require_once '../database/config.php';

$output = array('data' => array());

$sql = "SELECT * FROM products WHERE is_deleted = '0' AND quantity < warning_quantity ORDER BY id DESC";

$query = $connection->query($sql);

$x = 1;

while ($row = $query->fetch_assoc()) {

  $quantity = '<span class="badge bg-danger">' . $row['quantity'] . '</span>';

  $actionButtons = '
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editStockModal" onclick="editCriticalStock(' . $row['id'] . ')">
      <i class="fa-solid fa-pen"></i>
    </button>
    ';

  $output['data'][] = array(
    $x++,
    $row['product_name'],
    $row['product_category'],
    $quantity,
    $row['warning_quantity'],
    $actionButtons,
  );

  // $x++;
}

// Close database connection
$connection->close();

echo json_encode($output);
