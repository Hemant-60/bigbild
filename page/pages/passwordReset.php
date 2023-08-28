<?php
session_start();
if((!isset($_SESSION['id']))&&($_SESSION['id']=='')) header('Location:./index/index.php');
  include'./include/header.php' ;
  include'conn.php';
$id=$_SESSION['id'];
$passCheck=0;

?>

<?php
  if(isset($_POST['submit'])){
    $pass=md5($_POST['prevPass']);
    $newpass=md5($_POST['NewPass']);
    $newpassConfirm=md5($_POST['ReNewPass']);


    if(($pass=="")||($newpass=="")||($newpassConfirm=="")) $passCheck=1;
    else{
      $q=mysqli_query($conn,"SELECT * from user_info where user_id='$id'");
      while($res=mysqli_fetch_array($q)){
        $currentPass=$res['password'];
      }

      if(($pass!="")&&($newpass==$newpassConfirm)){
        $updatePass=mysqli_query($conn,"UPDATE `user_info` SET `password`='$newpass' WHERE user_id='$id'");
        if($updatePass) $passCheck=3;
      }else $passCheck=2;

    }

  }
?>

        <!-- Page Content -->
        <div id="page-wrapper" style="background-image:linear-gradient(#06beb6, #48b1bf);">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                      <br>
                      <div class="alert alert-info">
                        <form name="form" method="post" action="passwordReset.php">
                          <?php
                          if($passCheck!=0){
                            if($passCheck==1) echo"<font color=red>Fields Cannot be Empty</font>";
                            else if($passCheck==3) echo"<font color=green>Password changed</font>";
                            else if($passCheck==2) echo"<font color=red>New password and Retype password must be same</font>";
                          }
                          ?>
                            <input type="password" class="form-control" placeholder="Existing Password" name="prevPass"><br>
                            <input class="form-control"type="password" placeholder="New Password" name="NewPass"><br>
                            <input class="form-control" type="password"placeholder="Re-type New Password" name="ReNewPass"><br>
                            <button type="submit" name="submit" class="btn btn-success">Update Password</button>

                        </form>

                      </div>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include'./include/footer.php' ?>
