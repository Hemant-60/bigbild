<?php
  session_start();
  if((!isset($_SESSION['id']))&&($_SESSION['id']=='')) header('Location:./index/index.php');
  include'./include/header.php' ;
  include'conn.php';
  if(isset($_GET['user_id'])){
    $to=$_GET['user_id'];
    $sqlQuery3="SELECT * from user_info where user_id='$to'";
    $execQuery3=mysqli_query($conn,$sqlQuery3);
    if(mysqli_num_rows($execQuery3) > 0){
        while($res3=mysqli_fetch_array($execQuery3)){
          $receiver_email=$res3['email'];
        }
    }
  }else $receiver_email="";
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                      <br>
                      <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Message
                        </div>
                        <div class="panel-body">
                          <form name="message" method="post" action="sendMessage.php">
                          <div class="form-group">
                                            <label>Receiver's Email : </label>
                                            <input class="form-control" name="remail" value="<?php echo $receiver_email;?>">
                                        </div>
                                        <div class="form-group">
                                                                              <label>Enter Subject : </label>
                                                                              <input class="form-control" name="subject">
                                                                          </div>

                                                                          <div class="form-group">
                                                                                    <label>Enter your message here :</label>
                                                                                    <textarea class="form-control" rows="5" name="message"></textarea>
                                                                                </div>

                          </div>
                        <div class="panel-footer">
                            <button type="submit" name="submit" class="btn btn-primary"> Send Message</button>
                        </div>
                        </form>
                    </div>
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






<?php
if(isset($_POST['submit'])){
  $remail=$_POST['remail'];
  //echo "<script>alert('".$remail."')</script>";
  $subject=$_POST['subject'];
  $message=$_POST['message'];
  $time =date("H:i:s") ;
  $date=date("Y/m/d");
  $sender_id=$_SESSION['id'];

  $Query="SELECT * from user_info where email='$remail'";
  $execQuery=mysqli_query($conn,$Query);
  if(mysqli_num_rows($execQuery) > 0){
      while($res=mysqli_fetch_array($execQuery)){
        $receiver_id=$res['user_id'];
      }
      //echo$receiver_id;
      if(($remail!='')&&($message!='')){
        if($receiver_id==$sender_id)echo"<script>alert('You cannot send message to yourself.')</script>";
        else {$sqlQuery2="INSERT INTO `message`(`sender_id`, `receiver_id`, `date`, `time`, `message`, `subject`) VALUES ('$sender_id','$receiver_id','$date','$time','$message','$subject')";
        $execQuery2=mysqli_query($conn,$sqlQuery2);
        if($execQuery2) echo"<script>alert('Message Sent')</script>";}
      }
  } else echo"<script>alert('User Doesn't Exist)</script>";
}




include'./include/footer.php' ?>
