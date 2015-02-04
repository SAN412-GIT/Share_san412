<?php
require_once 'include.php';
setcookie("username", "", time() - 3600);
setcookie("password", "", time() - 3600);
if(isset($_SESSION['username'])){
    unset($_SESSION['username']);
}
echo "<script>window.location='index.php';</script>";