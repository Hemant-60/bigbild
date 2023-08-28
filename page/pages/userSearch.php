<?php
session_start();
if(isset($_GET['skills'])) unset($_GET['skills']);
if(isset($_POST['submit'])){
  $searchUser=$_POST['search_user'];
  //echo"$searchUser";
  if($searchUser!=""){
    echo"<script>window.location.href='users.php?name=$searchUser'</script>";
  }else echo"<script>window.location.href='users.php'</script>";
}else echo"<script>window.location.href='users.php'</script>";
?>
