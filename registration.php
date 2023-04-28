<!DOCTYPE html>
<html lang="en">
<?php

session_start();
error_reporting(0);
function function_email($username, $password, $verify_token, $userEmail)
{
   // $u_id = $_SESSION["user_id"];
   // $o_date = date('Y-m-d') . date("h:i:sa");
   $message = "http://streetburger.unaux.com/verifyAccount.php?user_id=" . $username . "&password=" . $password . "&token=" . $verify_token;


   $_SESSION["link"] = $message;
   $_SESSION["userEmail"] = $userEmail;


   include_once 'mail/verifyMail.php';
   //http://streetburger.unaux.com/

   echo "<script>alert('The verification link had sent to your e-mail! ');</script>";
}

include("connection/connect.php");
if (isset($_POST['submit'])) {
   if (
      empty($_POST['firstname']) ||
      empty($_POST['lastname']) ||
      empty($_POST['email']) ||
      empty($_POST['phone']) ||
      empty($_POST['password']) ||
      empty($_POST['cpassword']) ||
      empty($_POST['cpassword'])
   ) {
      $message = "All fields must be Required!";
   } else {

      $check_username = mysqli_query($db, "SELECT username FROM users where username = '" . $_POST['username'] . "' ");
      $check_email = mysqli_query($db, "SELECT email FROM users where email = '" . $_POST['email'] . "' ");



      if ($_POST['password'] != $_POST['cpassword']) {

         echo "<script>alert('Password not match');</script>";
      } elseif (strlen($_POST['password']) < 6) {
         echo "<script>alert('Password Must be >=6');</script>";
      } elseif (!preg_match('/^[0-9]{10}+$/', $_POST['phone'])) {
         echo "<script>alert('Invalid phone number!');</script>";
      } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
         echo "<script>alert('Invalid email address please type a valid email!');</script>";
      } elseif (mysqli_num_rows($check_username) > 0) {
         echo "<script>alert('Username Already exists!');</script>";
      } elseif (mysqli_num_rows($check_email) > 0) {
         echo "<script>alert('Email Already exists!');</script>";
      } else {

         $verify_token = md5(rand());


         $mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,status,token,address) VALUES('" . $_POST['username'] . "','" . $_POST['firstname'] . "','" . $_POST['lastname'] . "','" . $_POST['email'] . "','" . $_POST['phone'] . "','" . md5($_POST['password']) . "','2','" . $verify_token . "','" . $_POST['address'] . "')";
         mysqli_query($db, $mql);
         function_email($_POST['username'], md5($_POST['password']), $verify_token, $_POST['email']);
         $_SESSION["userEmail"] = $_POST['email'];
         header("refresh:0.1;url=login.php");
         // header("url=mail/verifyMail.php");
      }
   }
}


?>


<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="icon" href="#">
   <title>Registration</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/font-awesome.min.css" rel="stylesheet">
   <link href="css/animsition.min.css" rel="stylesheet">
   <link href="css/animate.css" rel="stylesheet">
   <link href="css/style.css" rel="stylesheet">
</head>

<body>
   <div style=" background-image: url('images/img/pimg.jpg');">
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
      <div class="page-wrapper">

         <div class="container">
            <ul>


            </ul>
         </div>

         <section class="contact-page inner-page">
            <div class="container ">
               <div class="row ">
                  <div class="col-md-12">
                     <div class="widget">
                        <div class="widget-body">

                           <form action="" method="post">
                              <div class="row">
                                 <div class="form-group col-sm-12">
                                    <label for="exampleInputEmail1">User-Name</label>
                                    <input class="form-control" type="text" name="username" id="example-text-input" required>
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">First Name</label>
                                    <input class="form-control" type="text" name="firstname" id="example-text-input" required>
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">Last Name</label>
                                    <input class="form-control" type="text" name="lastname" id="example-text-input-2" required>
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">Phone number</label>
                                    <input class="form-control" type="tel" name="phone" id="example-tel-input-3" required>
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label for="exampleInputPassword1">Confirm password</label>
                                    <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2" required>
                                 </div>
                                 <div class="form-group col-sm-12">
                                    <label for="exampleTextarea">Delivery Address</label>
                                    <textarea class="form-control" id="exampleTextarea" name="address" rows="3"></textarea required>
                                 </div>

                              </div>

                              <div class="row">
                                 <div class="col-sm-4">
                                    <p> <input type="submit" value="Register" name="submit" class="btn theme-btn"> </p>
                                 </div>
                              </div>
                           </form>

                        </div>

                     </div>

                  </div>

               </div>
            </div>
         </section>


         <footer class="footer">
            <div class="container">

               <div class="row bottom-footer">
                  <div class="container">
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

               </div>
         </footer>

      </div>

      <script src="js/jquery.min.js"></script>
      <script src="js/tether.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/animsition.min.js"></script>
      <script src="js/bootstrap-slider.min.js"></script>
      <script src="js/jquery.isotope.min.js"></script>
      <script src="js/headroom.js"></script>
      <script src="js/foodpicky.min.js"></script>
</body>

</html>