<?php
session_start();
include'conn.php';
  if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $location= $_POST['location'];
    $field=$_POST['field'];
    $edate=$_POST['edate'];
    $technology=$_POST['technologies'];
    $description=$_POST['description'];
    //$logo=$_POST['logo'];
    $time =date("H:i:s") ;
    $cat=$_POST['category'];
        $date=date("Y/m/d");
        $ownerId=$_SESSION['id'];
    if(($name!='') && ($location!='') && ($description!='')){
      $query="INSERT INTO `startup_info`(`name`, `date`, `time`, `description`, `owner_id`, `location`, `field`, `edate`, `technology`,`category`) VALUES ('$name','$date','$time','$description','$ownerId','$location','$field','$edate','$technology','$cat')";
      $execQuery=mysqli_query($conn,$query);
      if($execQuery) {
      ?>

      <div class="alert alert-success">
                                Startup Added Successfully. Go to <a href="startups.php" class="alert-link">Startups/Project Listings</a>.
    </div>

      <?php
      }
    }else{?>
      <div class="alert alert-danger">
                              Please Enter all the required details
    </div>
  <?php
    }
  }


?>

<?php include'./include/header.php' ?>
        <!-- Page Content -->
        <div id="page-wrapper"style="background:#d9d9d9;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12"><br>

                <div class="col-lg-12">
                  <div class="panel panel-info panel-custom">
                      <div class="panel-heading">
                        <div class="alert alert-success" ><center><font color="purple" size=5px>
                  Add your work</center></font></div>

                      <font color="white">  <form name ="formStartup" method="post" action="addStartup.php">
                          <div class="form-group">
                      <font color="purple">                        <label><font color="red" >*</font>Company/Group Name</label>
                                              <input class="form-control cform" name="name" placeholder="Company name here">
                          </div>

                          <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control cform" name="category">
                                                <option value="startup">Startup</option>
                                                <option value="project">Project</option>
                                                <option value="research">Research Work</option>
                                            </select>
                            </div>

                          <div class="form-group">
                                              <label><font color="red">*</font>Institution location</label>
                                              <input class="form-control cform" name="location" placeholder="Startup Location here">
                          </div>
                          <div class="form-group">
                                              <label>Field</label>
                                              <input class="form-control cform" name="field" placeholder="Field here">
                          </div>
                          <div class="form-group">
                                              <label>Date Established:</label>
                                              <input class="form-control cform" name="edate" type="date">
                          </div>
                          <div class="form-group">
                                              <label>Technology/Approach Used</label>
                                              <input class="form-control cform" name="technologies">
                                              <font color="blue">#</font> Seperate multiple technologies or approaches by comma
                          </div>
                          <div class="form-group">
                                          <font color="red">*</font>  <label>Description/Additional Details</label>
                                            <textarea class="form-control cform" name="description" rows="3"></textarea>
                                        </div></font>
                                        <!--<div class="form-group">
                                                          <label>Startup Logo:</label>
                                                          <input name="logo" type="file">
                                                      </div>
                                                    -->
                                        <button type="submit" name="submit"class="btn btn-primary btn-lg btn-block custom">Post Startup</button>
                      </form></font>
                      </div>
                      <div class="panel-footer">
                         <font color="red">*</font> marked fields are mandatory<br>
                         <font color="blue">#</font>you will be treated as the owner and creator for the posted work and you will be receiving all the
                         queries made by investors or any other person.
                      </div>
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
<?php include'./include/footer.php' ?>
