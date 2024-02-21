<?php

session_start();

?>
<?php
$userprofile = $_SESSION['user_name'];
if ($userprofile == true) {
} else {

    // header("location:login.php");
}
?>
<?php
include("connect.php");
$stmt = $con->prepare("SELECT * FROM users");

$stmt->execute();

$featured_products = $stmt->get_result(); //array->


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DashBoard</title>
    <link rel="stylesheet" href="table.css">
</head>

<body>

    <h1>Users </h1>
    <hr>

    <section id="table">
        <div class="tab">

            <table class="table">
                <tr id="head">

                    <th>Username</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th></th>




                </tr>


                <?php while ($row = $featured_products->fetch_assoc()) { ?>
                    <tr>
                        <?php $_SESSION['username'] = $row['username']; ?>
                        <td><?php echo $row['username']; ?></td>

                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['role']; ?></td>

                        <td><a class="remove" href="deleteuser.php?a=<?php echo $row['id']; ?>">Remove</a></td>
                    </tr>
                <?php }
                $stmt->close();
                $con->close(); ?>
            </table>


        </div>
    </section>

</body>

</html>