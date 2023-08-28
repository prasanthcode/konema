<?php
include('connect.php');

$stmt = $con->prepare("SELECT * FROM Orders");
$stmt->execute();
$orders = $stmt->get_result();

echo '<div class="order-list">';
while ($row = $orders->fetch_assoc()) {
    echo '<div class="order-item">';
    echo '    <div class="order-cell order-id">' . $row['order_id'] . '</div>';
    echo '    <div class="order-cell order-status">' . $row['status'] . '</div>';
    echo '    <div class="order-cell user-id">' . $row['user_id'] . '</div>';
    echo '    <div class="order-cell items-count">' . $row['items_count'] . '</div>';
    echo '    <div class="order-cell order-date">' . $row['order_date'] . '</div>';
    echo '    <div class="order-cell total-amount">' . $row['total_amount'] . '</div>';
    echo ' <a  href="update_order_status.php?oid='. $row['order_id'] .'&status=completed" class="order-cell complete">Completed</a >';
    echo ' <a  href="update_order_status.php?oid='. $row['order_id'] .'&status=partially_completed" class="order-cell partial-complete">Partial Completed</a >';

    echo '</div>';
}
echo '</div>';


$stmt->close();
$con->close();
?>
