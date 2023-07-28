<?php
// include 'connect.php';
// $sql = "INSERT INTO Orders (total_amount,items_count,user_id,status) values('3000','5','1','pending')";
// if($con->query($sql)){
// $order_id = $con->insert_id;
// echo $order_id;
// }
// else{
//     echo 'error';
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>image slider</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#heading').fadeOut(3000);
        });
    </script>
    <style>
        #main {
            width: 100%;



        }

        #main .large {
            text-align: center;
            height: 240px;

            padding: 20px;



        }

        #main .small {
            text-align: center;
            justify-content: center;
        }

        #main .main .large img {

            height: 240px;

        }

        #main .main .small {
            display: flex;
            width: 100%;

        }

        #main .main .small .imgs {
            height: 110px;
            width: 110px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            /* border: 1px solid black; */
            padding: 10px;
            margin: 5px;


        }

        #main .main .small .imgs img {
            height: 80px;
            margin: 5px;

        }

        table {
            border-collapse: collapse;
            border-radius: 50px;
        }

        .mydiv {
            display: flex;
        }

        .mydiv {
            position: relative;
            height: 400px;
            width: 500px;
            margin: 20px;
            background-color: white;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
        }
        .mydiv h1{
            text-align: center;
            width: 100%;
            border: solid orange;
            height: fit-content;
            margin: 0;
           /* background-color: red; */
            border-width: 0px 0px 0px 5px ;
        }
        .child{
            height:365px;
            width: 200px;
            background-color: gray;
            position:absolute;
            bottom: 0;
            

        }
    </style>
</head>

<body>
    <div class="mydiv">
        <h1>Prasanth what are you

            
        </h1>
        

    </div>
    <div class="mydiv">

    </div>
    <div class="mydiv">

    </div>
    <div class="addForm" id="myform">
        <h3>Add Product</h3>
        <form action="add_product.php" enctype="multipart/form-data" method="post">

            <div class="formItem">



                <input oninput="checkSize(this)" type="text" name="product_name" placeholder="Product Name" required>

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
        <img src="https://prasanthjsdemo.firebaseapp.com/gallery/fish3.jpg" alt="">
        <pre>
        #include<stdio.h>
            
    </pre>
        <form action="" name="myform">

            <input type="text" name="mytext">
            <button onclick="todo()">Add</button>
        </form>
        <ul id="myList">

        </ul>
        <center>
            <table border="1">
                <th>
                <td>Id</td>
                <td>Name</td>
                <td>Email</td>
                </th>
                <tr>
                    <td>1</td>
                    <td>Prasanth</td>
                    <td>pintuprasanth@gmail.com</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Dilli</td>
                    <td>dillipalleti@gmail.com</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Pavan</td>
                    <td>lpavan@gmail.com</td>
                </tr>
            </table>
        </center>
        <?php

        ?>

        <!-- <center>
        <h1 id="heading">Hello Prasanth!</h1>
    </center> -->
        <h1 id="login" onclick="login(this)">
            Login
        </h1>

        <h1 id="logout" onclick="logout(this)" style='display:none;'>
            Logout
        </h1>
        <form action="" method="get">

            <input type="text" name="quantity">
            <a href="demo.php?a=<?php echo $_GET['quantity']; ?>">post</a>
        </form>

        <a href="Coco (2017) .MKV" download>coco</a>
        <section id="main">
            <div class="main">
                <div class="large">
                    <img src="/gallery/p1.png" alt="" id="main-img">
                </div>
                <div class="small">
                    <div class="imgs"><img src="gallery1/n1.png" alt="" onclick="change(this)"></div>
                    <div class="imgs"><img src="gallery1/n2.png" alt="" onclick="change(this)"></div>
                    <div class="imgs"><img src="gallery1/n3.png" alt="" onclick="change(this)"></div>
                    <div class="imgs"><img src="gallery1/n4.png" alt="" onclick="change(this)"></div>


                </div>
            </div>
        </section>

</body>
<script>
    function checkSize(item) {
        if (item.value.length > 7) {
            item.style.width = "500px";
            // item.style.border = "2px solid red";
        } else {
            item.style.width = "auto";

            // item.style.border = "1px solid black";

        }
        // console.log(item);
    }
</script>
<script>
    var image = document.getElementById('main-img');

    function change(item) {


        image.src = item.src;
        var imgs = document.querySelectorAll('.imgs ');
        for (let i = 0; i < imgs.length; i++) {
            // console.log(imgs[i].firstChild,item);
            if (imgs[i].firstChild.src == item.src) {

                // imgs[i].firstChild.style.opacity = "0.6";
                imgs[i].style.backgroundColor = "#acacac";
            } else {
                // imgs[i].firstChild.style.opacity = "1";
                imgs[i].style.backgroundColor = "white";


            }

        }
        // document.getElementsByClassName('imgs')[1].style.opacity = "0";
        // item.style.opacity = "1";

    }
</script>
<script>
    function login(item) {
        var logout = document.getElementById('logout');
        item.style.display = "none";
        logout.style.display = "block";

    }

    function logout(item) {
        var login = document.getElementById('login');

        item.style.display = "none";
        login.style.display = "block";

    }
</script>
<script>
    function todo() {
        event.preventDefault();
        // Select the parent <ul> element
        var list = document.getElementById('myList');

        // Create the list item <li>
        var listItem = document.createElement('li');

        // Create the <div> element
        var div = document.createElement('div');
        div.className = 'mydiv';
        // Create the checkbox <input>
        var checkbox = document.createElement('input');
        checkbox.type = 'checkbox';

        // Create the input textbox <input>
        // var textbox = document.createElement('input');
        // textbox.type = 'text';
        var text = document.createElement('p');
        text.innerText = myform.mytext.value;
        // Append the checkbox and textbox to the div
        div.appendChild(checkbox);
        div.appendChild(text);

        // Append the div to the list item
        listItem.appendChild(div);

        // Append the list item to the list
        list.appendChild(listItem);
    }
</script>
<script>
    var sliderIndex = 0;
    var slides = document.querySelectorAll('.imgs img');
    var image = document.getElementById('main-img');

    function showSlide() {
        // Hide all slides
        //   for (var i = 0; i < slides.length; i++) {
        //     slides[i].style.display = 'none';
        //   }

        // Show the current slide
        image.src = slides[sliderIndex].src;

        // Increment index
        sliderIndex++;

        // Reset index if it exceeds the number of slides
        if (sliderIndex >= slides.length) {
            sliderIndex = 0;
        }

        // Change slide every 3 seconds (3000 milliseconds)
        setTimeout(showSlide, 2000);
    }

    // Start the slideshow
    showSlide();
</script>

</html>