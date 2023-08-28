<?php
session_start();
if((!isset($_SESSION['id']))&&($_SESSION['id']=='')) header('Location:./index/index.php');
include_once'./include/header.php' ;
include'conn.php';
$userId=$_SESSION['id'];
?>
<script type="text/javascript">

function remClip(id){
        $.ajax({
             type:'post',
             url:'include/clipRem.php',
             data:{cid:id},
             success:function(data){

                  $('#showUser'+id).hide('slow');
             }
        });

  }

  function remWork(id){
          $.ajax({
               type:'post',
               url:'include/remWork.php',
               data:{cid:id},
               success:function(data){

                    $('#showWork'+id).hide('slow');
               }
          });
    }


</script>


        <!-- Page Content -->
        <div id="page-wrapper" style="background:rgb(240,255,255)">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
<br>
                      <div class="panel-heading panel-custom">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active"><a class="custom"href="#home-pills" data-toggle="tab" aria-expanded="true">Collaborators</a><hr>
                                </li>
                                <li class=""><a class="custom" href="#profile-pills" data-toggle="tab" aria-expanded="false">Startups</a><hr>
                                </li>
                                <li class=""><a class="custom" href="#messages-pills" data-toggle="tab" aria-expanded="false">Projects</a><hr>
                                </li>
                                <li class=""><a class="custom" href="#settings-pills" data-toggle="tab" aria-expanded="false">Research</a><hr>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content bound">
                                <div class="tab-pane fade active in" id="home-pills">
          <?php//-----------------------------users Here------------------------------------------?>
                                  <?php
                                    $fetchUsers=mysqli_query($conn,"SELECT * FROM clips where clipped_by='$userId'");
                                    if(mysqli_num_rows($fetchUsers)>0){
                                      while($res=mysqli_fetch_array($fetchUsers)){
                                        $clippedId=$res['clipped'];
                                        $user=mysqli_query($conn,"SELECT * from user_info where user_id='$clippedId'");
                                        while($res2=mysqli_fetch_array($user)){
                                          $basicInfo=mysqli_query($conn,"SELECT * from user_additional_info where user_id='$clippedId'");
                                          while($res3=mysqli_fetch_array($basicInfo)){
                                  ?>
                                        <div class="alert alert-success" id="showUser<?php echo $res2['user_id'];?>">
                                          <img src="user_profile/<?php echo$res3['picture'];?>" style="width:50px;height:auto;border-radius:10px;border:1px solid aliceblue;">
                                      Name: <?php echo $res2['name'];?> | Skills : <?php echo $res3['skills'];?><br>
                                      <a href="userProfile.php?user_id=<?php echo $res2['user_id'];?>" class="alert-link">Profile</a> |
                                      <a href="messages.php?user_id=<?php echo $res2['user_id'];?>" class="alert-link">Message</a> |
                                      <a href="#" class="alert-link" onclick="remClip(<?php echo $res2['user_id'];?>)">UnClip</a>
                                        </div>
                                        <?php
                                            }
                                          }
                                        }
                                      }else echo"  <div class='alert alert-success'>Nothing to Display </div>";
                                        ?>
                                    </div>
            <?php//-----------------------------End users Here------------------------------------------?>


            <?php/*-----------------------------Startups Here------------------------------------------*/?>
            <div class="tab-pane fade bound" id="profile-pills">
            <?php
                $q1=mysqli_query($conn,"SELECT * FROM clipwork where clipped_by='$userId' AND category='startup'");
                if(mysqli_num_rows($q1)>0){
                  while($res=mysqli_fetch_array($q1)){
                    $s_id=$res['clipped'];
                    $startupInfo=mysqli_query($conn,"SELECT * FROM startup_info where id='$s_id'");
                    while($res2=mysqli_fetch_array($startupInfo)){
                      $founder=$res2['owner_id'];
                      $getName=mysqli_query($conn,"SELECT * FROM user_info where user_id='$founder'");
                      while($res3=mysqli_fetch_array($getName)){
            ?>

                                              <div class="alert alert-success" id="showWork<?php echo $res2['id'];?>">
                                            Name: <?php echo $res2['name'];?>  | Founder : <?php echo $res3['name']?> |
                                            Field :<?php echo $res2['field'];?>
                                            <br>
                                            <a href="userProfile.php?user_id=<?php echo $res3['user_id'];?>" class="alert-link">Profile</a> |
                                            <a href="messages.php?user_id=<?php echo $res3['user_id'];?>" class="alert-link">Message</a> |
                                            <a href="#" class="alert-link" onclick="remWork(<?php echo $res2['id'];?>)">UnClip</a>
                                              </div>

              <?php
                      }
                    }
                  }
              } else echo"  <div class='alert alert-success'>Nothing to Display </div>";

              ?>
                </div>

              <?php//-----------------------------End Startups Here------------------------------------------?>
              <?php//-----------------------------Projects Here------------------------------------------?>


                  <div class="tab-pane fade bound" id="messages-pills">
                    <?php
                        $q1=mysqli_query($conn,"SELECT * FROM clipwork where clipped_by='$userId' AND category='project'");
                        if(mysqli_num_rows($q1)>0){
                          while($res=mysqli_fetch_array($q1)){
                            $s_id=$res['clipped'];
                            $startupInfo=mysqli_query($conn,"SELECT * FROM startup_info where id='$s_id'");
                            while($res2=mysqli_fetch_array($startupInfo)){
                              $founder=$res2['owner_id'];
                              $getName=mysqli_query($conn,"SELECT * FROM user_info where user_id='$founder'");
                              while($res3=mysqli_fetch_array($getName)){
                    ?>

                                                      <div class="alert alert-success" id="showWork<?php echo $res2['id'];?>">
                                                    Name: <?php echo $res2['name'];?>  | Creator : <?php echo $res3['name']?> |
                                                    Field :<?php echo $res2['field'];?>
                                                    <br>
                                                    <a href="userProfile.php?user_id=<?php echo $res3['user_id'];?>" class="alert-link">Profile</a> |
                                                    <a href="messages.php?user_id=<?php echo $res3['user_id'];?>" class="alert-link">Message</a> |
                                                    <a href="#" class="alert-link" onclick="remWork(<?php echo $res2['id'];?>)">UnClip</a>
                                                      </div>

                      <?php
                              }
                            }
                          }
                      } else echo"  <div class='alert alert-success'>Nothing to Display </div>";

                      ?>



                  </div>
                <?php//-----------------------------End Projects Here------------------------------------------?>
                <?php//-----------------------------Research Here------------------------------------------?>
                                <div class="tab-pane fade bound" id="settings-pills">
                                  <?php
                                      $q1=mysqli_query($conn,"SELECT * FROM clipwork where clipped_by='$userId' AND category='research'");
                                      if(mysqli_num_rows($q1)>0){
                                        while($res=mysqli_fetch_array($q1)){
                                          $s_id=$res['clipped'];
                                          $startupInfo=mysqli_query($conn,"SELECT * FROM startup_info where id='$s_id'");
                                          while($res2=mysqli_fetch_array($startupInfo)){
                                            $founder=$res2['owner_id'];
                                            $getName=mysqli_query($conn,"SELECT * FROM user_info where user_id='$founder'");
                                            while($res3=mysqli_fetch_array($getName)){
                                  ?>

                                                                    <div class="alert alert-success" id="showWork<?php echo $res2['id'];?>">
                                                                  Name: <?php echo $res2['name'];?>  | Creator : <?php echo $res3['name']?> |
                                                                  Field :<?php echo $res2['field'];?>
                                                                  <br>
                                                                  <a href="userProfile.php?user_id=<?php echo $res3['user_id'];?>" class="alert-link">Profile</a> |
                                                                  <a href="messages.php?user_id=<?php echo $res3['user_id'];?>" class="alert-link">Message</a> |
                                                                  <a href="#" class="alert-link" onclick="remWork(<?php echo $res2['id'];?>)">UnClip</a>
                                                                    </div>

                                    <?php
                                            }
                                          }
                                        }
                                    } else echo"  <div class='alert alert-success'>Nothing to Display </div>";

                                    ?>

                              </div>
                <?php//-----------------------------End Research Here------------------------------------------?>
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
