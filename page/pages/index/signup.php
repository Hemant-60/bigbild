<?php
session_start();
if(isset($_SESSION['id'])&&($_SESSION['id']!='')) header('Location:../users.php');
    include'conn.php';
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $pass=md5($pass);
        $user=$_POST['name'];
        $confirmpass=$_POST['confirmpass'];
        $confirmpass=md5($confirmpass);
        if(($email!='')&&($pass!='')&&($user!='')&&($confirmpass!='')){
            if($pass==$confirmpass){
              $time_login =date("H:i:s") ;
              $date_login=date("Y/m/d");
                      $q= "INSERT INTO `user_info`( `name`,`email`, `password`,`reg_time`,`reg_date`) VALUES ('$user','$email','$pass','$time_login','$date_login')";
                      $query = mysqli_query($conn, $q);

                      //$verifyQuery=mysqli_query($conn,"INSERT INTO `verify`(`id`, `user_id`, `code`, `verify`) VALUES ([value-1],[value-2],[value-3],[value-4])");

                if($query){

                   $q2="SELECT * from user_info where email='$email'";
                   $query2=mysqli_query($conn,$q2);
                  while ($res=mysqli_fetch_array($query2)){
                    //session_start();
                  $_SESSION['email'] =$email;
                   $_SESSION['id'] =$res['user_id'];
                   $_SESSION['name']=$res['name'];
                   $sessid=$res['user_id'];
                //   $time_login =date("H:i:s") ;
                  // $date_login=date("Y/m/d");

                  $check=mt_rand(1000,9999);
                   $verifyQuery=mysqli_query($conn,"INSERT INTO `verify`( `user_id`, `code`, `verify`) VALUES ('$sessid','$check',0)");
                   $headers = "From: support@bigbild.com\r\n";
                    $headers .= "Reply-To: support@bigbild.com\r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                   $str='<html><body>';
                   $str.='<center><div class="email" style="background:blue;border-radius:30px;';
                   $str.='background-image: linear-gradient(-20deg, #d558c8 0%, #24d292 100%);';
                   $str.='padding:30px;';
                   $str.='color:white;';
                  $str.=' width:200px;';
                  $str.=' height:auto;';
                   $str.='"><h4>Your Code for Account Verification @ <u>BigBild</u> is </h4>';
                   $str.='<h1>';
                   $str.=$check;
                   $str.='</h1></div></center></body></html>';
                   mail($email,'Verification Code For BigBild Account',$str,$headers);


                   $query3="INSERT INTO `sessions`(`user_id`, `date`, `login_time`) VALUES ('$sessid','$date_login','$time_login')";
                   $execQuery3=mysqli_query($conn,$query3);
                   $defaultpic="default.png";
                   $query4="INSERT into `user_additional_info`(`user_id`,`picture`) VALUES('$sessid','$defaultpic')";
                   $execQuery4=mysqli_query($conn,$query4);
                 }
                   //echo $_SESSION['email'].$_SESSION['id'].$_SESSION['name'];
                  echo"<script>window.location.href='../users.php'</script>";

                }else{
                        echo"<script>alert('Record already exists')</script>";
                }

          }
            else{
                echo"<script>alert('Passwords doesnt match.');</script>";
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
        <a class="navbar-brand" href="index.php"><font color="purple"><b>BigBild</b></font></a>
        <a class="btn btn-primary" href="signin.php">Sign In</a>
      </div>
    </nav>

    <center><div class="container">
      <div class ="col-md-6">
        <div class="card card-login mx-auto mt-5">
          <div class="card-header"> Signup</div>
          <div class="card-body">
            <form name="frm1" method="post" action="signup.php">
              <div class="form-group">
                <label>Full Name</label>
                <input class="form-control" name="name" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter your name">
              </div>
              <div class="form-group">
                <label for=>Email address</label>
                <input class="form-control" name="email" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label >Password</label>
                <input class="form-control" name="pass"id="exampleInputPassword1" type="password" placeholder="Password">
              </div>
              <div class="form-group">
                <label >Confirm Password</label>
                <input class="form-control" name="confirmpass"id="exampleInputPassword1" type="password" placeholder="Confirm Password">
              </div>
              <div class="form-group">

                <div class="alert alert-success">
                  By Clicking on Signup You agree to our <a href="#" class="alert-link">Terms and Policy</a>.
                  </div>


              </div>
              <button type="submit" name="submit" class="btn btn-primary btn-block" >Signup</button>

            </form>

          </div>
        </div>
      </div>

</div></center><br>









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
