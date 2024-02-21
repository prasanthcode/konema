<?php $user_id = $_SESSION["user_id"];
include 'connect.php';

$stmt = $con->prepare("SELECT * FROM users where id='$user_id'");
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$_SESSION["userimg"] = $row["user_image"];
if($_SESSION["userimg"]==""){
$_SESSION["userimg"]="user.png";

}
?>
<section id="header">

    <h4>Konema</h4>
    <div>
        <form action="search.php" class="search-bar" method="post">

            <input type="text" name="search" placeholder="search ">
            <button style="border:none;background:none;" name="submit"><i class="fas fa-search"></i></button>

        </form>
    </div>
    <div class="profile">
        <ul id="navbar">
            <li><a id="home" href="konem.php">
                <!-- <i class="fas fa-home-lg-alt"></i> -->
                Home
            </a></li>


            <li><a id="mycart" href="table.php">My Cart<span class="count"><?php 
            include('connect.php');

            $stmt = $con->prepare("SELECT * FROM cartItems where user_id='$user_id' ");
    
            $stmt->execute();
    
            $featured_products = $stmt->get_result();
            
            $count = mysqli_num_rows($featured_products);
            echo $count;
            ?></span></a></li>
            <!-- <li><a id="blog" href="blog.php">Blog</a></li> -->
            <li><a id="about" href="about.php">About</a></li>
            <li><a id="contact" href="contact.php">
                <!-- <i class="fas fa-phone-alt"></i> -->
                Contact
            </a></li>
            <div class="add-menu">

                <li><a href="profile_edit.php">edit profile</a></li>
                <li><a href="myorders.php">my orders</a></li>
                <li><a href="#">settings</a></li>
                <?php 
                if($user_id){
                ?>
                <li><a href="logout.php">logout</a></li>
                <?php
                }else{
                    ?>
                <li><a href="login.php">login</a></li>

                    <?php


                }
                ?>
            </div>

            <!-- <a href="#" id="close"><i class="far fa-times"></i></a> -->
        </ul>
        <img class="headimg" id="togbtn" src="gallery/<?php echo $_SESSION["userimg"]?>"  alt="">

        <div class="submenu" id="subMenu">
            <div class="sub">
                <div class="userinfo">
                    <img src="gallery/<?php echo $_SESSION["userimg"]?>" alt="">
                    <h3>Hello, <?php echo $userprofile ?> !</h3>

                </div>
                <hr>
                <a href="profile_edit.php" class="sublink">
                    <i class="fas fa-user"></i>
                    <p> Edit Profile</p>

                    <span>></span>
                </a>
                <a href="myorders.php" class="sublink">
                    <i class="fas fa-shopping-cart"></i>
                    <p>My Orders</p>
                    <span>></span>
                </a>
                <a href="" class="sublink">
                    <i class="fas fa-cog"></i>
                    <p> Settings&Privacy</p>
                    <span>></span>
                </a>

                
                <?php 
                if($user_id){
                ?>
                <a href="logout.php" class="sublink">
                    <i class="fas fa-sign-out-alt"></i>
                    <p> Logout</p>
                    <span>></span>
                </a>
                <?php
                }else{
                    ?>
                <a href="login.php" class="sublink">
                    <i class="fas fa-sign-out-alt"></i>
                    <p> Login</p>
                    <span>></span>
                </a>

                <?php


                }
                ?>
            </div>

        </div>






    </div>
    <div class="mobile">

        <i id="bar" class='fas fa-bars'></i>
    </div>
</section>