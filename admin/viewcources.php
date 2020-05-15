<?php

require_once "../includes/course.php";
require_once "../includes/layout/header.php";

$course = new Course(); 
?>

<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }
    
    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }
    
    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }
    
    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>


<div class="container" ng-init="displayCourse()">
<hr>
<div><a href="admin.php" > 
    <button class="btn btn-default"">Back</button></a>
</div>
      
<h2><span class="glyphicon glyphicon-hourglass"></span><b> Course Details</b></h2>
<table class="table table-bordered table-striped"> 
    <thread class="thread-dark"> 
    <tr>
        <th><b>Course ID</b></th>
        <th><b>Course Name</b></th>
        <th><b>Course Description</b></th>
        <th><b>Course Duration</b></th>
        <th><b>Course Type</b></th>
        <th><b>Course Fees</b></th>
        <th><b>Course Locations</b></th>
        <th><b>Edit</b></th>
        <th><b>Delete</b></th>
    </tr>
    </thread>
    <tbody>
    <?php 
    $result = $course->find_all();
    while ($row = mysqli_fetch_assoc($result))
    {    

        echo '
        <tr>
        <td>'.$row['Course_Id'].'</td>
        <td>'.$row['Course_Name'].'</td>  
        <td>'.$row['Course_description'].'</td> 
        <td>'.$row['Course_duration'].'</td>
        <td>'.$row['Course_type'].'</td>
        <td>'.$row['Course_fees'].'</td>
        <td>'.$row['Location'].'</td>
        <td><button onclick="showEdit()" ng-click="editDetails(x)" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>
            </button></td>
        <td><button class="btn btn-danger" ng-click="deleteCourse(x.Course_Id)"><span class="glyphicon glyphicon-trash"></span>
            </button></td>
        </tr>';
    }  
    ?> 

        <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form method="POST"> 
                    <div class="form-group row flex-v-center">
                        <div class="col-xs-2 col-sm-4">
                            <label for="from">Course ID </label>
                        </div>
                        <div class="col-xs-6">
                        <!-- <label>First Name</label> -->
                            <p class="input-group">  
                            <span class="input-group-addon"><i class="glyphicon glyphicon-eye-open"></i></span>
                                <input type="text" class="form-control" name="Course_Id" ng-init='details.Course_Id=details.Course_Id' placeholder="Course Id">             
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
                            <input type="text" class="form-control" name="Course_Name" placeholder="Course Name">             
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
                                <input type="textarea" class="form-control" 
                                name="Course_description" placeholder="description">             
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
                                <input type="text" class="form-control" name="Course_fees"
                                placeholder="Course Fees" >             
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
                                    <input type="text" class="form-control" name="Location" placeholder="Course Locations(ex:Galle,Colombo,Matara)">             
                                </p>
                            </div> 
                        </div>
                
                    <div class="form-group">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                        <button type="submit" name="registration" class="btn btn-warning login-btn btn-block">Edit Details 
                        <span class="glyphicon glyphicon-send"></span></button>
                        
                    </div>
                </div> 
            </form>

        </div>
        
        </div>

    </tr>
    </tbody>

    </table>

</div>
      
<script>
function showEdit(){
    // Get the modal
    var modal = document.getElementById('myModal');
    // Get the button that opens the modal
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks the button, open the modal 
    modal.style.display = "block";
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        }
    }
}
</script>

<?php
require_once "../includes/layout/footer.php";
?>

      