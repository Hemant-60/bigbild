


<?php
session_start();
if((!isset($_SESSION['id']))&&($_SESSION['id']=='')) header('Location:./index/index.php');
//include_once'./include/header.php' ;
include'../conn.php';

//$id=$_SESSION['']
$userId=$_SESSION['id'];
$id=$_POST['cid'];
$date=date("Y-m-d");
$time=date("h:i:sa");
$checkExist=mysqli_query($conn,"SELECT * from clips where clipped_by='$userId' AND clipped='$id'");
if(mysqli_num_rows($checkExist)<=0){
  $addClip=mysqli_query($conn,"INSERT INTO `clips`( `clipped_by`, `clipped`, `date`, `time`) VALUES ('$userId','$id','$date','$time')");

}
?>
