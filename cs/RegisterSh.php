<?php

require_once "../includes/shop.php";

$shop = new Shop();

if (isset($_POST['submit'])) {

    $nic = $_POST['nic'];
    $fn = $_POST['fname'];
    $ln = $_POST['lname'];
    $pn = $_POST['mobile'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $un = $_POST['username'];
    $pw = $_POST['password'];

    $result = $shop->shop_register($nic,$fn,$ln,$pn,$address,$email,$un,$pw);

    if ($result) {
        echo "YOUR REGISTRATION IS COMPLETED...";
    } else {
        echo "Error";
    }
}
?>
<style>
    body {
        font: 400 15px Lato, sans-serif;
        line-height: 1.8;
        color: #818181;
    }
    .navbar {
        margin-bottom: 0;
        background-color: #1b1818;
        z-index: 9999;
        border: 0;
        font-size: 12px !important;
        line-height: 1.42857143 !important;
        letter-spacing: 4px;
        border-radius: 0;
    }
    .navbar li a, .navbar .navbar-brand {
        color: #fff !important;
    }
    .navbar-nav li a:hover, .navbar-nav li.active a {
        color: #1b1818 !important;
        background-color: #fff !important;
    }
    .navbar-default .navbar-toggle {
        border-color: transparent;
        color: #fff !important;
    }
    .dropbtn {
        background-color: #1b1818;
        color: #ffffff;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #1b1818;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: white;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #534d53;}

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {background-color: #8a848a;}
    .carousel-inner img {

        width: 100%; /* Set width to 100% */
        height: 100%;
        margin: auto;
    }
    .container-fluid {
        padding: 60px 50px;
    }
    .bg-grey {
        background-color: #ffffff;
    }

    .logo {
        color: #51bf28;
        font-size: 200px;
    }
    h4 {
        font-size: 19px;
        line-height: 1.375em;
        color: #1b1818;
        font-weight: 400;
        margin-bottom: 30px;
    }
    .thumbnail {
        padding: 0 0 15px 0;
        border: none;
        border-radius: 0;
    }
    .thumbnail img {
        width: 400px;
        height: 200px;
        margin-bottom: 10px;
    }
    footer {
        background-color: #1b1818;
        color: #ffffff;
        padding: 32px;
    }

    footer a {
        color: #ffffff;
    }

    footer a:hover {
        color: #777;
        text-decoration: none;
    }
    .login-form {
        width: 385px;
        margin: 30px auto;
    }
    .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .login-btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .input-group-addon .fa {
        font-size: 18px;
    }
    .login-btn {
        font-size: 15px;
        font-weight: bold;
    }
    .social-btn .btn {
        border: none;
        margin: 10px 3px 0;
        opacity: 1;
    }
    .social-btn .btn:hover {
        opacity: 0.9;
    }
    .social-btn .btn-primary {
        background: #507cc0;
    }
    .social-btn .btn-info {
        background: #64ccf1;
    }
    .social-btn .btn-danger {
        background: #df4930;
    }
    .or-seperator {
        margin-top: 20px;
        text-align: center;
        border-top: 1px solid #ccc;
    }
    .or-seperator i {
        padding: 0 10px;
        background: #f7f7f7;
        position: relative;
        top: -11px;
        z-index: 1;
    }

    .abc-cccc {

        padding: 8px;
    }
    .well {

        padding: 40px;
    }

</style>

<body >
<div class="container container-fluid">
<?php
require_once "../includes/layout/navbar.php";
?>
<!-- SlideShoe -->
<?php
require_once "../includes/layout/slideshow.php";
?>

    <br/>
    <a href="LoginFa.php"><button class="btn btn-default">Back</button></a>

    <div class="container">
        <div class="login-form">

            <form name="register" method="POST" action="RegisterShop.php">
                <h2 class="text-center"><span class="glyphicon glyphicon-user"></span> Farmer Registration</h2>
                <tr>
                    <td> National ID</td><td> <input type="text" name="nic" class="form-control"></td>
                </tr>
                <tr>
                    <td>First Name</td><td> <input type="text" name="fname" class="form-control"></td>
                </tr>
                <tr>
                    <td>Last Name</td><td> <input type="text" name="lname" class="form-control"></td>
                </tr>
                <tr>
                    <td>Mobile Number</td><td> <input type="text" name="mobile" class="form-control"></td>
                </tr>
                <tr>
                    <td>Gender</td><td> <input type="text" name="gender" class="form-control"></td>
                </tr>

                <tr>
                    <td>Address</td><td> <input type="text" name="address" class="form-control"></td>
                </tr>
                <tr>
                    <td>Email</td><td> <input type="text" name="email" class="form-control"></td>
                </tr>
                <tr>
                    <td> UserName</td><td> <input type="text" name="username" class="form-control"></td>
                </tr>

                <tr>
                    <td>Password</td><td> <input type="password" name="password" class="form-control"></td>
                </tr>

                <tr>
                    <td><input id="submit" type="submit" name="submit" value="Sign-Up" class="btn btn-info"></td>
                    <td><!--input id="button" type="submit" name="submit" value="Sign-Up"--></td>
                </tr>
                <tr>
                    <td><a class="btn" href="LoginSh.php">Sign-In</a></td>
                </tr>
            </form>
        </div>
    </div>
</div>
<?php
require_once "../includes/layout/footer.php";
?>

