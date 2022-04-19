<?php

require_once '../database/config.php';

$output = array('data' => array());

// $sql = "SELECT * FROM products WHERE is_deleted = '0' ORDER BY id DESC";

$sql = "SELECT * FROM products WHERE is_deleted = '0' AND warning_quantity != 0 ORDER BY id DESC";

$query = $connection->query($sql);

$x = 1;

while ($row = $query->fetch_assoc()) {

  $quantity = $row['quantity'];
  $warningQuantity = $row['warning_quantity'];

  if ($quantity < $warningQuantity) {
    $quantity = '<span class="badge bg-danger">' . $quantity . '</span>';
  } else if ($quantity - $warningQuantity <= 10) {
    $quantity = '<span class="badge bg-warning">' . $quantity . '</span>';
  } else {
    $quantity = '<span class="badge bg-success">' . $quantity . '</span>';
  }

  $actionButtons = '
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editStockModal" onclick="editStock(' . $row['id'] . ')">
      <i class="fa-solid fa-pen"></i>
    </button>
    ';

  $output['data'][] = array(
    $x++,
    $row['product_name'],
    $row['product_category'],
    $quantity,
    $warningQuantity,
    $actionButtons,
  );

  // $x++;
}

// Close database connection
$connection->close();

echo json_encode($output);
