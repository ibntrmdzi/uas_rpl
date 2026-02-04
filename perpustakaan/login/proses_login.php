<?php
session_start();
include "../koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$q = mysqli_query($conn,"
    SELECT * FROM admin 
    WHERE username='$username' AND password='$password'
");

if(mysqli_num_rows($q) > 0){
    $_SESSION['login'] = true;
    header("location:../index.php");
} else {
    echo "<script>alert('Login gagal!');location='login.php';</script>";
}
?>
