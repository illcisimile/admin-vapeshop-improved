<?php

require_once '../database/config.php';

if ($_POST) {

    $productID = $_POST['productID'];
    $editProductName = $_POST['editProductName'];
    $editProductCategory = $_POST['editProductCategory'];
    $editBrand = $_POST['editBrand'];
    $editSupplier = $_POST['editSupplier'];
    $editPrice = $_POST['editPrice'];

    $sql = "UPDATE products SET product_name = '$editProductName', product_category = '$editProductCategory', brand = '$editBrand', supplier = '$editSupplier', price = '$editPrice' WHERE id = '$productID'";

    $query = $connection->query($sql);

    if ($query) {
        $response = array('success' => true, 'message' => 'Product updated.');
    } else {
        $response = array('success' => false, 'message' => 'Error while updating product.');
    }

    // Close database connection
    $connection->close();

    echo json_encode($response);
}
