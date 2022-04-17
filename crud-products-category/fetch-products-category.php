<?php

require_once '../database/config.php';

$output = array('data' => array());

$sql = "SELECT * FROM products_category";

$query = $connection->query($sql);

$x = 1;

while ($row = $query->fetch_assoc()) {

  $actionButtons = '
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editCategoryModal" onclick="editCategory(' . $row['id'] . ')">
      <i class="fa-solid fa-pen"></i>
    </button>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal" onclick="deleteCategory(' . $row['id'] . ')">
      <i class="fa-solid fa-ban"></i>
    </button>
    ';

  $output['data'][] = array(
    $x++,
    $row['category_name'],
    $actionButtons,
  );

  // $x++;
}

// Close database connection
$connection->close();

echo json_encode($output);
