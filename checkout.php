<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();

$ress = mysqli_query($db, "SELECT * FROM `users` WHERE u_id='" . $_SESSION["user_id"] . "'");
$rows = mysqli_fetch_array($ress);
$_SESSION["userEmail"] = $rows['email'];


$o_date = "";


function function_alert()
{


    echo "<script>alert('Thank you. Your Order has been placed!');</script>";
    function_email();
    echo "<script>window.location.replace('your_orders.php');</script>";
}
function function_email()
{
    $u_id = $_SESSION["user_id"];
    $o_date = date('Y-m-d') . date("h:i:sa");
    $message = "http://streetburger.unaux.com/orderBill.php?user_id=" . $u_id . "&order_date=" . $o_date;
    $_SESSION["messages"] = $message;

    include_once 'mail/mailtest.php';
    //http://streetburger.unaux.com/

    echo "<script>alert('The receipt had sent to your e-mail! ');</script>";
}
if (empty($_SESSION["user_id"])) {
    header('location:login.php');
} else {


    foreach ($_SESSION["cart_item"] as $item) {

        $item_total += ($item["price"] * $item["quantity"]);

        if ($_POST['submit']) {

            $o_date = date('Y-m-d') . date("h:i:sa");
            $SQL = "insert into users_orders(u_id,title,quantity,price,order_date ) values('" . $_SESSION["user_id"] . "','" . $item["title"] . "','" . $item["quantity"] . "','" . $item["price"] . "','" .    $o_date . "')";

            mysqli_query($db, $SQL);


            $SQL = "update users set  address='$_POST[address]' where u_id=  " . $_SESSION['user_id'];
            mysqli_query($db, $SQL);





            unset($_SESSION["cart_item"]);
            unset($item["title"]);
            unset($item["quantity"]);
            unset($item["price"]);
            $success = "Thank you. Your order has been placed!";

            function_alert();
        }


        if ($_POST['cancel']) {


            unset($_SESSION["cart_item"]);
            header('location:index.php');
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
        <title>Checkout</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animsition.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <style>
            #box {
                display: none;

            }

            .align-center {
                /* display: flex; */
                /* height: 100vh;
                width: 100vw; */
                /* align-items: center;
                justify-content: center; */
            }

            .card {
                width: 500px;
                height: 300px;
                border-radius: 12px;
                box-shadow: 2px 2px 0 #222, 2px 2px 15px rgba(0, 0, 0, 0.9);
                background: black;
                background: -webkit-linear-gradient(left, #000000, #282828);
                background: -o-linear-gradient(right, #000000, #282828);
                background: -moz-linear-gradient(right, #000000, #282828);
                background: linear-gradient(to right, #000000, #282828)
            }

            .form {
                padding-top: 110px;
            }

            .card-title {
                float: left;
                margin-left: 15px;
            }

            .logo {
                float: right;
                margin-top: 15px;
                margin-right: 15px;
            }

            label {
                display: block;
            }

            .card-number {
                float: left;
                margin-left: 15px;
                margin-bottom: 10px;
                color: white;
            }

            .card-number input {
                height: 30px;
                background-color: transparent;
                border: none;
                font-family: 'Electrolize', sans-serif;
                color: #fff;
            }

            .card-name {
                clear: both;
                float: left;
                margin-left: 15px;
                margin-bottom: 15px;
                color: #fff;
            }

            .card-name input {
                height: 30px;
                background-color: transparent;
                border: none;
                color: white;
                font-family: 'Electrolize', sans-serif;
            }

            input:focus {
                color: #fff;
                outline: none;
                border-bottom: 1px solid white;
            }

            .select-date {
                clear: both;
                float: left;
                margin-left: 15px;
            }

            .card-cvc {
                float: right;
                margin-right: 15px;
            }

            .card-cvc input {
                background-color: transparent;
                border: none;
                color: #fff;
                font-family: 'Electrolize', sans-serif;
            }

            select {
                border: none;
                background-color: rgba(255, 255, 255, 0.2);
                color: #fff;
            }

            option {
                color: #000000;
            }

            .buy-button {
                font-family: 'Electrolize', sans-serif;
                cursor: pointer;
                position: relative;
                margin-top: auto;
                margin-left: 64px;
                margin-right: -100px;
                padding: 10px 10px;
                border-radius: 6px;
                box-shadow: -2px 0px 6px 1px #000000;
                background-color: #FFAB40;
                border: none;
                color: #fff;
            }

            .buy-button:hover {
                background-color: #66BB6A;
                transition: linear 0.2s;
            }
        </style>

    </head>

    <body>

        <div class="site-wrapper">
            <header id="header" class="header-scroll top-header headrom">
                <nav class="navbar navbar-dark">
                    <div class="container">
                        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                        <a class="navbar-brand" href="index.php">

                            <h2 style="color:white; font-weight: bold;"> <img class="img-rounded" src="images/Logo.jpg" style="height: 36px;width: 40px;" alt=""> Street Burger</h2>
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
                <div class="top-links">
                    <div class="container">
                        <ul class="row links">

                            <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose Restaurant Branch</a></li>
                            <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick Your favorite Burgers</a></li>
                            <li class="col-xs-12 col-sm-4 link-item active"><span>3</span><a href="checkout.php">Order and Pay</a></li>
                        </ul>
                    </div>
                </div>

                <div class="container">

                    <span style="color:green;">
                        <?php echo $success; ?>
                    </span>

                </div>




                <div class="container m-t-30">
                    <form action="" method="post">
                        <div class="widget clearfix">

                            <div class="widget-body">
                                <form method="post" action="#">
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="cart-totals margin-b-20">
                                                <div class="cart-totals-title">
                                                    <h4>Cart Summary</h4>
                                                </div>
                                                <div class="cart-totals-fields">

                                                    <table class="table">
                                                        <tbody>

                                                            <tr>
                                                                <td>Cart Subtotal</td>
                                                                <td> <?php echo "LKR " . $item_total; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Delivery Charges</td>
                                                                <td>Free</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Delivery Address </td>
                                                                <?php $ssql = "select * from users where u_id=" . $_SESSION['user_id'];
                                                                $res = mysqli_query($db, $ssql);
                                                                $newrow = mysqli_fetch_array($res); ?>
                                                                <td>
                                                                    <Address> <input type="text" name="address" class="form-control form-control-danger" value="<?php echo $newrow['address'];  ?>" placeholder="Add your Delivery Address" required></Address>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-color"><strong>Total</strong></td>
                                                                <td class="text-color"><strong> <?php echo "LKR " . $item_total; ?></strong></td>
                                                            </tr>
                                                        </tbody>




                                                    </table>
                                                </div>
                                            </div>
                                            <div class="payment-option">
                                                <ul class=" list-unstyled">
                                                    <li>
                                                        <label class="custom-control custom-radio  m-b-20">
                                                            <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Cash on Delivery</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="custom-control custom-radio  m-b-10">
                                                            <input name="mod" type="radio" value="paypal" class="custom-control-input" id="show"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Debit/Credit Card <img src="images/paypal.jpg" alt="" width="90"></span> </label>
                                                    </li>
                                                    <!-- <li>
                                                        <button type="submit" class="btn btn-light" onclick="window.print();" name="btnPdfOrders" class="fa fa-bars"> <i class="fa fa-solid fa-print"></i> &nbsp Print Invoice</button>
                                                    </li> -->
                                                </ul>
                                                <div id="box">
                                                    <div class="align-center">
                                                        <div class="card">
                                                            <header>
                                                                <h3 class="card-title m-1" style="color: white;">Add Payment Details</h3>
                                                                <img width="128" alt="Visa Inc. logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/128px-Visa_Inc._logo.svg.png" class="logo" />
                                                            </header>

                                                            <form action="" class="form">
                                                                <div class="card-number">
                                                                    <label for="number">Card Number</label>
                                                                    <input id="number" type="text" size="40" placeholder="1234 1234 1234 1234" />
                                                                </div>

                                                                <div class="card-name">
                                                                    <label for="name">Name</label>
                                                                    <input id="name" type="text" size="40" placeholder="Your Name" />
                                                                </div>

                                                                <div class="input-row">
                                                                    <div class="select-date">
                                                                        <label for="date">Expiration</label>
                                                                        <select name="" id="date">
                                                                            <option value="00"></option>
                                                                            <option value="01">01</option>
                                                                            <option value="02">02</option>
                                                                            <option value="03">03</option>
                                                                            <option value="04">04</option>
                                                                            <option value="05">05</option>
                                                                            <option value="06">06</option>
                                                                            <option value="07">07</option>
                                                                            <option value="08">08</option>
                                                                            <option value="09">09</option>
                                                                            <option value="10">10</option>
                                                                            <option value="11">11</option>
                                                                            <option value="12">12</option>
                                                                        </select>


                                                                        <select name="" id="date">
                                                                            <option value="0000"></option>

                                                                            <option value="2019">2019</option>
                                                                            <option value="2020">2020</option>
                                                                            <option value="2021">2021</option>
                                                                            <option value="2022">2022</option>
                                                                            <option value="2023">2023</option>
                                                                            <option value="2024">2024</option>
                                                                            <option value="2025">2025</option>
                                                                            <option value="2026">2026</option>
                                                                            <option value="2027">2027</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="card-cvc">
                                                                        <label for="cvc">CVV</label>
                                                                        <input id="cvc" type="text" size="5" placeholder="123" />
                                                                    </div>

                                                                    <button class="buy-button" disabled>Complete Purchase</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>





                                                    <br>
                                                </div>
                                                <p class="text-xs-center"> <input type="submit" onclick="return confirm('Do you want to confirm the order?');" name="submit" class="btn btn-success btn-block" value="Order Now"> </p>

                                                <p class="text-xs-center"> <input type="submit" onclick="return confirm('Do you want to cancel the order?');" name="cancel" class="btn btn-danger btn-block" value="Cancel Order"> </p>
                                            </div>
                                </form>
                            </div>
                        </div>

                </div>
            </div>
            </form>
        </div>

        <footer class="footer">
            <div class="row bottom-footer">
                <div class="container">
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
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/animsition.min.js"></script>
        <script src="js/bootstrap-slider.min.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/headroom.js"></script>
        <script src="js/foodpicky.min.js"></script>
        <script>
            const box = document.getElementById('box');

            function handleRadioClick() {
                if (document.getElementById('show').checked) {
                    box.style.display = 'block';
                } else {
                    box.style.display = 'none';
                }
            }

            const radioButtons = document.querySelectorAll('input[name="mod"]');
            radioButtons.forEach(radio => {
                radio.addEventListener('click', handleRadioClick);
            });
        </script>
    </body>

</html>

<?php
}
?>