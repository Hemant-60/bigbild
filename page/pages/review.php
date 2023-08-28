<?php
session_start();
if((!isset($_SESSION['id']))&&($_SESSION['id']=='')) header('Location:./index/index.php');
include_once'./include/header.php' ;
include'conn.php';
?>
<?php
$id=$_SESSION['id'];
  if(isset($_POST['submit'])){
    $email=$_POST['reportemail'];
    $subject=$_POST['reportsubject'];
    $complain=$_POST['complain'];
    $date=date("Y-m-d") ;
    $time=date("h:i:sa");
    if((!($email==""))&&(!($complain==""))){
      $postComp=mysqli_query($conn,"INSERT INTO `report`( `submitted_by`, `reported_user`, `subject`, `body`, `date`, `time`) VALUES ('$id','$email','$subject','$complain','$date','$time')");
      if($postComp) echo"<script>window.location.href='./users.php'</script>";
    }
  }
  if(isset($_POST['submit1'])){
  //  $email=$_POST[''];
    $subject=$_POST['revsub'];
    $review=$_POST['review'];
    $date=date("Y-m-d") ;
    $time=date("h:i:sa");
    if(!($review=="")){
      $postComp=mysqli_query($conn,"INSERT INTO `review`( `submitted_by`, `subject`, `review`, `date`, `time`) VALUES ('$id','$subject','$review','$date','$time')");
      if($postComp) echo"<script>window.location.href='./users.php'</script>";
    }
  }

?>


        <!-- Page Content -->

        <div id="page-wrapper" style="background:rgb(240,255,255)">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                      <br>

                      <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">


                            <div class="panel-group" id="accordion">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">Report a User</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                          <form method="POST" action="review.php">
                                          <input class="form-control" placeholder="Enter email of the user" name="reportemail"><br>
                                          <input class="form-control" placeholder="Subject" name="reportsubject"><br>
                                          <textarea class="form-control" rows="3" placeholder="Enter your complain here" name="complain"></textarea><br>
                                          <button type="submit" name="submit" class="btn btn-primary">Post</button>
                                        </form>

                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false">Review / Issues</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">

                                          <form method="POST" action="review.php">
                                            <input class="form-control" name="revsub" placeholder="Enter Subject"><br>
                                            <textarea class="form-control" name="review" rows="3" placeholder="Enter your review or issues here"></textarea><br>
                                            <button type="submit" class="btn btn-primary" name="submit1">Post</button>
                                          </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
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
