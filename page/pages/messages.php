<link rel="stylesheet" type="text/css" href="./include/style.css">

<!-- ********************************************SCRIPT 3For including JQuery File****************************************************************-->
<script type="text/javascript" src="jquery.js">
						</script>
<!-- ********************************************SCRIPT 1****************************************************************-->
						<script type="text/javascript">

							$(document).ready(function(){
								setInterval(function(){
									$('#show').load('reloadtest.php?chat_id='+document.getElementById("rec").value+"#end");
								},500);
							});
							//window.location.href="#end";
						</script>
<!-- ********************************************SCRIPT 2****************************************************************-->
						<script type="text/javascript">
						var scrolled = false;
							function updateScroll(){
								if(!scrolled){
									var element = document.getElementById("show");
									element.scrollTop = element.scrollHeight;
								}
							}

							$("#show").on('scroll', function(){
								scrolled=true;
							});

							var out = document.getElementById("show");
								// allow 1px inaccuracy by adding 1
								var isScrolledToBottom = out.scrollHeight - out.clientHeight <= out.scrollTop + 1;
						</script>

<!-- ********************************************SCRIPT 3****************************************************************-->
						<script type="text/javascript">



							function aa(){

								var xmlhttp=new XMLHttpRequest();
								xmlhttp.open("GET","insert.php?message="+document.getElementById("chat").value+"&user_id="+document.getElementById("rec").value,false);
								xmlhttp.send(null);

								document.getElementById("chat").value=xmlhttp.responseText;
								document.getElementById("chat").value="";

							}

						</script>




<?php

//------------------------------------------------Loading Into messages------------------------------------------------------------------------
session_start();


include'./include/header.php' ;
include'./conn.php';
$userId=$_SESSION['id'];
if((!isset($_GET['user_id']))||($_GET['user_id']=="")){
	if((!isset($_GET['email']))||($_GET['email']=="")){
		echo"<script>window.location.href='chats.php'</script>";
	}
}
else if(($_GET['user_id'])==$userId) echo"<script>window.location.href='chats.php'</script>";
else{
	if(isset($_GET['user_id'])){
		$chatId=$_GET['user_id'];
	}else{
		$email=$_GET['email'];
		$getId=mysqli_query($conn,"SELECT * FROM user_info where email='$email'");
		if(mysqli_num_rows($getId)>0) {
			while($resultgetId=mysqli_fetch_array($getId)){
				$chatId=$resultgetId['user_id'];
			}
		}
		else echo"<script>window.location.href='chats.php'</script>";
	}
	//$Check=mysqli_query($conn,"SELECT * from message where ((sender_id='$userId')AND ((receiver_id='$userId'))) OR (receiver_id='$userId')");

	$newUser=mysqli_query($conn,"SELECT * from user_info where user_id='$chatId'");
	$execQuery=mysqli_query($conn,"SELECT * from message where ((sender_id='$userId')AND(receiver_id='$chatId')) OR ((sender_id='$chatId')AND(receiver_id='$userId'))");
	if((mysqli_num_rows($execQuery)>0)||(mysqli_num_rows($newUser)>0)){


?>

<?php
//------------------------------------------------Inserting Into messages------------------------------------------------------------------------
							if(isset($_POST['submit'])){
								$message=$_POST["message"];
								$time=date("H:i:s");
								$date=date("Y-m-d");
								if($message!=""){
									$q="INSERT INTO `message`(`sender_id`, `receiver_id`, `date`, `time`, `message`) VALUES ('$userId','$chatId','$date','$time','$message')";
									$exquery=mysqli_query($conn,$q);
									if($exquery) echo"<script>window.location.href='messages.php?user_id=".$chatId."'</script>";
									//else echo"not executed";
								}//else echo"Message cant be empty";
							}

?>


        <!-- Page Content -->
        <div id="page-wrapper" style="background:#f2f2f2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <br>


					  <div class="panel panel-default panel-custom">

                        <div class="panel-body" style ="background:#e6ffff">
													<div class="alert alert-success">
														<?php
															$ex=mysqli_query($conn,"SELECT * from user_info where user_id ='$chatId'");
															while($result=mysqli_fetch_array($ex)){



														?>
														<a href="userProfile.php?user_id=<?php echo$chatId?>"><?php
															$selectImage=mysqli_query($conn,"SELECT *FROM user_additional_info where user_id='$chatId'");
															while($res=mysqli_fetch_array($selectImage)){
																$source=$res['picture'];
															}
															echo"<img src='user_profile/".$source."' style='width:auto;height:50px;border-radius:10px;Box-shadow:0px 0px 10px #999999'>";

														echo"   ".$result['name']."&nbsp; | &nbsp;".$result['email'];?></a>
														<?php

															}
														?>
													</div>

							<!-- Grid column -->
<!--**********************************************************Submitting messages********************************************************	-->
							<form method="post" name="form" action="">
								<div class="col-md-8">
								<div class="form-group">
																								<textarea class="form-control cform" placeholder="message here"name="chat" id="chat" name="chat" rows="1" ></textarea>
													<input type="hidden" id="rec" value="<?php echo $_GET['user_id'];?>">
														 </div></div>
								 <div class="col-md-4">
								 <button type="button" name="btn" class="btn btn-info btn-circle btn-md" onClick="aa();"><i class="fa fa-arrow-right  "></i>
																</button>
									</div>

								</form>
					  <div class="col-md-12 mb-6">
						<!-- Exaple 1 -->

<!--*********************************************Displaying Messages*****************************************************************-->
						<div id ="show" class="card example-1 scrollbar-deep-purple bordered-deep-purple thin" >


						</div><br>
						<div class="alert alert-success"><font color="red">Latest Messages are at the top</font></font>




						<!-- Exaple 1 -->

					  </div>

					  <!-- Grid column -->


							<a name="end"></a>
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
	}else echo"<script>window.location.href='chats.php'</script>";
		//else echo"<script>window.location.href='chats.php'</script>";
}
include'./include/footer.php' ?>
