<?php
session_start();
if((!isset($_SESSION['id']))&&($_SESSION['id']=='')) header('Location:./index/index.php');
include_once'./include/header.php' ;
include'conn.php';

$userId=$_GET['user_id'];

?>

                        <?php
                          $query="SELECT * FROM user_info where user_id='$userId'";
                          $execQuery=mysqli_query($conn,$query);
                          while($res=mysqli_fetch_array($execQuery)){
                            $q2="SELECT * FROM user_additional_info where user_id='$userId'";
                            $execQuery2=mysqli_query($conn,$q2);
                            while($res2=mysqli_fetch_array($execQuery2)){
                                $name=$res['name'];
                        ?>
        <!-- Page Content -->
        <div id="page-wrapper" style="background-image:linear-gradient(#06beb6, #48b1bf);">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <br>



                      <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-body" style="background-image:linear-gradient(#614385,#516395);">
                          <center><img style="width:auto;height:300px;"src="user_profile/<?php echo$res2['picture'];?>" alt="image" class="img-thumbnail"></center>
                          <hr><div class="alert alert-success">
                <?php echo $res2['status'];?></div>
                            </div>
                            </div>
                          </div>



                          <div class="col-lg-6">
                    <div class="panel panel-default"style="background-image:linear-gradient(#614385,#516395);">
                        <div class="panel-heading"style="background-image:linear-gradient(#614385,#516395);">


                        <div class="alert alert-success"><font color="purple">  <i class="fa  fa-info-circle"></i>  Personal Information</font></div>
                        <div class="alert alert-success">
                            Name : <?php echo $res['name'];?>  <br>
                            Qualification : <?php echo $res2['qualification'];?><br>
                            Email : <?php echo $res['email'];?> <br>
                            Skills : <?php echo $res2['skills'];?><br>
                            Date of Birth : <?php echo $res2['dob'];?><br>
                            Hometown : <?php echo $res2['hometown'];?><br>
                            Country : <?php echo $res2['country'];?><br>
                            Phone : <?php echo $res2['phone'];?><br>
                            Profession : <?php echo $res2['profession'];?><br>

                            <a type="button" href = "messages.php?user_id=<?php echo $res['user_id'];?>" class="btn btn-link"><i class="fa  fa-envelope-o"></i> Message</a>
                          </div>
                          </div>

                    </div>
                </div>

                    <?php
                            }
                          }
                    ?>



                      <div class="col-lg-12">
                              <div class="alert alert-info">
                                              <b><center><font color="purple">Startups</font></center></b>
                                          </div>
                      </div>


                    <?php
                        $query3="SELECT * FROM startup_info where owner_id='$userId'";
                        $execQuery3=mysqli_query($conn,$query3);
                        if(mysqli_num_rows($execQuery3)>0){
                            while($res3=mysqli_fetch_array($execQuery3)){

                    ?>
                      <div class="col-lg-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">

                        <div class="alert alert-success">  <?php echo $res3['name'];?> | <b><?php echo ucwords($res3['category']);?></b></div>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home-pills">
                                    <h4><b>Founded by :</b><?php echo$name;?> </h4>



                                      <!--  <img src="logo.jpg" alt="image" class="img-thumbnail">-->



                                      <p><?php

                                      if(strlen($res3['description'])>140){
                                        echo substr($res3['description'],0,135)."<a href='javascript:void(0)' data-toggle='tooltip' title='".$res3['description']."'>more</a>";
                                      }else if(strlen($res3['description'])==0) echo "<br>";
                                      else if(strlen($res3['description'])>70 && strlen($res3['description'])<140) echo $res3['description']."<br>";
                                      else echo $res3['description']."<br><br>";
                                       ?></p>
                                      <p>
                                        <b>Location :</b><?php
                                        if(strlen($res3['location'])>54){
                                          echo substr($res3['location'],0,49)."<a href='javascript:void(0)' data-toggle='tooltip' title='".$res3['location']."'> more</a>";
                                        }else echo $res3['location'];?><br>
                                        <b>Field :</b><?php
                                        if(strlen($res3['field'])>57){
                                          echo substr($res3['field'],0,52)."<a href='javascript:void(0)' data-toggle='tooltip' title='".$res3['field']."'> more</a>";
                                        }
                                        else echo $res3['field'];?><br>
                                        <b>Established on :</b><?php echo $res3['edate'];?><br>
                                        <b>Technologies used :</b><?php
                                        if(strlen($res3['technology'])>110){
                                          echo substr($res3['technology'],0,109)."<a href='javascript:void(0)' data-toggle='tooltip' title='".$res3['technology']."'> more</a>";
                                        }else if ((strlen($res3['technology'])<110)&& (strlen($res3['technology'])>45)) echo $res3['technology'];
                                        else echo $res3['technology']."<br>";?><br>
                                      </p>
                                    </div>

                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                      </div>
                      <?php
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
<?php include'./include/footer.php' ?>
