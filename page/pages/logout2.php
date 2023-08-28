<?php

session_start();
if((!isset($_SESSION["id"]))||($_SESSION["id"]=="")) echo"<script>window.location.href='./index/index.php'";
//else{
 // session_unset($_SESSION["email"]);
 // session_unset($_SESSION["id"]);
 // session_unset($_SESSION["name"]);
session_unset();
session_destroy();//}
echo"<script>window.location.href='./index/signin.php'</script>";
?>
