<?php
require_once "../includes/admin.php";

$admin = new Admin();

    $errors = array();

	if(isset($_POST['submit']))
	{
        $employee_Id = $_POST['employee_id'];
        $username = $_POST['username'];
        $password = $_POST['password'];


        $found = $admin->check_admin($employee_Id,$username);

        if($found->num_rows === 0)
        {
           $new_admin = $admin->admin_register($employee_Id,$username,$password);

           if($new_user)
           {
                header('Location: adminwelcome.php');
    
           }else{
    
                $errors[] = "Unsuccessful... Something went wrong.";
            }
        }else{
    
            $errors[] = "Username and Email already exist";
        }

	}


require_once "layout/header.php";
?>
<div class="container">
<hr>
<a href="adminwelcome.php"><button class="btn btn-default">Back</button></a>
</div>
<center><h2><b>Admin Registration</b></h2></center>
<hr>
<form class="form-horizontal" method="POST" >
<!-- Form Name -->


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Employee Id</label>  
  <div class="col-md-4">
    <input name="employee_id" type="text" placeholder="employee id" class="form-control input-md">
  </div>

</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Username</label>  
  <div class="col-md-4">
    <input name="" type="text" placeholder="username" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Password</label>  
  <div class="col-md-4">
  <input  name="password" type="password" placeholder="password" class="form-control input-md">
  <hr>
  <?php
      if ($errors) {
          foreach ($errors as $error) {
            echo '
            <div class="alert alert-danger"><strong>'
            .$error 
            .'</strong></div>';
      }
  }
  ?>
  </div>
</div>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
  <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">
  </div>

   
</div>

</div>
</form>

<div class="container"  style="width:500px;">  
                                               
<br /><br />  
<table class="table table-bordered">  
  <tr>  
        <th>Employee Id</th>
        <th>Username</th>  
        <th>Password</th>
        <th>Update</th>
        <th>Delete</th> 
  </tr>
  <?php 
    $result = $admin->find_all();
    while ($row = $result->fetch_assoc())
    {    
        echo ' 
      <tr>
            <td>'.$row['Id'].'</td>
            <td>'.$row['User_Name'].'</td>
            <td>'.$row['Password'].'</td>
            <td><button class="btn btn-warning btn-xs">Update</button></td> 
            <td><button class="btn btn-danger btn-xs">Delete</button></td> 
      </tr>';
    }  
?>
</table>  
</div>  
</div>  

<?php
require_once "layout/footer.php";
?>

