<?php

require_once "../includes/employee.php";

$employee = new Employee();


if(isset($_POST['submit'])){

    $id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phonenumber = $_POST['phonenumber'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$salary = $_POST['salary'];
	$username = $_POST['username'];
	$password = $_POST['password'];
    $password2 = $_POST['password2'];
    
    // echo "<script>alert('hello, world')</script>";

    if($password == $password2){

        $found = $employee->check_employee($Id, $Username);

        if($found->num_rows === 0){
            $result = $employee->employee_register($Id,$First_Name,$Last_Name,$Tele_Number,$Email,$Address,$Salary,$Username,$Password);
            if($result){
                $messages[] = "Data Inserted...";
            }else{
                $messages[] = "Failed Try Again";
            }
        }else{
            $messages[] = "This User Id or Username has already taken";
        }
    }else{

        $messages[] = "Passwords do not match";
    }

    
}



require_once "layout/header.php";
?>

<div ng-controller="RegisterCashierController" class="container" ng-init="displayData2()">
 
<div ng-controller="Admincontroller"> 
<button class="btn btn-default" ng-click="showAdmin()">Back</button>
</div>



<center><h2>
    <b>Cashier Member Registration</b></h2></center>
<hr>

<div class="container container-fluid">
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4 col-lg-8"> 


<form method="POST"> 
    <div class="form-group row flex-v-center">
        <div class="col-xs-2 col-sm-4">
            <label for="from">EmpID :</label>
        </div>
        <div class="col-xs-6">
            <p class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input class="form-control" type="text" name="id" placeholder="id">             
            </p>
        </div>
    </div>

    <div class="form-group row flex-v-center">
        <div class="col-xs-2 col-sm-4">
            <label for="from">FirstName :</label>
        </div>
        <div class="col-xs-6">
        <p class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" name="firstname" 
            placeholder="firstname" class="form-control">
                       
        </p>
        </div>
    </div>

    <div class="form-group row flex-v-center">
        <div class="col-xs-2 col-sm-4">
            <label for="from">LastName :</label>
        </div>
        <div class="col-xs-6">
        <p class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" name="lastname"
            placeholder="lastname" class="form-control">                
        </p>
        </div>
    </div>

    <div class="form-group row flex-v-center">
        <div class="col-xs-2 col-sm-4">
            <label for="from">Phone :</label>
        </div>
        <div class="col-xs-6">
        <p class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
            <input type="text" name="phonenumber" 
            placeholder="phonenumber" class="form-control">
                 
        </p>
        </div>
    </div>

    <div class="form-group row flex-v-center">
        <div class="col-xs-2 col-sm-4">
            <label for="from">Email :</label>
        </div>
        <div class="col-xs-6">
        <p class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input type="email" name="email" 
            placeholder="email" class="form-control">
 
                 
        </p>
        </div>
    </div>

    <div class="form-group row flex-v-center">
        <div class="col-xs-2 col-sm-4">
            <label for="from">Salary :</label>
        </div>
        <div class="col-xs-6">
        <p class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
            <input type="text" name="salary" 
            placeholder="salary" class="form-control">
          
        </p>
        </div>
    </div>

    <div class="form-group row flex-v-center">
        <div class="col-xs-2 col-sm-4">
            <label for="from">Address :</label>
        </div>
        <div class="col-xs-6">
        <p class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-paperclip"></i></span>
            <textarea class="form-control" placeholder="Address" id="textarea" 
            name="address" ></textarea>
  
          
        </p>
        </div>
    </div>
    
    <div class="form-group row flex-v-center">
        <div class="col-xs-2 col-sm-4">
            <label for="from">Username :</label>
        </div>
        <div class="col-xs-6">
        <p class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" placeholder="username" 
            name="username"class="form-control">    
        </p>
        </div>
    </div>


    <div class="form-group row flex-v-center">
        <div class="col-xs-2 col-sm-4">
            <label for="from">Password :</label>
        </div>
        <div class="col-xs-6">
        <p class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" 
            placeholder="password" name="password" class="form-control">
   
        </p>
        </div>
    </div>

    <div class="form-group row flex-v-center">
        <div class="col-xs-2 col-sm-4">
            <label for="from">Re-Enter :</label>
        </div>
        <div class="col-xs-6">
        <p class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" 
            placeholder="re-enter password" name="password2" class="form-control">
 
   
        </p>
        </div>
    </div>
    <input type="checkbox" ng-model="all">
  <button type="reset" value="clear" class="btn btn-danger">Clear</button>
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-sm-2"></div>
  <button  name="submit" type="submit" class="btn btn-primary btn-lg">
      <i class="fa fa-leaf fa-2x"></i><br/>Register</button>
  
  <button  name="singlebutton" ng-click=updateData() class="btn btn-warning btn-lg">Update</button>



<!--</fieldset>-->
</form>
</div>
</div>

<div class = "row">
<!--<div class ="col-md-2"></div>-->
<div  class = "col-md-12" class = style="width:500px;">  
                
                

<br /><br />  
<table class="table table-bordered">  
    <tr>  
        <th>Emp_Id</th>
        <th>First Name</th>  
        <th>Last Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Salary</th>
        <th>Address</th> 
        <th>Username</th>
        <th>Password</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php 
        $result = $employee->find_all();
        while($row = $result->fetch_assoc())
    echo '
    <tr ng-repeat="x in names">
        <td>'.$row['Id'].'</td>
        <td>'.$row['First_Name'].'</td>  
        <td>'.$row['Last_Name'].'</td> 
        <td>'.$row['Tele_Number'].'</td>
        <td>'.$row['Email'].'</td>  
        <td>'.$row['Salary'].'</td>
        <td>'.$row['Address'].'</td>
        <td>'.$row['Username'].'</td>  
        <td>'.$row['Password'].'</td>
    
        <td><button ng-click="updateDataAdmin(x.Id,x.First_Name, x.Last_Name,x.Tele_Number,x.Email,x.Address,x.Salary,x.Username,x.Password)" class="btn btn-warning btn-xs">Update</button></td> 
        <td><button ng-click="deleteDataAdmin(x.Id )" class="btn btn-danger btn-xs">Delete</button></td> 
    </tr>
    ';?>     
</table>  
</div>  
</div>  
</div>

<?php
require_once "layout/footer.php";
?>
