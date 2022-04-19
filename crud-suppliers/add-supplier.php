<?php

require_once '../database/config.php';

if ($_POST) {

    $supplierName = $_POST['supplierName'];
    $contactNumber = $_POST['contactNumber'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $address = $_POST['address'];

    $sql = "INSERT INTO suppliers (supplier_name, contact_no, email, website, address) VALUES ('$supplierName', '$contactNumber', '$email', '$website', '$address')";

    $query = $connection->query($sql);

    if ($query) {
        $response = array('success' => true, 'message' => 'Supplier added.');
    } else {
        $response = array('success' => false, 'message' => 'Error while adding supplier.');
    }

    // Close database connection
    $connection->close();

    echo json_encode($response);
}
