<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

  <link rel="stylesheet" href="css/login.css">
  <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->


  <style type="text/css">
    #buttn {
      color: #fff;
      background-color: #5c4ac7;
    }
  </style>


  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animsition.min.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

</head>

<body>
  <header id="header" class="header-scroll top-header headrom">
    <nav class="navbar navbar-dark">
      <div class="container">
        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
        <a class="navbar-brand" href="index.php">

          <h2 style="color:white; "> <img class="img-rounded" src="images/Logo.jpg" style="height: 36px;width: 40px;" alt=""> Street Burger</h2>
        </a>
        <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
          <ul class="nav navbar-nav">
            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurant Branches <span class="sr-only"></span></a> </li>

            <?php
            if (empty($_SESSION["user_id"])) {
              echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Register</a> </li>';
            } else {


              echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">My Orders</a> </li>';
              echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
            }

            ?>

          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div style=" background-image: url('images/img/pimg.jpg');">

    <?php
    include("connection/connect.php");
    error_reporting(0);
    session_start();
    if (isset($_POST['submit'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      if (!empty($_POST["submit"])) {
        $loginquery = "SELECT * FROM users WHERE username='$username'&& status='1' && password='" . md5($password) . "'"; //selecting matching records
        //  $loginquery = "SELECT * FROM users WHERE username='$username' && password='" . $password . "'"; //selecting matching records
        $result = mysqli_query($db, $loginquery); //executing
        $row = mysqli_fetch_array($result);

        if (is_array($row)) {
          $success = "Login Success ✅";
          $_SESSION["user_id"] = $row['u_id'];
          header("refresh:1;url=index.php");
        } else {
          $loginquery = "SELECT * FROM users WHERE username='$username' && status='0' && password='" . md5($password) . "'";
          $result = mysqli_query($db, $loginquery); //executing
          $row = mysqli_fetch_array($result);
          if (is_array($row)) {
            $message = "Account is Deactivated 🚫";
          } else {
            $loginquery = "SELECT * FROM users WHERE username='$username' && status='2' && password='" . md5($password) . "'";
            $result = mysqli_query($db, $loginquery); //executing
            $row = mysqli_fetch_array($result);
            if (is_array($row)) {
              $warning = "Please activate your account. Check your E-mail ⏳";
            } else {
              $message = "Invalid Username/Password! ⚠️";
            }
          }
        }
      }
    }
    ?>


    <div class="pen-title ">
      < </div>

        <div class="module form-module">
          <div class="toggle ">

          </div>
          <div class="form ">
            <h2>Login to your account</h2>
            <span style="color:red;"><?php echo $message; ?></span>
            <span style="color:green;"><?php echo $success; ?></span>
            <span style="color:grey;"><?php echo $warning; ?></span>
            <form action="" method="post">
              <input type="text" placeholder="Username" name="username" />
              <input type="password" placeholder="Password" name="password" />
              <!-- 
              <div class="g-recaptcha" data-sitekey="6LdfK8ElAAAAAN9YzUgVMyTDM12sEkYfU5ix_BM3"></div>
              <br /> -->

              <input type="submit" id="buttn" class="bg-success" name="submit" value="Login" />
            </form>
          </div>

          <div class="cta">Not registered?<a href="registration.php" style="color:#5c4ac7;"> Create an account</a></div>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>




        <div class="container-fluid pt-3">
          <p></p>
        </div>



        <footer class="footer">
          <div class="container">


            <div class="bottom-footer">
              <div class="row">
                <div class="row">
                  <div class="col-xs-12 col-sm-3 payment-options color-gray">
                    <h5>Payment Options</h5>
                    <ul>
                      <li>
                        <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                      </li>
                      <li>
                        <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                      </li>
                      <li>
                        <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                      </li>
                      <li>
                        <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                      </li>
                      <li>
                        <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-xs-12 col-sm-4 address color-gray">
                    <h5>Address</h5>
                    <p>Street Burger, M289+XFR, Jaffna, Sri Lanka</p>
                    <h5>Phone: 123-4567890</a></h5>
                  </div>
                  <div class="col-xs-12 col-sm-5 additional-info color-gray">
                    <h5>Stop. Burger time.</h5>
                    <p>Eat clean, stay fit, and have a burger to stay sane.</p>
                  </div>
                </div>
              </div>

            </div>
        </footer>



</body>

</html>