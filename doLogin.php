<?php
require_once 'include.php';
var_dump($_POST);
$username = $_POST['username'];
$password = $_POST['password'];
$verify = $_POST['verify'];
$verify1 = $_SESSION['verify'];
if ($verify == $verify1) {
    $sql = "select * from san412_user where username='{$username}' and password='{$password}'";
    if (checkUser($sql)) {
        if(isset($_POST['autoLogin']))
        {
            
        }
        if(isset($_POST['savepasswd']))
        {
            
        }
        echo "<script>alert('success');</script>";
    } else {
        echo "<script>alert('user or password is wrong');</script>";
        echo "<script>window.location='login.php';</script>";
    }
} else {
   echo "<script>alert('verify number is wrong');</script>";
   echo "<script>window.location='login.php';</script>";
}