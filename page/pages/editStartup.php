<?php
session_start();
if((!isset($_SESSION['id']))&&($_SESSION['id']=='')) header('Location:./index/index.php');
include'conn.php';

 include'./include/header.php';
 if(!isset($_GET['s_id'])) echo"<script>window.location.href='startups.php'</script>";
 else{
   $s_id=$_GET['s_id'];
   $query="SELECT * from startup_info where id='$s_id'";
   $execQuery=mysqli_query($conn,$query);
   while($res=mysqli_fetch_array($execQuery)){}}


?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12"><br>


                      <!--Startup Displays-->

                      <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            [Startup Heading]
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->

                            <ul class="nav nav-pills">
                                <li class="active"><a href="#home-pills" data-toggle="tab">Startup Information</a>
                                </li>

                            </ul>

                            <!-- Tab panes -->

                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home-pills">
                                    <h4><b>Founded by :</b>ABC </h4>
                                    <img src="logo.jpg" alt="image" class="img-thumbnail">
                                      <p>We create successfull IOT solutions.</p>
                                      <p><a type="button" href = "#"class="btn btn-primary"><i class="fa  fa-envelope-o"></i> Message Founder</a>
                                        &nbsp;<a type="button" href = "#"class="btn btn-primary">View Founder's Profile</a>
                                        &nbsp;<a type="button" href = "#"class="btn btn-primary">View Startup</a>
                                      </p>
                                    </div>

                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>







                      <!--End Startup Displays-->



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
