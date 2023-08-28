<?php
session_start();
include'./include/header.php';
include'./conn.php';

$userId=$_SESSION['id'];
$query="SELECT * from message where (sender_id='$userId') OR (receiver_id='$userId')ORDER by message_id DESC";
$execQuery=mysqli_query($conn,$query);
$unique=array();
//-----------------------------------------Setting status to 0---------------------------------
// $numMessagesToClear=numMessages($con,$id);
 $setStatus=mysqli_query($conn,"UPDATE `message` SET status=1  WHERE (receiver_id='$userId') AND (status=0) ");


if(mysqli_num_rows($execQuery)>0){
?>
<link rel="stylesheet" type="text/css" href="./include/style.css">
        <!-- Page Content -->

		<script>

		function redir(){
			var personId= document.getElementById("personId").value();
			var stringURL="messages.php?email="+personId;
			window.location.href=stringURL;
		}

		</script>

        <div id="page-wrapper" style="background-image:linear-gradient(#06beb6, #48b1bf);">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <br>


					<!--  <form method="post" action="redirect.php">
					   <div class="input-group ">
                                <input type="text" class="form-control" id="personId" placeholder="Enter email to start a new conversation">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button"  onclick="redir">
                                    <i class="fa fa-angle-double-right  "></i>
                                </button>
                            </span>
                            </div>

							</form>-->

							<hr>

					<!--*************************************************When user is sender********************************************************-->
					   <?php
							while($res=mysqli_fetch_array($execQuery)){
								if($res['sender_id']==$userId){
									if(!array_key_exists($res['receiver_id'],$unique)){
										$unique[$res['receiver_id']]=1;
										$receiver=$res['receiver_id'];
										$ex2=mysqli_query($conn,"SELECT * from user_info where user_id='$receiver'");
										while($res2=mysqli_fetch_array($ex2)){

					   ?>
					  <div class="alert alert-info">
                               <b><?php echo$res2['name'];?></b> &nbsp;&nbsp;&nbsp;<a href="messages.php?user_id=<?php echo$res['receiver_id'];?>#end" class="btn btn-primary">View Messages</a>
							   <p>You : <?php echo$res['message']?> <br><font size=1.5px ><?php echo$res['time']."&nbsp;".$res['date'];?></font></p>
                      </div>

					  <?php
										}
									}
								}

							//*****************************************When user is receiver**************************************************

							if($res['receiver_id']==$userId){
									if(!array_key_exists($res['sender_id'],$unique)){
										$unique[$res['sender_id']]=1;
										$sender=$res['sender_id'];
										$ex3=mysqli_query($conn,"SELECT * from user_info where user_id='$sender'");
										while($res3=mysqli_fetch_array($ex3)){



					  ?>


						<div class="alert alert-info">
                               <b><?php echo$res3['name'];?></b> &nbsp;&nbsp;&nbsp;<a href="messages.php?user_id=<?php echo$res['sender_id'];?>#end" class="btn btn-primary">View Messages</a>
							   <p><?php echo$res['message']?> <br><font size=1.5px ><?php echo$res['time']."&nbsp;".$res['date'];?></font></p>
                      </div>



						<?php

										}
									}
								}
							}
						?>
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
}
//else echo"No Message To display here";
include'./include/footer.php' ?>
