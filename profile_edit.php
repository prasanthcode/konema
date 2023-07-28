<?php
session_start();
if ($_SESSION["user_id"]) {
    $user_id = $_SESSION["user_id"];
    $userprofile = $_SESSION["user_name"];
include 'connect.php';

    $stmt = $con->prepare("SELECT * FROM users where id='$user_id'");
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$_SESSION["userimg"] = $row["user_image"];
if($_SESSION["userimg"]==""){
    $_SESSION["userimg"]="user.png";

}
// echo $_SESSION["userimg"];


} else {
    header("Location: login.php");
}
include 'connect.php';


if ((isset($_FILES["file"]))&&(isset($_POST["submit"]))) {

    if ($_FILES["file"]["name"] != "") {

        $user_image = $_FILES["file"]["name"];
        $uploaded = move_uploaded_file($_FILES["file"]["tmp_name"],"gallery/".$user_image);
            if($uploaded){
                $stmt = $con->prepare("UPDATE users
        SET user_image='$user_image'
        WHERE id='$user_id'
        ");
            }
        $updated = $stmt->execute();
            header("Location: profile_edit.php");

    }
}


if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $username = $_POST["username"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];



    if (($row["username"] != $username) || ($row["email"] != $email) || ($row["phone"] != $phone) || ($row["address"] != $address) || ($row["fname"] != $fname) || ($row["lname"] != $lname)) {

        $stmt = $con->prepare("UPDATE users
    SET username='$username',fname='$fname',lname='$lname',phone='$phone',email='$email',address='$address'
    WHERE id='$user_id'
    ");

        $updated = $stmt->execute();
        if ($updated) {
            header("Location: profile_edit.php");
        } else {
            echo "failed";
        }
    } else {
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="profile_edit.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

</head>

<body>
    <?php include 'header.php'?>
    <section class="pro-section">

        <div class="main-profile">
            <div class="pro-img">
    
            <label for="upload"><img  src="gallery/<?php echo $_SESSION["userimg"]?>" alt="" id="preview"></label>
                
            </div>
            <form action=""  enctype="multipart/form-data" method="post" class="form">
                <h3>Account Settings</h3>
                
                <div class="formItem">
    
    
    
                    <input id="hello" type="text" name="username" placeholder="User Name" value="<?php echo $row["username"]; ?>" required disabled>
    
                </div>
                <div class="formItem">
    
    
    
                    <input type="text" name="fname" placeholder="First Name" value="<?php echo $row["fname"]; ?>" required>
    
                </div>
                <div class="formItem">
    
    
    
                    <input type="text" name="lname" placeholder="Last Name" value="<?php echo $row["lname"]; ?>" required>
    
                </div>
                <div class="formItem">
    
    
    
                    <input type="text" name="phone" placeholder="Phone Number" value="<?php echo $row["phone"]; ?>" required>
    
                </div>
                <div class="formItem">
    
                    
    
                    <input type="email" name="email" placeholder="Email Address" value="<?php echo $row["email"]; ?>" required>
    
                </div>
                <div class="formItem">
    
    
    
                    <!-- <input type="text" name="address" placeholder="Address"  value="<?php //echo $row["address"]; ?>" required> -->
                    <textarea  placeholder="Address" name="address" id="address" cols="30" rows="5"  required><?php echo $row["address"]; ?></textarea>
                </div>
    
                <input type="file" id="upload" name="file"  accept="image/*">
    
    
    
    
    
                <input  type="submit" id="submit" value="Save" name="submit" >
            </form>
        </div>
    </section>
<script src="script.js"></script>
<script src="toggle.js">

    </script>
<script>
    // var address =document.getElementById('address');
    // const addr= address.value;
    // function ischanged(){
    // //     var address =document.getElementById('address');
    // //     const addr= address.value;
    //     var submit =document.getElementById('submit');
    //     if (addr===address.value) {
            
            
    //         submit.disabled = 'true';
    //         submit.style.backgroundImage= " linear-gradient(to right,rgb(65, 65, 65),rgb(17, 39, 112))";
    //     }
    //     else{
    //         submit.disabled = 'false';
    //         submit.style.backgroundImage= " linear-gradient(to right,rgb(38, 163, 221),rgb(30, 78, 235))";

           
    //     }
    //     console.log(submit.disabled);
    //     console.log('yes');
    // }

</script>
<script>
    const upload = document.getElementById('upload');
    const preview = document.getElementById('preview');

    upload.addEventListener('change', (event) => {
      const file = event.target.files[0];
      
      if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        
        reader.onload = function (e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        };

        reader.readAsDataURL(file);
      } else {
        alert('Please select an image file.');
      }
    });
  </script>
</body>

</html>