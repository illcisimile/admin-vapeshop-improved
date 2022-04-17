<?php

require_once '../database/config.php';

if ($_POST) {

    $categoryID = $_POST['categoryID'];
    $editCategoryName = $_POST['editCategoryName'];

    $sql = "UPDATE products_category SET category_name = '$editCategoryName' WHERE id = '$categoryID'";

    $query = $connection->query($sql);

    if ($query) {
        $response = array('success' => true, 'message' => 'Category updated.');
    } else {
        $response = array('success' => false, 'message' => 'Error while updating category.');
    }

    // Close database connection
    $connection->close();

    echo json_encode($response);
}
