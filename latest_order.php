<?php


// $userprofile = $_SESSION['user_name'];
$user_id = $_GET["uid"];

if ($user_id) {
    include 'connect.php';

    $sql = "SELECT * FROM `Orders` WHERE user_id = '$user_id' ";
    $result = $con->query($sql);

    $orders = array(); // Array to store the orders

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $order = array(
                "order_id" => $row["order_id"],
                "user_id" => $row["user_id"],
                "order_date" => $row["order_date"],
                "status" => $row["status"]
            );

            $orders[] = $order;
        }
    } else {
        $orders = array(); // Empty array if no orders found
    }

    $con->close();

    // Convert the orders array to JSON format
    $json_data = json_encode($orders);

    // Output the JSON data
    header('Content-Type: application/json');
    echo $json_data;
}
?>
