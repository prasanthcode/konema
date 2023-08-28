<?php 
$password = 'mysecretpassword';
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
echo $hashedPassword.'<br>';
$password = 'mysecretpassword';
$hashedPassword = '$2y$10$s2wg2r/2NkrS3P3SW.EaHeYBnafxjKezl8JJRjxY.x0iUeg2qYV7C';
// $2y$10$.VMEjbEaFat1wfWcoQ5i..Ik/M6syYNESos2/FEkkhmb7r9XcABci
// $2y$10$s2wg2r/2NkrS3P3SW.EaHeYBnafxjKezl8JJRjxY.x0iUeg2qYV7C
// $2y$10$GfAeacXzk1xIqiDRw5/luuImPYkAx4zxlq7M5Mj4ePOAsJNFdLUWm
// 
if (password_verify($password, $hashedPassword)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

?>