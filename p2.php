<?php
session_start();

?>
<?php
$userprofile = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];
if ($userprofile == true) {
} else {

  header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order details</title>
  <link rel="stylesheet" href="style.css">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <style>
    .order-details {
      margin: 0 auto;
      width: 90%;
      border: 1px solid #ccc;
      padding: 20px;

      font-family: Arial, sans-serif;
    }

    .order-info {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }

    .info-label {
      flex-grow: 1;
      font-weight: bold;
      margin-right: 10px;
    }

    .info-value {
      flex-shrink: 0;
    }

    h2 {
      font-size: 20px;
      margin-bottom: 15px;
    }

    .order-products {
      border-top: 1px solid #ccc;
      margin-top: 10px;
      padding-top: 10px;
    }

    .product {
      display: flex;
      justify-content: space-between;
      margin-bottom: 5px;
    }

    .product-name {
      flex-grow: 1;
    }

    .product-quantity,
    .product-price {
      flex-shrink: 0;
    }
 
    /* Add your global styles here */

    .table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    .table th,
    .table td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ccc;
    }

    .table th {
      background-color: #f0f0f0;
      font-weight: bold;
    }

    .table img {
      max-width: 100px;
      max-height: 100px;
    }

    /* Your existing styles */

    .info-value {
      display: inline-block;
      padding: 5px 10px;
      border-radius: 3px;
      font-weight: bold;
      font-size: 14px;
      text-transform: uppercase;
    }

    .pending {
      background-color: #ffc107;
      color: #000;
      /* You can adjust text color for visibility */
    }

    .canceled {
      background-color: #dc3545;
      color: #fff;
    }

    .completed {
      background-color: #28a745;
      color: #fff;
    }

    .partially-completed {
      background-color: #007bff;
      color: #fff;
    }




@media (max-width: 768px) {
  .table {
     
      font-size: 10px;
    }

    .table img {
      max-width: 50px;
      max-height: 50px;
    }
}
  </style>
</head>

<body>
  <?php include 'header.php'; ?>
  
  <?php include('connect.php'); 
          $order_id = $_GET['a'];

                $stmt = $con->prepare("SELECT * FROM Orders where order_id='$order_id' ");

                $stmt->execute();
                
                $featured_products = $stmt->get_result();
                ?>
                

                <?php while ($row = $featured_products->fetch_assoc()) { ?>
                        <?php $total= $row['total_amount']; ?>

  <div class="order-details">
    <h2>Order Details</h2>
    <div class="order-info">
      <div class="info-label">Order ID:</div>
      <div class="info-value"><?php echo "#".$row['order_id']; ?></div>
    </div>
    <div class="order-info">
      <div class="info-label">Order Date:</div>
      <div class="info-value"><?php echo $row['order_date']; 
      
      
      ?></div>
    </div>
    <div class="order-info">
      <div class="info-label">Delivery Address:</div>
      <div class="info-value">Andhra Pradesh, 532222</div>
    </div>
    <div class="order-info">
      <div class="info-label">Date of Delivery:</div>
      <div class="info-value"><?php 
      $dateTime = new DateTime($row['order_date']);
      $dateTime->modify('+3 days');
      $newDate = $dateTime->format('Y-m-d H:i:s');
      
      echo $newDate;
      ?></div>
    </div>
    <div class="order-info">
      <div class="info-label">Payment Mode:</div>
      <div class="info-value">Cash on Delivery</div>
    </div>
    <div class="order-info">
      <div class="info-label">Order Status:</div>
      <div class="info-value <?php echo $row['status']; ?>"><?php echo $row['status']; ?></div>
    </div>
    <?php } 
    $stmt->close();
    $con->close();
    ?>

    <h3>Order Products</h3>


    <section id="table">
      <div class="tab">

        <table class="table">


          <?php
          include('connect.php');


          $stmt = $con->prepare("SELECT * FROM OrderItems WHERE  user_id='$user_id' and order_id='$order_id'");

          $stmt->execute();

          $featured_products = $stmt->get_result();
          ?>

          <?php $c = 1 ?>

          <?php while ($row = $featured_products->fetch_assoc()) { ?>
            <tr>

              <td> <img src="gallery/<?php echo $row['product_image']; ?>" alt=""> </td>
              <td><?php echo $row['product_name']; ?></td>
              <td><?php echo $row['product_village']; ?></td>
              <td><?php echo $row['product_quantity']; ?></td>
              <td>Rs. <?php echo $row['product_price']; ?></td>


            </tr>

          <?php }
          $stmt->close();
          $con->close();
          ?>
        </table>
      </div>
    </section>
    <div class="total">
      <div class="total-label">Total:</div>
      <div class="total-amount">Rs. <?php echo $total; ?></div>
    </div>
    


  </div>









  <script src="script.js"></script>
  <script>
    let subMenu = document.getElementById("subMenu");

    function toggleMenu() {
      subMenu.classList.toggle("openmenu");
    }
  </script>
  <script src="toggle.js">

  </script>
</body>

</html>