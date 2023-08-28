<?php
  session_start();
  if((!isset($_SESSION['id']))&&($_SESSION['id']=='')) header('Location:./index/index.php');
  include'./include/header.php' ;
  include'conn.php';
?>
        <!-- Page Content -->
        <div id="page-wrapper" style="background:rgb(240,255,255);">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <br>


                      <?php
                        $query="SELECT * from investor_info";
                        $execQuery=mysqli_query($conn,$query);
                        if(mysqli_num_rows($execQuery) > 0){
                          while($res=mysqli_fetch_array($execQuery)){
                            $userId=$res['user_id'];
                            $query2="SELECT * from user_info where user_id='$userId'";
                            $execQuery2=mysqli_query($conn,$query2);
                          while($res2=mysqli_fetch_array($execQuery2)){
                      ?>


                      <div class="col-lg-4">
                  <div class="panel panel-default panel-custom">
                      <div class="panel-heading" >

                    <div class="alert alert-success"><center><font color=purple size:60px>  <?php
                          echo$res2['name'];
                      }
                      $query3="SELECT * FROM user_additional_info where user_id='$userId'";
                      $execQuery3=mysqli_query($conn,$query3);
                      while($res3=mysqli_fetch_array($execQuery3)){
                      ?></center></font></div>

                      <center>  <img src="user_profile/<?php echo $res3['picture'];  }?>" alt="Image" style="height:250px;width:auto;"class="img-thumbnail"><br><br></center>
                          <div class="alert alert-success"><p><b><?php echo $res['position'];?></b>,
                      <?php echo $res['organization'];?></p>
                        <p><b>Experience :</b>&nbsp;<?php echo $res['experience'];?></p>
                        <p><b>Investments made :</b>&nbsp;<?php echo $res['investments_no'];?></p>
                        <p><b>Qualities looking in a startup :</b>&nbsp;<?php echo $res['qualities'];?></p></div>

                       <a type="button" href = "userProfile.php?user_id=<?php echo $res['user_id'];?>" class="btn btn-primary custom">View Profile</a>&nbsp;
                          <a type="button"  href = "messages.php?user_id=<?php echo $res['user_id'];?>"class="btn btn-success custom"><i class="fa  fa-envelope-o"></i></a>
                      </div>
                  </div>
              </div>
            <?php }
            }
          //}else echo'<div class="alert alert-danger"> Sorry Nothing to display here. <class="alert-link">Alert Link</a>. </div>';
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
<?php include'./include/footer.php'; ?>
