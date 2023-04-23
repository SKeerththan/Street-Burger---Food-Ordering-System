<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();


if (empty($_SESSION['user_id'])) {
    header('location:login.php');
} else {
    // echo $_SESSION['user_id'];

    if (isset($_POST['submit'])) {
        if (
            empty($_POST['uname']) ||
            empty($_POST['fname']) ||
            empty($_POST['lname']) ||
            empty($_POST['email']) ||
            empty($_POST['password']) ||
            empty($_POST['phone'])
        ) {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>All fields Required!</strong>
															</div>';
        } else {




            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // Validate email address
            {
                $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>invalid email!</strong>
															</div>';
            } elseif (strlen($_POST['password']) < 6) {
                $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Password must be >=6!</strong>
															</div>';
            } elseif (strlen($_POST['phone']) < 10) {
                $error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>invalid phone!</strong>
															</div>';
            } else {


                $mql = "update users set username='$_POST[uname]', f_name='$_POST[fname]', address='$_POST[address]', l_name='$_POST[lname]',email='$_POST[email]',phone='$_POST[phone]',password='" . md5($_POST[password]) .
                    "' where u_id=  " . $_SESSION['user_id'];
                mysqli_query($db, $mql);
                $success =     '<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>User Updated!</strong></div>';
                // header('location:index.php');
            }
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
    <title>Profile</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link href="css/profileCSS.css" rel="stylesheet">



    <style type="text/css" rel="stylesheet">
        .indent-small {
            margin-left: 5px;
        }

        .form-group.internal {
            margin-bottom: 0;
        }

        .dialog-panel {
            margin: 10px;
        }

        .datepicker-dropdown {
            z-index: 200 !important;
        }

        .panel-body {
            background: #e5e5e5;
            /* Old browsers */
            background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
            /* FF3.6+ */
            background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
            /* Chrome,Safari4+ */
            background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
            /* Chrome10+,Safari5.1+ */
            background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
            /* Opera 12+ */
            background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
            /* IE10+ */
            background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
            /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
            font: 600 15px "Open Sans", Arial, sans-serif;
        }

        label.control-label {
            font-weight: 600;
            color: #777;
        }


        @media only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {}
    </style>

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
                            echo  '<li class="nav-item"><a href="profile.php" class="nav-link active">Profile</a> </li>';
                            echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
                        }

                        ?>

                    </ul>
                </div>
            </div>
        </nav>

    </header>
    <div class="page-wrapper">



    </div>

    <section class="restaurants-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                </div>
                <div class="col-xs-12">
                    <div class="bg-gray">
                        <div class="row">

                            <div class="container-fluid">

                                <div class="row">



                                    <div class="container-fluid">

                                        <?php

                                        echo $error;
                                        echo $success;



                                        ?>




                                        <div class="col-lg-12">
                                            <div class="card card-outline-primary">
                                                <div class="card-header">
                                                    <h4 class="m-b-0 text-white">Update User</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php $ssql = "select * from users where u_id=" . $_SESSION['user_id'];
                                                    $res = mysqli_query($db, $ssql);
                                                    $newrow = mysqli_fetch_array($res); ?>
                                                    <form action='' method='post'>
                                                        <div class="form-body">

                                                            <hr>
                                                            <div class="row p-t-20">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Username</label>
                                                                        <input type="text" name="uname" class="form-control" value="<?php echo $newrow['username']; ?>" placeholder="username">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group has-danger">
                                                                        <label class="control-label">First-Name</label>
                                                                        <input type="text" name="fname" class="form-control form-control-danger" value="<?php echo $newrow['f_name'];  ?>" placeholder="jon">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="row p-t-20">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Last-Name </label>
                                                                        <input type="text" name="lname" class="form-control" placeholder="doe" value="<?php echo $newrow['l_name']; ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group has-danger">
                                                                        <label class="control-label">E-Mail</label>
                                                                        <input type="email" name="email" class="form-control form-control-danger" value="<?php echo $newrow['email'];  ?>" placeholder="example@gmail.com">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Address</label>
                                                                        <input type="text" name="address" class="form-control form-control-danger" value="<?php echo $newrow['address'];  ?>">
                                                                    </div>
                                                                </div>



                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Phone</label>
                                                                        <input type="tel" name="phone" class="form-control form-control-danger" value="<?php echo $newrow['phone'];  ?>" placeholder="phone">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Password</label>
                                                                        <input type="password" name="password" class="form-control form-control-danger" placeholder="Enter New Password" required>
                                                                        <p>md5 : <?php echo $newrow['password'];  ?> </p>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>
                                                </div>
                                                <div class="form-actions">
                                                    <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                                    <a href="index.php" class="btn btn-inverse">Cancel</a>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>



                        </div>

                    </div>



                </div>



            </div>
        </div>
        </div>
    </section>


    <footer class="footer">
        <div class="row bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="bottom-footer">
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
<?php

?>