<?php
require_once"../includes/admin.php";

$admin = new Admin();

$messages = array();

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $admin->admin_authenticate($username, $password);

    if($result){
        $messages[] = "Successful Logged In ";
    }else{

        $messages[] = "Wrong Username and password";
    }
    
}





require_once "layout/header.php";
?>
<div ng-controller="adminloginctrl">
<style>
    .abc-cccc {
        
        padding: 8px;
    }
    .well {
        
        padding: 40px;
    }
</style>
<div class="container">
   <div class="login-form">
    <form method="POST">
        <h2 class="text-center"><span class="glyphicon glyphicon-user"></span> Admin Login</h2>   
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" name="username" placeholder="Username">             
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password">             
            </div>
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-warning login-btn btn-block" name="submit">Sign in</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            
        </div>
        <div class="or-seperator"><i>or</i></div>
        
        
    </form>
    <p class="text-center text-muted small">Don't have an account? <a href="RegisterAdmin.php">Sign up here!</a></p>
</div>
</div>
</div>

<style type="text/css">
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
</style>

<?php
require_once "layout/footer.php";
?>
