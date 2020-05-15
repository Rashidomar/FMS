<?php

require_once "../includes/course.php";

$course = new Course();

    $errors = array();

	if(isset($_POST['submit']))
	{
        $Course_Id = $_POST["Course_Id"];
        $Course_Name = $_POST["Course_Name"];       
        $Course_description = $_POST["Course_description"];
        $Course_duration = $_POST["Course_duration"];       
        $Course_type = $_POST["Course_type"];
        $Course_fees = $_POST["Course_fees"];
        $location = $_POST["location"];

        $found = $course->check_course($Course_Id);

        if($found->num_rows === 0)
        {
            if($Course_fees > 0)
            {
                $new_course = $course->course_register($Course_Id ,$Course_Name,$Course_description,$Course_duration ,$Course_type ,$Course_fees, $location);

           if($new_course)
           {
                //header('Location: RegisterAdmin.php');
    
           }else{
    
                    $errors[] = "Unsuccessful... Something went wrong.";
                }
            }

           
        }else{
    
            $errors[] = "employee already exist";
        }
    }
require_once "../layout/header.php";
?>
<div ng-controller="AddCourseDetails">
<div class="container container-fluid">
 
<div><a href="admin.php" > 
    <button class="btn btn-default"">Back</button></a>
</div>
    
    <center><h2><b>Add Cources</b></h2></center>
    <hr>  

   
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4 col-lg-8"> 

    <form method="POST"> 
    <div class="form-group row flex-v-center">
        <div class="col-xs-2 col-sm-4">
            <label for="from">Course ID</label>
        </div>
        <div class="col-xs-6">
        <!-- <label>First Name</label> -->
            <p class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-eye-open"></i></span>
                <input type="text" class="form-control" name="Course_Id" placeholder="Course Id">             
            </p>
        </div>
    </div>

    <div class="form-group row flex-v-center">
        <div class="col-xs-2 col-sm-4">
            <label for="from">Course Name</label>
        </div>
        <div class="col-xs-6">
        <p class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
            <input type="text" name="Course_Name" class="form-control" placeholder="Course Name">             
        </p>
        </div>
    </div>

    <div class="form-group row flex-v-center">
        <div class="col-xs-2 col-sm-4">
            <label for="from">Course Type</label>
        </div>
        <div class="col-xs-6">
        <p class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
                <select class="form-control" name="Course_type">
                    <option value="parttime">Part Time</option>   
                    <option value="fulltime">Full Time</option> 
         
                </select>
        </p>
        </div>
    </div>

    <div class="form-group row flex-v-center">
        <div class="col-xs-2 col-sm-4">
            <label for="from">Course Duration</label>
        </div>
        <div class="col-xs-6">
        <p class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <select class="form-control" name="Course_duration">
                    <option value="6 month">6 Month</option>   
                    <option value="1 year">1 Year</option> 
                    <option value="2 year">2 Year</option> 
         
                </select>
        </p>
        </div>
    </div>


    <div class="form-group row flex-v-center">
        <div class="col-xs-2 col-sm-4">
            <label for="from">Description</label>
        </div>
        <div class="col-xs-6">
        <p class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                <input type="textarea" class="form-control" name="Course_description" placeholder="description" required="required">             
            </p>
        </div> 
    </div>

    <div class="form-group row flex-v-center">
        <div class="col-xs-2 col-sm-4">
            <label for="from">Course Fees</label>
        </div>
        <div class="col-xs-6">
        <p class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                <input type="text" class="form-control" name="Course_fees" placeholder="Course Fees" required="required">             
            </p>
        </div> 
    </div>

    <div class="form-group row flex-v-center">
            <div class="col-xs-2 col-sm-4">
                <label for="from">Course Locations</label>
            </div>
            <div class="col-xs-6">
            <p class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                    <input type="text" class="form-control"
                    name="location" placeholder="Course Locations(ex:Galle,Colombo,Matara)" required="required">             
                </p>
            </div> 
        </div>

    <div class="form-group">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <button type="submit" name="submit" class="btn btn-warning login-btn btn-block">Add Course 
        <span class="glyphicon glyphicon-send"></span></button>
        </div><div class="col-sm-4"><input type="reset" class="btn btn-danger" value="clear"></div>
    </div>
    </div> 
    </form>
</div>
</div>
</div>
<?php
require_once "../includes/layout/footer.php";
?>

    