


<?php
session_start();
if((!isset($_SESSION['id']))&&($_SESSION['id']=='')) header('Location:./index/index.php');
include'../conn.php';
$userId=$_SESSION['id'];
$id=$_POST['cid'];
$date=date("Y-m-d");
$time=date("h:i:sa");
$checkExist=mysqli_query($conn,"SELECT * from clipwork where clipped_by='$userId' AND clipped='$id'");
if(mysqli_num_rows($checkExist)<=0){
  $extractCategory=mysqli_query($conn,"SELECT * FROM startup_info where id='$id'");
  $cat="startup";
  while($res=mysqli_fetch_array($extractCategory)){
    $cat=$res['category'];
  }
  $addClip=mysqli_query($conn,"INSERT INTO `clipwork`( `clipped_by`, `clipped`, `date`, `time`,`category`) VALUES ('$userId','$id','$date','$time','$cat')");

}
?>
