<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Product Section</title>
    <link rel="stylesheet" href="manage_pro.css">

</head>

<body>
    <div class="addProduct">
        <form action="" method="post">
            <input type="text" name="search" id="konem" >
            <input type="submit" name="submit">
        </form>
        <button onclick="addProduct()" id="add-btn">Add +</button>
    </div>
    <div class="addForm" id="myform" >
        <h3>Add Product</h3>
        <form action="add_product.php" enctype="multipart/form-data" method="post">
            
            <div class="formItem">



                <input type="text" name="product_name" placeholder="Product Name" required>

            </div>
            <div class="formItem">



                <input type="text" name="product_price" placeholder="Product Price" required>

            </div>
            <div class="formItem">



                <input type="text" name="product_quantity" placeholder="Product Quantity" required>

            </div>
            <div class="formItem">



                <input type="text" name="product_village" placeholder="Product Village" required>

            </div>
            
            <div class="formItem">



                <input type="file" name="file" placeholder="Product Image" required>

            </div>
            



            <input type="submit" id="submit" value="Add" name="submit">
        </form>
    </div>
    <table border="1" class="products" id="myproducts">

        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product Quantity</th>
            <th>Product Price</th>
            <th>Product Village</th>
            <th>Product Image</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
        
        <?php
        include 'connect.php';
        $stmt = $con->prepare("SELECT * FROM products");

        if(isset($_POST["submit"])){
            $search = $_POST["search"];
            if($_POST["search"]==""){

                $stmt = $con->prepare("SELECT * FROM products");
            }
            else{

                $stmt = $con->prepare("SELECT * FROM products where product_name like '%$search%' or product_village like '%$search%' or product_price like '%$search%'");
            }
        }

        $stmt->execute();

        $result = $stmt->get_result();
        if(!($result->num_rows)){
            echo '<h3>No Results Found</h3>';
        }
        while ($row = $result->fetch_assoc()) { ?>
            <tr class="pro-row">
                <td><?php echo $row['product_id']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['product_quantity']; ?></td>
                <td><?php echo $row['product_price']; ?></td>
                <td><?php echo $row['product_village']; ?></td>
                <td class="product-img"><img src="gallery/<?php echo $row['product_image']; ?>" alt="">

                </td>
                <td><a href="edit_pro.php?id=<?php echo $row['product_id']; ?>" target="_blank">Edit</a></td>
                <td><a href="rmproduct.php?id=<?php echo $row['product_id']; ?>">Remove</a></td>


            </tr>
        <?php }
        $stmt->close();
        $con->close();
        ?>
        
    </table>
    <!-- <div id="container">
  <input type="text" id="myInput" ondblclick="replaceElement()"> -->
  <!-- <button onclick="replaceElement()">Replace Input</button> -->
<!-- </div> -->

</body>
<script src="manage_pro.js"></script>
<script>
    
//     function replaceElement() {
//   var container = document.getElementById("container");
//   var inputElement = document.getElementById("myInput");

//   var pElement = document.createElement("p");
//   pElement.setAttribute('id','mypara');
//   pElement.textContent = "fsfsfsfffsfsff";

//   container.replaceChild(pElement, inputElement);
  

// }
</script>
</html>