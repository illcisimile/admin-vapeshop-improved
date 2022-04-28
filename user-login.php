<?php

require_once 'database/config.php';

session_start();

if ($_POST) {

    $response = array('success' => false, 'message' => array());

    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $sql = "SELECT * FROM accounts WHERE username = '$username' AND password = '$password'";
    $query = $connection->query($sql);
    $row = mysqli_fetch_array($query);

    if ($row > 0) {
        $response['success'] = true;
        $response['message'] = "Signed in successfully.";

        $_SESSION['username'] = $username;
        $_SESSION['userID'] = $row['id'];
    } else {
        $response['success'] = false;
        $response['message'] = "Wrong credentials.";
    }

    $connection->close();

    echo json_encode($response);
}
