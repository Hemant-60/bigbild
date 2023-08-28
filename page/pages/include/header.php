<?php
$con =mysqli_connect('localhost','u500932511_root','@Lm10Cr7');
  mysqli_select_db($con,'u500932511_create');

//  if((!isset($_SESSION['id']))&&($_SESSION['id']!='')) header('Location:./index/index.php');
include'counter.php';


if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    $query="SELECT * from user_info where user_id='$id'";
    $execQuery=mysqli_Query($con,$query);


    $check=mysqli_query($con,"SELECT * from verify where user_id='$id' ORDER BY id DESC LIMIT 1");
    if(mysqli_num_rows($check)>0){
        while($res=mysqli_fetch_array($check)){
          $validity=$res['verify'];
        }
        if(!$validity) echo"<script>window.location.href='../enter/enter.php'</script>";
    }

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BigBild</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Corben" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css" rel="stylesheet">

    @font-face {
      font-family: Corben; font-size: 24px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 26.4px;

    }
    .cli:hover{
      background-image:linear-gradient(#42275a, #734b6d);
      color: #ffffff;
    }
    .dli:hover{
      background-image:linear-gradient(#06beb6 ,#48b1bf);
      color: #ffffff;
    }
    .custom{

       background-image: linear-gradient(-225deg, #AC32E4 0%, #7918F2 48%, #4801FF 100%);
      border-radius:20px;
      color: #eeeeee;

    /*  color: #004d4d;*/
    }
      .custom:hover{
         background-image: linear-gradient(-225deg, #AC32E4 0%, #7918F2 48%, #4801FF 100%);
        box-shadow:0 0 9px 3px #a6a6a6;
        /* background-image:linear-gradient(to right,rgb(153, 204, 255),rgb(255, 153, 153)); */
        border-radius:5px;
          color:#ffffff;
      }
      .cform:hover{
        box-shadow:0 0 5px #a6a6a6;
      }
      .panel-custom{
        background:#ffffff;
        box-shadow:3px 3px 5px #a6a6a6;
      }
      .panel-custom:hover{
        box-shadow:5px 5px 5px #a6a6a6;
      }
      .bound{

      }

    </style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle custom" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false" aria-controls="navbarResponsive" >
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand " href="./index/index.php"><font color="purple">BigBild</font></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">


                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                      <?php while($res=mysqli_fetch_array($execQuery)){
                          $name=$res['name'];
                        }
                      }?>

                    <?php echo$name;?>  <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li ><a class="dli" href="profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>

                        <li><a class="dli" href="editProfile.php"><i class="fa  fa-edit"></i> Edit Profile</a>
                        </li>
                        <li><a class="dli" href="review.php"><i class="glyphicon glyphicon-user  "></i> Report User / Post a Review</a>
                        </li>
                        <li><a class="dli" href="passwordReset.php"><i class="fa  fa-edit"></i> Change Password</a>
                        </li>

                        <li><a class="dli" href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">


                      <form name="search2" method="post" action="userSearch.php">
                      <!--  <li class="sidebar-search">-->
                            <div class="input-group custom-search-form">
                                <input type="text" name="search_user" class="form-control" placeholder="Search Users...">
                                <span class="input-group-btn">
                                    <button type="submit" name="submit"class="btn btn-default" >
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->

                      </form>



                        <li>
                            <a class="cli" href="users.php"><i class="fa fa-group  "></i> Collaborators</a>
                            <a class="cli" href="clipboard.php"><i class="fa fa-clipboard  "></i> ClipBoard</a>
                            <a class="cli" href="startups.php"><i class="fa fa-rocket  "></i> Startups / Projects / Research</a>



                            <a class="cli"href="investors.php"><i class="fa fa-money  "></i> Investors</a>




                        <script type="text/javascript" src="../jquery.js">
                        						</script>

                        <script type="text/javascript">

                        $(window).on("load",function(){
                          setInterval(function(){
                            $.get( "counter.php", function( data ) {
                              $( "#nums" ).html( data );
                              alert( "Load was performed." );
                            });
                          },500);
                        });

                        </script>


                          <?php $newChat=numMessages($con,$id);?>
                            <a class="cli"href="chats.php"> <i class="fa fa-envelope-o "></i> Chats(<div id="nums" style="display:inline;"><?php echo $newChat==0?0:$newChat;?></div>)</a>
                            <a class="cli"href="addStartup.php"><i class="fa  fa-plus-square-o "></i> Add a Startup / Project / Research</a>

                                                        <a class="cli"href="addInvestor.php"> <i class="fa fa-plus-square-o "></i> Add yourself as an Investor</a>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
