
	<?php
	session_start();
    
    $conn =mysqli_connect('localhost','u500932511_root','@Lm10Cr7');
   
    if($conn->connect_error){
        die("Connection Error");
    }
	$userId=$_SESSION['id'];
     mysqli_select_db($conn,'u500932511_create');
	$chatId=$_GET['chat_id'];
    $result=$conn->query("SELECT * FROM message where sender_id='$userId' OR receiver_id='$userId' ORDER BY message_id DESC");
    if($result->num_rows >0){
?>
						  <div class="card-body">


						<?php

							while($res=mysqli_fetch_array($result)){
								if(($res['receiver_id']==$userId)&&($res['sender_id']==$chatId)){
						?>
							<div  class="col-md-8 " style="background:#4B0082;border-radius:10px;color:white;padding:5px;text-align:left;border:2px solid white;">
								<?php echo$res['message'];?>	<br>
								<font size=1.5px color="CCFFFF"><?php echo$res['time']."&nbsp;".$res['date'];?></font>
							</div>

							<?php
									//echo"<br>";
								}
								else if(($res['sender_id']==$userId)&&($res['receiver_id']==$chatId)){


							?>
							<div class="col-md-8 col-md-offset-4" style="background:#7D0552;border-radius:10px;color:white;padding:8px;text-align:left;border:1px solid white;">
								<?php echo$res['message'];?>
								<br><font size=1.5px color="CCFFFF"><?php echo$res['time']."&nbsp;".$res['date'];?></font>
							</div>

							<?php

								}
							}
						}

							?>


						  </div>
						  <div class="justlink"> <a name="end"></a></div>
