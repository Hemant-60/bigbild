<?php
include'conn.php';
$flag=0;
session_start();
if(isset($_SESSION['id'])&&($_SESSION['id']!='')) header('Location:../users.php');

  else  if(isset($_POST['submit'])){
      $email=$_POST['email'];
      $pass=$_POST['pass'];
      $pass=md5($pass);
       if(($email!='')&&($pass!='')){
         $query="SELECT * from user_info where email='$email' and password='$pass'";
         $execQuery=mysqli_query($conn,$query);
         if(mysqli_num_rows($execQuery) > 0){
           while($res=mysqli_fetch_array($execQuery)){
             //session_start();
             $_SESSION['id'] =$res['user_id'];
             $_SESSION['name']=$res['name'];
             $_SESSION['email']=$res['email'];

             $sessid=$res['user_id'];
             $time_login =date("H:i:s") ;
             $date_login=date("Y/m/d");
             $query2="INSERT INTO `sessions`(`user_id`, `date`, `login_time`) VALUES ('$sessid','$date_login','$time_login')";
             $execQuery2=mysqli_query($conn,$query2);
             //echo $_SESSION["email"].$_SESSION["id"].$_SESSION["name"];
             echo"<script>window.location.href='../users.php'</script>";

             }

         }else{
           $flag=1;
        }
       }
    }
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BigBild | Home</title>


    <link href="lp/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link href="lp/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="lp/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


    <link href="lp/css/landing-page.min.css" rel="stylesheet">

  </head>

  <body>


    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="index.php"><font color="purple"><b><!--<img src="logo.png" style="width:35px;height:35px;border-radius:100px;">--> BigBild</b></font></a>
        <a class="btn btn-primary" href="signin.php">Sign In</a>
      </div>
    </nav>

    <center>
      <div class="container">
      <div class ="col-md-6">
        <div class="card card-login mx-auto mt-5">
          <div class="card-header"> Login <br> </div>

          <div class="card-body">

            <?php if ($flag) echo"<font color='red'> Details are Incorrect</font>";?>
            <form name="form1" method="post" action="signin.php">

              <div class="form-group">
                <label for=>Email address</label>
                <input name ="email" class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label >Password</label>
                <input name="pass"  class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
              </div>


              <button type="submit" name="submit" class="btn btn-primary btn-block">Signin</button>
            </form>
            <div class="text-center">
              <a class="d-block small mt-3" href="signup.php">Register an Account</a>
              <a class="d-block small mt-3" href="forgotPassword.php">Forgot Password</a>
              <hr>

              <!--************************************************Forgot Passwowrd**********************************************-->


            </div>
          </div>
        </div>
      </div>






</div>





</center>
<br>








    <footer class="footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
              <li class="list-inline-item">
                <!-- <a href="#">About</a>
              </li>

              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a> -->
              </li>
            </ul>
            <p class="text-muted small mb-4 mb-lg-0"> </p>
          </div>
          <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            &copy; &nbsp;<font color="purple"><b>BigBild</b></font> All Rights Reserved.
          </div>
        </div>
      </div>
    </footer>

    <script src="lp/vendor/jquery/jquery.min.js"></script>
    <script src="lp/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
