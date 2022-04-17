<?php

require_once '../database/config.php';

if ($_POST) {

    $categoryName = $_POST['categoryName'];

    $sql = "INSERT INTO products_category (category_name) VALUES ('$categoryName')";

    $query = $connection->query($sql);

    if ($query) {
        $response = array('success' => true, 'message' => 'Category added.');
    } else {
        $response = array('success' => false, 'message' => 'Error while adding category.');
    }

    // Close database connection
    $connection->close();

    echo json_encode($response);
}
