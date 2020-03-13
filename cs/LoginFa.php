<?php
require_once "../includes/farmer.php";

require_once "../includes/sessions.php";


$student = new Farmer();

$session = new Session();

if(isset($_POST['submit'])){

    //echo "<script>alert('hello')</script>";
    // username and password sent from form
    $username=$_POST['username'];
    $password=$_POST['password'];

    $found = $shop->farmer_authenticate($username, $password);

    if ($found) {

        $Id = "";

        while ($row = $found->fetch_assoc()) {

            $Id = $row['nic'];

        }
            
    // Mysql_num_row is counting table row
        $count = mysqli_num_rows($found);

    // If result matched $username and $password, table row must be 1 row
    
            if ($count > 0) {

                $session_values = $session->create_session($Id, $username);

                if($session_values['id'] && $session_values['username']){
    
                    header("Location: MemberStudent.php");
                }

            } 
    }else {

        header('Location: LoginStudent.php');
        
    }
}

require_once "layout/header.php";
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
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">DARKO FARM</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="#services">SERVICES</a></li>
                    <li><a href="course.php">COURSES</a></li>
                    <li><a href="Order_foods.php">PRICING</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                    <ul class="nav navbar-nav navbar-right">
                        <!--li><a href="Registration.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li-->
                        <li><div class="dropdown">
                                <a><button class="dropbtn"><span class="glyphicon glyphicon-log-in"></span> Sign in | Sign up</button></a>
                                <div class="dropdown-content">
                                    <div ng-controller="loginbuttonctrl">
                                        <a  href="LoginSh.php" >Registered Shop</a>
                                        <a href="LoginFa.php">Registered Farmer</a>
                                        <a href="LoginSt.php" >Student</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--li><a href="FarmShopLoginForm.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li-->
                    </ul>
                </ul>
            </div>
        </div>

    </nav>

    <div id="myCarousel" class="carousel slide" data-interval="6000" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Carousel items -->
        <div class="carousel-inner" role="listbox" style=" width:100%; height:250px !important;">
            <div class="item active">
                <img src="img/y.jpg" alt="First Slide" width="100%">
                <div class="carousel-caption">
                    <h3>Vegetables and Fruits</h3>
                    <p>There are fresh vegetables and fruits</p>
                </div>
            </div>
            <div class="item">
                <img src="img/z.jpg" alt="Second Slide" width="100%" >
                <div class="carousel-caption">
                    <h3>Clean Milk Products</h3>
                    <p>Fresh Milk Products with good condition</p>
                </div>
            </div>
            <div class="item">
                <img src="img/zz.jpg" alt="Third Slide" width="100%">
                <div class="carousel-caption">
                    <h3>Farm House</h3>
                    <p>Vegetables , fruits & beans from farm house</p>
                </div>
            </div>
        </div>


        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>

    <br/>
    <a href="home.html"><button class="btn btn-default">Back</button></a>

    <div class="container">
        <div class="login-form">
            <form method="post" action="LoginFarmer.php">
                <h2 class="text-center"><span class="glyphicon glyphicon-user"></span> Registered Farmers Login</h2>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="username" placeholder="Username" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success login-btn btn-block" name="submit" >Sign in</button>
                </div>
                <div class="clearfix">
                    <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>

                </div>
                <div class="or-seperator"><i>or</i></div>


            </form>
            <p class="text-center text-muted small">Don't have an account? <a href="RegisterFa.php">Sign up here!</a></p>
        </div>
    </div>
</div>









<footer class="text-center">
    <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a><br><br>

    <!-- Footer Elements -->
    <div class="container">

        <!-- Grid row-->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-12 py-5">
                <div class="mb-5 flex-center">

                    <!-- Facebook -->
                    <div class="col-md-2 mb-md-1 mb-1">
                        <a class="fb-ic">
                            <i class="fa fa-facebook-square" aria-hidden="true"></i>
                        </a>
                    </div>
                    <!-- Twitter -->
                    <div class="col-md-2 mb-md-1 mb-1">
                        <a class="tw-ic">
                            <i class="fa fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                    </div>
                    <!-- Google +-->
                    <div class="col-md-2 mb-md-1 mb-1">
                        <a class="gplus-ic">
                            <i class="fa fa-google-plus fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                    </div>
                    <!--Linkedin -->
                    <div class="col-md-2 mb-md-1 mb-1">
                        <a class="li-ic">
                            <i class="fa fa-linkedin fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                    </div>
                    <!--Instagram-->
                    <div class="col-md-2 mb-md-1 mb-1">
                        <a class="ins-ic">
                            <i class="fa fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                    </div>
                    <div class="col-md-2 mb-md-1 mb-1">
                        <a class="pin-ic">
                            <i class="fa fa-pinterest fa-lg white-text fa-2x"> </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center py-3">© 2018 Copyright:

    </div>
</footer>
</div>
</body>
</html>
<script type="text/javascript">
    var a='<?php echo $_SESSION['error'];?>';
    swal({
        type: 'error',
        title: 'Oops...',
        text: 'Wrong Login details !',
        footer: a
    });
</script>