<?php
session_start();
if((!isset($_SESSION['id']))&&($_SESSION['id']=='')) header('Location:./index/index.php');
include_once'./include/header.php' ;
include'conn.php';
	$greater=0;
?>
<script type="text/javascript" src="jquery.js">
						</script>
<script type="text/javascript">

function addClip(id){

        $.ajax({
             type:'post',
             url:'include/clipAdd.php',
             data:{cid:id},
             success:function(data){
               document.getElementById("btnClip").value="Clipped";
             }
        });
  }


$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});


$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});


</script>

        <!-- Page Content -->
        <div id="page-wrapper" style="background:rgb(240,255,255)"><?php //background:rgb(240,255,255) background-image:linear-gradient(#bdc3c7 ,#2c3e50);">
        ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <br>

                      <!--Seach Bar-->
                      <form name="search" method="post" action="users.php">
                        <div class="form-group input-group">
                                              <input type="text" placeholder="Search for people by skills"class="form-control" name="search">
                                              <span class="input-group-btn">
                                                  <button class="btn btn-primary"  name="submit" type="submit"><i class="fa fa-search"></i>
                                                  </button>
                                              </span>
                                          </div>

                      </form>




<?php
if((isset($_POST['submit']))&&($_POST['search']!="")) {
  $search=$_POST['search'];
  echo"<script>window.location.href='users.php?skills=$search'</script>";
}
  if(isset($_GET['name'])){
    $name=$_GET['name'];
    $query="SELECT * from user_info where (name LIKE '%$name%') OR (email LIKE '%$name%') ORDER by RAND() LIMIT 99";
  }else $query="SELECT * from user_info ORDER by RAND() LIMIT 99";
  $execQuery=mysqli_query($conn,$query);
$count=0;
  if(mysqli_num_rows($execQuery)>0){
  while($res=mysqli_fetch_array($execQuery)){
    $userId=$res['user_id'];
    if(isset($_GET['skills'])){
      $skills=$_GET['skills'];
      $query2="SELECT * from user_additional_info where (skills LIKE '%$skills%')AND (user_id='$userId') ORDER by RAND() LIMIT 99";
    }else{
      $query2="SELECT * from user_additional_info where user_id='$userId' ORDER by RAND() LIMIT 99";
    }
    $execQuery2=mysqli_query($conn,$query2);
    while($res2=mysqli_fetch_array($execQuery2)){
			$clipped=mysqli_query($conn,"SELECT * FROM clips WHERE clipped='$userId'");
			$clips=mysqli_num_rows($clipped);
		//	while($res=mysqli_fetch_array($clipped)) $clipped=$res;
    //  ++$count;
?>
                      <div class="col-lg-4">
                  <div class="panel panel-default panel-custom" >
                      <div class="panel-heading" style="background:#ffffff;">
                        <div class="alert alert-success " ><center><font color=purple size:60px> <?php echo $res['name'];?></font></center></div>

                      <center> <img src="user_profile/<?php echo $res2['picture'];?>" alt="Image" style="height:250px;width:auto;"class="img-thumbnail">
                     </center><br>
                  <div class="alert alert-success">   <p>&nbsp;

                    <?php
                    //-image:linear-gradient(#aa076b,#61045f); for panel background
                        if(strlen($res2['status'])>33){
                          echo substr($res2['status'],0,33)."...";
                        }else echo $res2['status'];
                      // echo $res2['status'];
                    ?> </p>
                        <p>knows &nbsp;<?php
                          if(strlen($res2['skills'])>22){
                            echo substr($res2['skills'],0,20)."...";
                          }else echo $res2['skills'];
                        ?> </p>
                        <p>from &nbsp;



													<?php
														$addr=$res2['hometown']." , ".$res2['country'] ;
														if(strlen($addr)>35){
	                            echo substr($addr,0,35)."...";
	                          }else echo $addr;
													 ?>  </p>
													 <?php
													 	if($clips==1) echo "Clipped <b>$clips </b> time.";
														else echo "Clipped <b>$clips </b>times.";
													 ?>

                        <p>Investor

                        <?php
                          $qinv="SELECT * from investor_info where user_id='$userId'";
                          $execinv=mysqli_query($conn,$qinv);
                          if(mysqli_num_rows($execinv)>0) echo'<font color="green"><i class="fa fa-check"></i></font>';
                          else echo'<font color="Red"><i class="fa  fa-times"></i></font></p>';
                        ?></div>
												<?php
													$beenClipped=0;
													$clipper=$_SESSION["id"];
													$clipped=$res['user_id'];
													$checkClipped=mysqli_query($conn,"SELECT * FROM clips where clipped_by='$clipper' AND clipped='$clipped'");
													if(mysqli_num_rows($checkClipped)>0) $beenClipped=1;
												?>

                          <a type="button" href = "userProfile.php?user_id=<?php echo $res['user_id'];?>"class="btn btn-primary custom">View Profile</a>&nbsp;
												<?php
													if($beenClipped){ echo'<button type="submit" class="btn btn-primary custom" disabled>Clipped</button>';}
													else{
												?>
                        <button type="button" class="btn btn-primary custom" onClick="addClip(<?php echo $res['user_id'];?>);"><i class="fa fa-paperclip"></i>&nbsp;Clip</button>

												<?php
												}
												?>
												&nbsp;  <a type="button" href = "messages.php?user_id=<?php echo $res['user_id'];?>"class="btn btn-success btn-circle custom"><i class="fa  fa-envelope-o"></i></a>
                      </div>
                  </div>
              </div>
<?php
  }
}
//if($count%3==2) echo"<hr>";
?>

<?php
}
?>



                    </div>

                    <!-- /.col-lg-12 -->

                </div>
                <!-- /.row -->





            </div>
            <!-- /.container-fluid -->
						<?php
						echo'<div class="alert alert-success"><center><a href="users.php"><i class="glyphicon glyphicon-refresh"></i> Load More</a></center></div>';

						?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include'./include/footer.php' ?>
