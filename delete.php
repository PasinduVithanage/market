<?php
if (isset($_GET['No'])) {
    include 'db_connection/data_connection.php';
    $id = $_GET['No'];
    $sql = "DELETE FROM `order manage` WHERE No = '$id'";
    $con->query($sql);
}
header('location: index.php');
?>