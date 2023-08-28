<?php
session_start();

if((!isset($_SESSION['id']))&&($_SESSION['id']=='')) header('Location:./index/index.php');
include'conn.php';
if(isset($_GET['s_id'])){
$sid=$_GET['s_id'];
  $query="DELETE FROM `startup_info` WHERE id='$sid'";
  $execQuery=mysqli_query($conn,$query);
  if($execQuery){
    echo"<script>window.location.href='./profile.php'</script>";
  }
}else{
  echo"<script>window.location.href='./startups.php'</script>";
}
?>
