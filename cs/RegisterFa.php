<?php

require_once "../includes/farmer.php";

$farmer = new Farmer();

if (isset($_POST['submit'])) {

    $Id = $_POST['nic'];
    $First_Name = $_POST['name'];
    $Tele_Number = $_POST['mobile'];
    $Gender = $_POST['gender'];
    $Email = $_POST['email'];
    $Address = $_POST['address'];
    $variety = $_POST['q1'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $farmer->farmer_register($Id,$First_Name,$Tele_Number,$Gender,$Email,$Address,$variety,$username,$password);
  
    if ($result) {
        echo "YOUR REGISTRATION IS COMPLETED...";
    } else {
        echo "Error";
    }
}
require_once "../includes/layout/header.php"; 
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

            <form name="register"  method="POST"  action="RegisterFarmer.php" >
                <h2 class="text-center"><span class="glyphicon glyphicon-user"></span> Farmer Registration</h2>

                <tr>
                    <td>NIC</td><td><input type="text" name="nic" class="form-control" required/></td>
                </tr>

                <tr>
                    <td>Name</td><td><input type="text" name="name" class="form-control" required/></td>
                </tr>
                <tr>
                    <td>MobileNumber</td><td><input type="text" name="mobile"  class="form-control" required/></td>
                </tr>
                <tr>
                    <td> Email</td><td><input type="text" name="email"  class="form-control" required/></td>
                </tr>
                <tr>
                    <td> Gender</td><td><input type="text" name="gender"  class="form-control" required /></td>
                </tr>
                <tr>
                    <td>Address</td><td><input type="text" name="address" class="form-control" required/></td>
                </tr>
                <tr>
                    <hr>
                    <td><u> Varieties</u></td><br/>
                    Vegetables
                    <td> <input type="radio" name="q1" value="Vegetables" data-toggle="modal" data-target="#myModal"/>
                        <br>Fruits
                        <input type="radio"  name="q1" value="Fruits" data-toggle="modal" data-target="#myModal"/>
                        <br>Animal products
                        <input type="radio" name="q1" value="Animal products" data-toggle="modal" data-target="#myModal"/>
                        <br>Milk based products
                        <input type="radio" name="q1" value="Milk based products" data-toggle="modal" data-target="#myModal"/>
                        <br/><hr>
                    </td>
                </tr>
                <tr>
                    <td> UserName</td><td> <input type="text"class="form-control"  name="username" required></td>
                </tr>
                <tr>
                    <td> Password</td><td> <input type="password" class="form-control"  name="password" required></td>
                </tr>

                <tr>
                    <td><input id="submit" type="submit" name="submit" value="Sign-Up" class="btn btn-info"></td>
                </tr>
                <tr>
                    <div class="col-sm-4">

                    </div>
                    <td>
                        <div class="col-sm-4">
                        <a class="btn" href="LoginFa.php">Sign-In</a>
                    </div>
                </td>
                </tr>

            </form>
        </div>
    </div>

</div>
<?php
require_once "../includes/layout/footer.php";
?>

