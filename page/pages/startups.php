<?php
session_start();
if((!isset($_SESSION['id']))&&($_SESSION['id']=='')) header('Location:./index/index.php');
  include'./include/header.php' ;
  include'conn.php';
?>

<script type="text/javascript">

	 function addWork(id){

         $.ajax({
              type:'post',
              url:'include/addWork.php',
              data:{cid:id},
              success:function(data){
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
        <div id="page-wrapper"style="background:rgb(240,255,255);">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12"><br>

                      <!--Seach Bar-->
                      <form name="search" method="post" action="startups.php">
                        <div class="form-group input-group">
                                              <input type="text" placeholder="Search  by field , technology or category"class="form-control" name="search">
                                              <span class="input-group-btn">
                                                  <button  name="submit" type="submit"class="btn btn-primary" ><i class="fa fa-search"></i>
                                                  </button>
                                              </span>
                                          </div>

                      </form>
                        <!--Startup Displays-->

                        <?php
                          if((isset($_POST['submit']))&&($_POST['search']!="")){
                             $search=$_POST['search'];
                             if($search=="")   echo"<script>window.location.href='startups.php'</script>" ;//$query="SELECT * from startup_info ORDER by RAND()";
                             else if($search!="")  echo"<script>window.location.href='startups.php?query=$search'</script>" ;;//$query="SELECT * from startup_info where (field LIKE '%$search%') OR (technology LIKE '%$search%') OR (category LIKE '%$search%')ORDER by RAND()";
                           }

                             if((isset($_GET['query']))&&($_GET['query']!="")){
                               $search=$_GET['query'];
                             $query="SELECT * from startup_info where (field LIKE '%$search%') OR (technology LIKE '%$search%') OR (category LIKE '%$search%')ORDER by RAND() LIMIT 100";
                           }else if((isset($_GET['query']))&&($_GET['query']=="")) echo"<script>window.location.href='startups.php'</script>" ;
                           else $query="SELECT * from startup_info ORDER by RAND() LIMIT 100";





                          $execQuery=mysqli_query($conn,$query);
                          if(mysqli_num_rows($execQuery) > 0){
                            while($res=mysqli_fetch_array($execQuery)){

                        ?>


                      <div class="col-lg-6">
                    <div class="panel panel-default panel-custom">
                        <div class="panel-heading" >
                          <div class="alert alert-success">  <?php echo $res['name'];?> | <b><?php echo ucwords($res['category']);?></b></div>



                            <!-- Tab panes -->

                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home-pills">
                                  <?php
                                  $userId=$res['owner_id'];
                                  $q2="SELECT * from user_info where user_id='$userId'";
                                  $execQuery2=mysqli_query($conn,$q2);
                                  while($res2=mysqli_fetch_array($execQuery2)){
                                  ?>


                                    <h4><b>Founded by :</b>
                                  <?php echo $res2['name'];
                                  }
                                  ?>
                                   <br></h4>


                                  <!--  <img src="logo.jpg" alt="image" class="img-thumbnail">-->
                                      <p><?php

                                      if(strlen($res['description'])>140){
                                        echo substr($res['description'],0,135)."<a href='javascript:void(0)' data-toggle='tooltip' title='".$res['description']."'>more</a>";
                                      }else if(strlen($res['description'])==0) echo "<br>";
                                      else if(strlen($res['description'])>70 && strlen($res['description'])<140) echo $res['description']."<br>";
                                      else echo $res['description']."<br><br>";
                                       ?></p>
                                      <p>
                                        <b>Location :</b><?php
                                        if(strlen($res['location'])>54){
                                          echo substr($res['location'],0,49)."<a href='javascript:void(0)' data-toggle='tooltip' title='".$res['location']."'> more</a>";
                                        }else echo $res['location'];?><br>
                                        <b>Field :</b><?php
                                        if(strlen($res['field'])>57){
                                          echo substr($res['field'],0,52)."<a href='javascript:void(0)' data-toggle='tooltip' title='".$res['field']."'> more</a>";
                                        }
                                        else echo $res['field'];?><br>
                                        <b>Established on :</b><?php echo $res['edate'];?><br>
                                        <b>Technologies used :</b><?php
                                        if(strlen($res['technology'])>110){
                                          echo substr($res['technology'],0,109)."<a href='javascript:void(0)' data-toggle='tooltip' title='".$res['technology']."'> more</a>";
                                        }else if ((strlen($res['technology'])<110)&& (strlen($res['technology'])>45)) echo $res['technology'];
                                        else echo $res['technology']."<br>";?><br>
                                      </p>
                                      <p>
                                        <a type="button" href = "userProfile.php?user_id=<?php echo $res['owner_id'];?>"class="btn btn-primary custom">Profile</a>
                                      <button type="button" class="btn btn-primary custom" onClick="addWork(<?php echo $res['id'];?>);"><i class="fa fa-paperclip"></i>&nbsp;Clip</button>
                                       <a type="button" href ="messages.php?user_id=<?php echo $res['owner_id'];?>" class="btn btn-primary btn-circle custom"><i class="fa  fa-envelope-o"></i></a>

                                      </p>
                                      added on :<font color="grey"><?php echo $res['date']."  ".$res['time'];?></font>
                                    </div>



                            </div>
                        </div>

                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                </div>







                      <!--End Startup Displays-->

                      <?php
                            }
                          }
                    ?>


                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <?php
    						echo'<div class="alert alert-success"><center><a href="startups.php"><i class="glyphicon glyphicon-refresh"></i> Load More</a></center></div>';

    						?>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include'./include/footer.php' ?>
