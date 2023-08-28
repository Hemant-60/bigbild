<?php
session_start();
include'conn.php';
if((!isset($_SESSION['id']))&&($_SESSION['id']=='')) header('Location:./index/index.php');
$uid=$_SESSION['id'];
$query="SELECT * from sessions where user_id='$uid' ORDER by session_id DESC LIMIT 1";
$execQuery=mysqli_query($conn,$query);
while($res=mysqli_fetch_array($execQuery)){
  $sessId=$res['session_id'];
}
$time =date("H:i:s") ;
$logoutdate=date("Y-m-d");
$q2="UPDATE `sessions` SET `logout_time`='$time',`logout_date`='$logoutdate' WHERE (session_id='$sessId')";
$execQuery2=mysqli_query($conn,$q2);
  if((!isset($_SESSION['id']))||($_SESSION['id']=="")) echo"<script>window.location.href='./index/index.php'";

  session_unset();
  session_destroy();
  echo"<script>window.location.href='./index/signin.php'</script>";
?>
