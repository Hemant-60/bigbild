
<?php
session_start();
if((!isset($_SESSION['id']))&&($_SESSION['id']=='')) header('Location:./index/index.php');
include_once'./include/header.php' ;
include'conn.php';
$uid=$_SESSION['id'];
?>


<script type="text/javascript" src="jquery.js">
</script>

<script type="text/javascript">
    $(document).ready(function(){
        setInterval(function(){
            $('#show').load('message.php')
        },1000);
    });
</script>

<?php
$query ="SELECT * from message where sender_id='$uid' OR receiver_id='$uid' order by message_id DESC";
$execQuery=mysqli_query($conn,$query);

 ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <br>
<?php
if(mysqli_num_rows($execQuery)>0){
  while($res=mysqli_fetch_array($execQuery)){
    if($res['sender_id']==$uid){
?>
                <div id="show">
                <div class="col-lg-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">

                          <?php
                          $receiver=$res['receiver_id'];
                          $q2="SELECT * from user_info where user_id='$receiver'";
                          $eq2=mysqli_query($conn,$q2);
                          while($res2=mysqli_fetch_array($eq2)){
                            $receiver_name=$res2['name'];
                            $receiver_email=$res2['email'];
                          }
                          ?>
                            To : <?php echo $receiver_name." ( ".$receiver_email." ) ";?>
                        </div>
                        <div class="panel-body">
                            <p><b>Subject :</b><?php echo $res['subject'];?>
                              <p><b>Message : </b><br><?php echo $res['message'];?></p>
                        </div>
                        <div class="panel-footer">
                            sent on : <?php echo $res['date']."&nbsp;".$res['time'];?>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div></div>

<?php
  }
  else if($res['receiver_id']==$uid){


?>

                <div class="col-lg-6">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                    <?php
                    $sender=$res['sender_id'];
                    $q3="SELECT * from user_info where user_id='$sender'";
                    $eq3=mysqli_query($conn,$q3);
                    while($res3=mysqli_fetch_array($eq3)){
                      $sender_name=$res3['name'];
                      $sender_email=$res3['email'];
                      $sender_id=$res3['user_id'];
                    }
                    ?>
                      From : <?php echo $sender_name." ( ".$sender_email." ) ";?>
                  </div>
                  <div class="panel-body">
                    <p><b>Subject :</b><?php echo $res['subject'];?>
                      <p><b>Message : </b><br><?php echo $res['message'];?></p>
                      <a type="button" href="sendMessage.php?user_id=<?php echo $sender_id;?>"class="btn btn-primary"><i class="fa fa-mail-reply"></i>  Reply</a>
                      <a type="button" href="userProfile.php?user_id=<?php echo $sender_id;?>"class="btn btn-primary">View User Profile</a>
                  </div>
                  <div class="panel-footer">
                      received on : <?php echo $res['date']."&nbsp;".$res['time'];?>
                      </div>
              </div>
              <!-- /.col-lg-4 -->
          </div>


<?php
    }/*Block for data when receiver id is of the current user*/
  }/*Block for $res*/
} /*Block for number of rows fetched*/?>
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
<?php include'./include/footer.php'; ?>
