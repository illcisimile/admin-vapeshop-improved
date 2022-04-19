<?php

require_once '../database/config.php';

if ($_POST) {

    $supplierID = $_POST['supplierID'];
    $editSupplierName = $_POST['editSupplierName'];
    $editContactNumber = $_POST['editContactNumber'];
    $editEmail = $_POST['editEmail'];
    $editWebsite = $_POST['editWebsite'];
    $editAddress = $_POST['editAddress'];

    $sql = "UPDATE suppliers SET supplier_name = '$editSupplierName', contact_no = '$editContactNumber', email = '$editEmail', website = '$editWebsite', address = '$editAddress' WHERE id = '$supplierID'";

    $query = $connection->query($sql);

    if ($query) {
        $response = array('success' => true, 'message' => 'Supplier updated.');
    } else {
        $response = array('success' => false, 'message' => 'Error while updating supplier.');
    }

    // Close database connection
    $connection->close();

    echo json_encode($response);
}
