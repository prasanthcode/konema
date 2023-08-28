<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    include('connect.php');

    $orderId = $_GET['oid'];
    // $orderId = 87;
    $selectedStatus = $_GET['status'];
    // $selectedStatus = "pending";

    // Update the order status in the Orders table
    $updateQuery = "UPDATE Orders SET status = ? WHERE order_id = ?";
    $stmt = $con->prepare($updateQuery);
    $stmt->bind_param("si", $selectedStatus, $orderId);

    if ($stmt->execute()) {
        header("Location: manage_order.php");
exit();
    } else {
        echo "Error";
    }

    $stmt->close();
    $con->close();
}
