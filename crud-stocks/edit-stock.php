<?php

require_once '../database/config.php';

if ($_POST) {

    $stockID = $_POST['stockID'];
    $editQuantity = $_POST['editQuantity'];
    $editWarningQuantity = $_POST['editWarningQuantity'];

    $sql = "UPDATE products SET quantity = '$editQuantity', warning_quantity = '$editWarningQuantity' WHERE id = '$stockID'";

    $query = $connection->query($sql);

    if ($query) {
        $response = array('success' => true, 'message' => 'Stock updated.');
    } else {
        $response = array('success' => false, 'message' => 'Error while updating stock.');
    }

    // Close database connection
    $connection->close();

    echo json_encode($response);
}
