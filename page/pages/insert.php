<?php
session_start();

include'./conn.php';
$chat=$_GET['message'];
$userId=$_SESSION['id'];
$chatId=$_GET['user_id'];
//$message=$_POST["message"];
$time=date("H:i:s");
$date=date("Y-m-d");
if($chat!=""){
	$q="INSERT INTO `message`(`sender_id`, `receiver_id`, `date`, `time`, `message`) VALUES ('$userId','$chatId','$date','$time','$chat')";
	$exquery=mysqli_query($conn,$q);
}
echo"";
?>