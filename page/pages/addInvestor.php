<?php
session_start();

include'conn.php';
  if(isset($_POST['submit'])){
    $id=$_SESSION['id'];
    $org=$_POST['org'];
    $pos=$_POST['pos'];
    $exp=$_POST['exp'];
    $invests=$_POST['invests'];
    $quals=$_POST['qualities'];
    if(($org!='')&&($pos!='')&&($quals!='')){
      $sqlQuery="INSERT INTO `investor_info`(`user_id`, `organization`, `position`, `experience`, `investments_no`, `qualities`) VALUES ('$id','$org','$pos','$exp','$invests','$quals')";
      $execQuery=mysqli_query($conn,$sqlQuery);
      if($execQuery){
        ?>
        <div class="alert alert-success">
                                   You have been added as an Investor .Go to <a href="startups.php" class="alert-link">Startups/Project Listings</a>.
      </div>

<?php
      } //echo"<script>alert('You have been added as an investor.')</script>";
    }else {
      echo"<script>alert('Please enter all the details')</script>";
    }
  }

?>
<?php include'./include/header.php' ;?>
        <!-- Page Content -->
        <div id="page-wrapper"style="background:#d9d9d9;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12"><br>

                <div class="col-lg-12">
                  <div class="panel panel-default panel-custom">
                      <div class="panel-heading">
                        <div class="alert alert-success" ><center><font color="purple" size=5px>
                  Add yourself as an Investor </center></font></div>

                      <font color="purple">  <form name ="formStartup" method="post" action="addInvestor.php">
                          <div class="form-group">
                                              <label><font color="red">*</font>Current Organization you are working for</label>
                                              <input class="form-control cform" name="org" placeholder="Company name here">
                          </div>
                          <div class="form-group">
                                              <label><font color="red">*</font>Current Position </label>
                                              <input class="form-control cform" placeholder="Current position" name="pos">
                          </div>
                          <div class="form-group">
                                              <label>Experience</label>
                                              <input class="form-control cform" name="exp" placeholder="Experience here">
                          </div>
                          <div class="form-group">
                                              <label>Number of investments made</label>
                                              <input class="form-control cform" name="invests">

                          </div>
                          <div class="form-group">
                                          <font color="red">*</font>  <label>Qualities you look for in a startup and its leaders.</label>
                                            <textarea class="form-control cform" rows="3" name="qualities"></textarea>
                                        </div></font>


                                      <!--  <div class="form-group">
                                            <label>Make your email visible to others:</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked="">Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">No
                                            </label>

                                        </div>-->


                                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block custom">Add me as an Investor</button>
                      </form>
                      </div>
                      <div class="panel-footer">
                         <font color="red">*</font> marked fields are mandatory
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
