<?php
include'conn.php';

?>
<?php
  $disp=0;

    if(isset($_POST['submit'])){
      $forgotEmail=$_POST['Forgotemail'];
      if($forgotEmail!="") echo"<script>window.location.href='forgotPassword.php?email=$forgotEmail'</script>";
    }

    if((isset($_GET['email']))&&($_GET['email']!="")&&(!isset($_POST['submit2']))){
      $disp=1;
      $email=$_GET['email'];
      $q=mysqli_query($conn,"SELECT * from user_info where email='$email'");
      if(!$q)  echo"<script>window.location.href='forgotPassword.php'</script>";
      if(mysqli_num_rows($q)>0){
        while($res=mysqli_fetch_array($q)){
           $id=$res['user_id'];
         }


        $check=mt_rand(10000000,99999999);
         $verifyQuery=mysqli_query($conn,"INSERT INTO `forgotpass`(`email`, `email_key`) VALUES ('$email','$check')");
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
                   $str.='"><h4>Your Code for Password Reset @ <u>BigBild</u> is </h4>';
                   $str.='<h1>';
                   $str.=$check;
                   $str.='</h1></div></center></body></html>';
                   mail($email,'Verification Code For BigBild Account',$str,$headers);
      }//else echo"<script>alert('No record exists with this name.');</script>";




    }

    $notChanged=0;

    if((isset($_POST['submit2']))&&(isset($_GET['email']))){
      $emailChange=$_GET['email'];
      $key=$_POST['key'];
      $newp=md5($_POST['newp']);

      $cnewp=md5($_POST['cnewp']);

      $getKey=mysqli_query($conn,"SELECT * FROM forgotpass where email='$emailChange' ORDER by id DESC LIMIT 1");

      while($res2=mysqli_fetch_array($getKey)){
        $keyToEvaluate=$res2['email_key'];
      }

      if(($keyToEvaluate==$key)&&($newp==$cnewp)&&($newp!="")&&($cnewp!="")){
        $updatePass=mysqli_query($conn,"UPDATE `user_info` SET `password`='$newp' WHERE email='$emailChange'");
        if($updatePass)echo"<script>window.location.href='signin.php?SUCCESS'</script>";
        else {
          $notChanged=1;
          echo"<script>window.location.href='signin.php?FAILURE'</script>";
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

    <center>
      <div class="container">
      <div class ="col-md-6">
        <div class="card card-login mx-auto mt-5">
          <div class="card-header"> Forgot Password</div>
          <div class="card-body">

            <div class="text-center">



            <?php
            //<!--************************************************Forgot Passwowrd**********************************************-->
             if($disp==0){
              ?>
              <form name="ForgotPass" method="post" action="forgotPassword.php">

                <div class="form-group">
                <label for=>Email address</label>
                <input name ="Forgotemail" class="form-control"  type="email" placeholder="Enter email">
              </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block">Reset Password</button>

            </form>
            <?php
          }else if($disp==1){
            if($notChanged==1) echo"<font color='red'>Password Not changed Please check all the fields</font>";
            ?>

            <form name="form" method="post" action="forgotPassword.php?email=<?php echo$email;?>">
              <label>Key here</label>
                <input type="text" class="form-control" placeholder="Key Sent to your email" name="key"><br>
                  <label>New Password</label>
                <input class="form-control"type="password" placeholder="New Password" name="newp"><br>
                  <label>Confirm new password</label>
                <input class="form-control" type="password"placeholder="Re-type New Password" name="cnewp"><br>
                <button type="submit" name="submit2" class="btn btn-success">Update Password</button>

            </form>

          <?php
           }
          ?>

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
