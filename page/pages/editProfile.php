<?php
session_start();
if((!isset($_SESSION['id']))&&($_SESSION['id']=='')) header('Location:./index/index.php');
include_once'./include/header.php' ;
include'conn.php';
$userId=$_SESSION['id'];
$query="SELECT * from user_additional_info where user_id='$userId'";
$execQuery=mysqli_query($conn,$query);
$query2="SELECT * from user_info where user_id='$userId'";
$execQuery2=mysqli_query($conn,$query2);
$thedob="0000-00-00";
while($res2=mysqli_fetch_array($execQuery2)){
  $name=$res2['name'];
}
 ?>
        <!-- Page Content -->
        <div id="page-wrapper" style="background:#d9d9d9;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <br>


                      <div class="col-lg-12">
                    <div class="panel panel-default panel-custom">
                        <div class="panel-heading">
                          <div class="alert alert-success">
                  Basic Info.</div>

                          <form name="formbasic" method="POST" action="editProfile.php">


                            <?php
                              while($res=mysqli_fetch_array($execQuery)){
                                $image=$res['picture'];

                            ?>

                            <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" value="<?php echo $name;?>">
                            </div>

                            <div class="form-group">
                                            <label>Qualification</label>
                                            <input class="form-control" name="qual" value="<?php echo $res['qualification'];?>">
                            </div>
                            <div class="form-group">
                                            <label>Skills</label>
                                            <input class="form-control"name="skills" value="<?php echo $res['skills'];?>">
                            </div>
                            <div class="form-group">
                                            <label>Date of Birth : &nbsp;&nbsp; <?php echo $res['dob'];$thedob=$res['dob'];?></label>
                                            <input type="date" class="form-control" name="dob" value="<?php echo $res['dob'];?>">
                            </div>


                            <div class="form-group">
                                            <label>Home Town</label>
                                            <input class="form-control"name="hometown" value="<?php echo $res['hometown'];?>">
                            </div>
                            <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" name="phone" value="<?php echo $res['phone'];?>">
                            </div>
                            <div class="form-group">
                                            <label>Country</label>
                                            <input class="form-control" name="country" value="<?php echo $res['country'];?>">
                            </div>
                            <div class="form-group">
                                            <label>Profession</label>
                                            <input class="form-control" name="profession" value="<?php echo $res['profession'];?>">
                            </div>
                            <div class="form-group">
                                            <label>Status</label>
                                            <input class="form-control" name="status" value="<?php echo $res['status'];?>">
                            </div>



                            <?php
                              }
                            ?>

                            <button type="submit" style="border-radius:15px;" name="submit" class="btn btn-primary custom">Make Changes</button>
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
if(isset($_POST["submit"])){
  $name= $_POST['name'];
  $qual= $_POST['qual'];
  $skills= $_POST['skills'];
  $dob= $_POST['dob'];
  $hometown= $_POST['hometown'];
  $phone= $_POST['phone'];
  $country= $_POST['country'];
  $profession= $_POST['profession'];
  $status= $_POST['status'];
  //if($dob=="0000-00-00") $dob=$thedob;
  $query3="UPDATE `user_additional_info` SET `qualification`='$qual',`skills`='$skills',`dob`='$dob',`hometown`='$hometown',`phone`='$phone',`country`='$country',`profession`='$profession',`picture`='',`status`='$status',`picture`='$image' WHERE (user_id='$userId')";
  $execQuery3=mysqli_query($conn,$query3);
  if($execQuery3){
    echo"<script>window.location.href='./profile.php'</script>";
  }else{
    echo"<script>alert('Data not updated')</script>";
  }
}



?>
<?php include'./include/footer.php' ?>
