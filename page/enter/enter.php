<!DOCTYPE html>
<html lang="en">
<?php

session_start();
include'../pages/conn.php';

if((!isset($_SESSION['id']))&&($_SESSION['id']=='')) header('Location:./index/index.php');


$id=$_SESSION['id'];
?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BigBild</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/scrolling-nav.css" rel="stylesheet">

</head>

<body id="page-top">

<?php

	if(isset($_POST["submit"])){
		$code=$_POST["code"];
		//echo $code;
		//echo"<script>alert('."$code".')</script>";
		if($code!=""){
			$check=mysqli_query($conn,"SELECT * from `verify` where user_id='$id' ORDER BY id DESC LIMIT 1");
			if(mysqli_num_rows($check)>0){
				while($res=mysqli_fetch_array($check)){
				  $validCode=$res['code'];
				  $queryId=$res['id'];
				}
				//echo $validCode;
				//if($validity) echo"<script>window.location.href='../enter/enter.php'</script>";
				//else echo"<script>window.location.href='../enter/enter.php'</script>";
				if($validCode==$code){
					$insertQ=mysqli_query($conn,"UPDATE `verify` SET `verify`=1 WHERE id='$queryId'");
					echo"<script>window.location.href='../pages/editProfile.php'</script>";
				}
			}
		}
	}

?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">BigBild</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="../pages/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-primary text-white">
    <div class="container text-center">

	<?php
		$query=mysqli_query($conn,"SELECT * FROM user_info where user_id='$id'");
		while($res2=mysqli_fetch_array($query)) {$name=$res2['name'];}
	?>
      <h1>Welcome <b> <?php echo $name;?><b></h1>
	  <h6>Please Enter the Code Sent to your email to get started.<h6>

	  <form method="post" action="enter.php">
      <p class="lead"><input class="form-control" type="text" name="code" id="code" placeholder="Enter Code Here"></p>
	  <input type="submit" name="submit" class="btn btn-success" value="submit">

		</form><br>
		<!--<a type="button" href="enter.php?change=1"  class="btn btn-success">Resend Code</a>-->
	</div>
  </header>



  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="js/scrolling-nav.js"></script>

</body>

</html>
