<?php

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dname = 'ihome';

    $db = new mysqli($host, $user, $password, $dname);

    if ($db->connect_errno) {
        echo "Failed to connect to MySQL: ("
        . $db->connect_errno . ") " . $db->connect_error;
    }

    $query =
            "DELETE FROM user WHERE user_id=?";
    $conn = $db->prepare($query);
    $conn->bind_param("i", $id);
    if ($conn->execute()) {
        header('location: ../admin/edit_delete_user.php');
    } else {
        echo ' No ';
    }

    $db->close();
} else {
    echo 'Error!';
}
?>