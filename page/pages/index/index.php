<?php
    include'conn.php';
    session_start();
    if(isset($_SESSION['id'])&&($_SESSION['id']!='')) header('Location:../startups.php');
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BigBild | Home</title>


    <link href="lp/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link href="lp/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="lp/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


    <link href="lp/css/landing-page.min.css" rel="stylesheet">

  </head>

  <body>


    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="index.php"><font color="purple">BigBild</font></a>
        <a class="btn btn-primary" href="signin.php">Sign In</a>
      </div>
    </nav>


    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5"><font color="white">A social Network for people who wants to build something.</font></h1>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form>
              <div class="form-row">



                <div class="col-12 col-md-9 mb-2 mb-md-0">
                 <h3 class="mb-5"> Let's get Started</h3>
                </div>
                <div class="col-12 col-md-3">
                  <a class="btn btn-primary" href="signup.php">Sign Up</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </header>





    <section class="showcase">
      <div class="container-fluid p-0">
        <div class="row no-gutters">

          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('images/pic1.jfif');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Get Noticed  and find the Right Team</h2>
            <p class="lead mb-0"><font color="purple">
              <b>BigBild</b> is a social network and a platform for those who want their ideas to get noticed.
              Collaborate with other people having same vision and skills.
               Meet investors from all around the globe and get started with your creation.</font></p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 text-white showcase-img" style="background-image: url('images/money.jfif');"></div>
          <div class="col-lg-6 my-auto showcase-text">
            <h2>Invest in the right place</h2>
            <p class="lead mb-0"><font color="purple"><b>BigBild</b> provides a platform to the investors for investing their money in the next breakthroughs and be a part of it.</font></p>
          </div>
        </div>

    </section>






    <footer class="footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
              <li class="list-inline-item">
                <!--<a href="#">About</a>
              </li>

              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>-->
              </li>
            </ul>
            <p class="text-muted small mb-4 mb-lg-0"> </p>
          </div>
          <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            &copy; &nbsp;<font color="purple"><b>BigBild</b></font> All Rights Reserved.
          </div>
        </div>
      </div>
    </footer>

    <script src="lp/vendor/jquery/jquery.min.js"></script>
    <script src="lp/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
