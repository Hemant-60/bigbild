
<?php
session_start();
if((!isset($_SESSION['id']))&&($_SESSION['id']=='')) header('Location:./index/index.php');

include'../conn.php';
$userId=$_SESSION['id'];
$id=$_POST['cid'];
$date=date("Y-m-d");
$time=date("h:i:sa");
$checkExist=mysqli_query($conn,"SELECT * from clipwork where clipped_by='$userId' AND clipped='$id'");
if(mysqli_num_rows($checkExist)>0){
  $remClip=mysqli_query($conn,"DELETE FROM `clipwork` WHERE clipped_by='$userId' AND clipped='$id'");

}

?>
