<?php 
if(isset($_POST["submit"])){
// var_dump($_FILES["file"]);
// if($_FILES["file"]["name"]!=""){
//     // var_dump($_FILES["file"]);
//     echo 'yes';
// }
// else{
//     echo 'no';
// }
    $product_image = $_FILES["file"]["name"];
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $product_village = $_POST["product_village"];
    $product_quantity = $_POST["product_quantity"];
    // $product_image = $_POST["product_image"];
    
    
    // echo $product_name.$product_price.$product_village.$product_image.$product_quantity;
    $uploaded = move_uploaded_file($_FILES["file"]["tmp_name"],"gallery/".$product_image);
    if($uploaded){
        // echo 'success';
        include 'connect.php';
        $stmt = $con->prepare("INSERT INTO products(product_name,product_village,product_image,product_price,product_quantity) VALUES ('$product_name','$product_village','$product_image','$product_price','$product_quantity')");
        $result = $stmt->execute();
        if($result){
            header('Location: manage_pro.php');
            // $stmt->close();
            // $con->close();
            // echo "success";

        }
        else{
            echo "failed to upload";
        }

    }
}

?>