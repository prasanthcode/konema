<?php
include 'connect.php';
if (isset($_GET["id"])) {

    $product_id = $_GET["id"];
    $stmt = $con->prepare("SELECT * FROM products where product_id='$product_id'");
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    // var_dump($row);
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    // echo 'yes';
    $product_name = $_POST["product_name"];
    $product_village = $_POST["product_village"];
    $product_quantity = $_POST["product_quantity"];
    $product_price = $_POST["product_price"];
    $product_image = $_FILES["file"]["name"];
    if (($row["product_name"] != $product_name) || ($row["product_village"] != $product_village) || ($row["product_quantity"] != $product_quantity) || ($row["product_price"] != $product_price) || ($product_image != "")) {

        if ($_FILES["file"]["name"] == "") {

            $stmt = $con->prepare("UPDATE products
    SET product_name='$product_name',product_quantity='$product_quantity',product_price='$product_price',product_village='$product_village'
    WHERE product_id='$product_id'
    ");
        } else {
            $uploaded = move_uploaded_file($_FILES["file"]["tmp_name"],"gallery/".$product_image);
            if($uploaded){

            $stmt = $con->prepare("UPDATE products
        SET product_name='$product_name',product_quantity='$product_quantity',product_price='$product_price',product_village='$product_village',product_image='$product_image'
        WHERE product_id='$product_id'");

            }
            else{
                echo "failed to upload";
            }

        }
        $updated = $stmt->execute();
        if($updated){
            header("Location: edit_pro.php?id=$product_id");
            // echo "success";
            
        }
        else{
            echo "failed";
        }



    }
    else{
        echo "Enter something";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Product Section</title>
    <link rel="stylesheet" href="edit_pro.css">
    
</head>

<body>
    <div class="main">
        <div class="pro-img">

            <img width="200px" src="gallery/<?php echo $row["product_image"];?>" alt="">
        </div>
        <form action="" enctype="multipart/form-data" method="post">
            <h3>Add Product</h3>

            <div class="formItem">



                <input type="text" name="product_name" placeholder="Product Name" value="<?php echo $row["product_name"]; ?>" required>

            </div>
            <div class="formItem">



                <input type="text" name="product_price" placeholder="Product Price" value="<?php echo $row["product_price"]; ?>" required>

            </div>
            <div class="formItem">



                <input type="text" name="product_quantity" placeholder="Product Quantity" value="<?php echo $row["product_quantity"]; ?>" required>

            </div>
            <div class="formItem">



                <input type="text" name="product_village" placeholder="Product Village" value="<?php echo $row["product_village"]; ?>" required>

            </div>

            <div class="formItem">



                <input type="file" name="file" placeholder="Product Image">

            </div>


            
            
            <input type="submit" id="submit" value="Add" name="submit">
        </form>
    </div>
</body>

</html>