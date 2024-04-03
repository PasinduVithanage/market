<?php
include 'db_connection/data_connection.php';

if (isset($_GET['state']) && isset($_GET['rowno'])) {
    
    $state = $_GET['state'];
    $rowno = $_GET['rowno'];

    $query = "UPDATE `order manage` SET Status = ? WHERE No = ?";

    $stmt = mysqli_prepare($con, $query);

    mysqli_stmt_bind_param($stmt, "si", $state, $rowno);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Value updated successfully.";
    } else {
        echo "Error updating value: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
 
    mysqli_close($con);
}
header(location: 'index.php');
?>
