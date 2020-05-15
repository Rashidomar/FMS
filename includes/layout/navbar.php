<?php
require_once "../includes/sessions.php";
?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="Home.html">OFARM</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="#services">SERVICES</a></li>
                <li><a href="course.php">COURSES</a></li>
                <li><a href="Order_foods.php">PRICING</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <?php
                if(!$session->is_logged_in()) {
         echo '
                <ul class="nav navbar-nav navbar-right">
                    <!--li><a href="Registration.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li-->
                    <li><div class="dropdown">
                        <a><button class="dropbtn"><span class="glyphicon glyphicon-log-in"></span> Sign in</button></a>
                        <div class="dropdown-content">
                            <div ng-controller="loginbuttonctrl">
                            <a  href="LoginSh.php" >Registered Shop</a>
                            <a href="LoginFa.php">Registered Farmer</a>
                            <a href="LoginSt.php">Registered Student</a>
                            </div>
                        </div>
                    </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!--li><a href="Registration.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li-->
                    <li><div class="dropdown">
                        <a><button class="dropbtn"><span class="glyphicon glyphicon-log-in"></span> Sign up</button></a>
                        <div class="dropdown-content">
                            <div ng-controller="loginbuttonctrl">
                            <a  href="RegisterSh.php" >Register Shop</a>
                            <a href="RegisterFa.php">Register Farmer</a>
                            <a href="RegisterSt.php">Register Student</a>
                            </div>
                        </div>
                    </div>
                    </li>
                </ul>
            ';}else{
                echo '
                <ul class="nav navbar-nav navbar-right">
                <li><div class="dropdown">
                    <a><button class="dropbtn"><span><strong>'.$session->username.'</strong></span></button></a>
                    <div class="dropdown-content">
                        <div>
                        <a class="dropdown-item" href="MemberStudent.php?link=logout">Logout</a>
                        </div>
                    </div>
                </div>
                </li>

            </ul>
                ';
            }
            ?>
            </ul>
        </div>
    </div>

</nav>