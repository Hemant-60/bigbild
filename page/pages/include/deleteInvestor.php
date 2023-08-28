<?php
session_start();
if((!isset($_SESSION['id']))&&($_SESSION['id']=='')) header('Location:../index/index.php');
//include_once'header.php' ;
include'../conn.php';

$userId=$_SESSION['id'];
$query=
$deleteQuery=mysqli_query($conn,"DELETE FROM investor_info WHERE user_id='$userId'");
if($deleteQuery) echo"<script>window.location.href='../profile.php?SUCCESS'</script>";
else echo"<script>window.location.href='../profile.php?FAILED'</script>";
?>
