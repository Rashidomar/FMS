<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="Home.html">DARKO FARM</a>
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