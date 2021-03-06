<?php
require_once "../includes/farmer.php";
require_once "../includes/layout/header.php";

$farmer = new Farmer();

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


<div ng-controller="AddfarmerDetails" class="container" 
ng-init="displayfarmers()">
<hr>
<div><a href="admin.php" > 
    <button class="btn btn-default"">Back</button></a>
</div>
    
      
<h2><span class="glyphicon glyphicon-file"></span> Farmer's Details</h2>
<table class="table table-bordered table-striped"> 
    <thread class="thread-dark"> 
    <tr>
        <th><b>Registration ID</b></th>
        <th><b>Name</b></th>
        <th><b>Contact</b></th>
        <th><b>Male/Female</b></th>
        <th><b>Email</b></th>
		<th><b>Address</b></th>
        <th><b>variety</b></th>
        <th><b>username</b></th>
        <th><b>Edit</b></th>
        <th><b>Delete</b></th>
    </tr>
    </thread>
    <tbody>
    <?php 
    $result = $farmer->find_all();
    while ($row = mysqli_fetch_assoc($result))
    {    
        echo '
        <tr>
        <td>'.$row['Id'].'</td>
        <td>'.$row['First_Name'].'</td>  
        <td>'.$row['Tele_Number'].'</td> 
        <td>'.$row['Gender'].'</td>
        <td>'.$row['Email'].'</td>
        <td>'.$row['Address'].'</td>
        <td>'.$row['variety'].'</td>
        <td>'.$row['username'].'</td>
        <td><button onclick="showEdit()" ng-click="editDetails(x)" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>
            </button></td>
        <td><button class="btn btn-danger" ng-click="deletefarmers(x.Id)"><span class="glyphicon glyphicon-trash"></span>
            </button></td>
        </tr> 
    
        <div id="myModal" class="modal" ng-init="editDetails()">
        <!-- Modal content -->
        <div class="modal-content" ng-init="details">
            <span class="close">&times;</span>
            <form method="POST"> 
                    <div class="form-group row flex-v-center">
                        <div class="col-xs-2 col-sm-4">
                            <label for="from">Id Number </label>
                        </div>
                        <div class="col-xs-6">
                        <!-- <label>First Name</label> -->
                            <p class="input-group">  
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control"  id="textinput" required name="textinput" 
                                readonly ng-model="details.Id" ng-init="details.Id=details.Id" placeholder="Id Number">             
                            </p>
                        </div>
                    </div>
                
                    <div class="form-group row flex-v-center">
                        <div class="col-xs-2 col-sm-4">
                            <label for="from">Name</label>
                        </div>
                        <div class="col-xs-6">
                        <p class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                            <input type="text" class="form-control" id="textinput" required name="textinput" 
                            ng-model="details.First_Name" ng-init="details.First_Name=details.First_Name" placeholder="First Name">             
                        </p>
                        </div>
                    </div>
                
                    <div class="form-group row flex-v-center">
                        <div class="col-xs-2 col-sm-4">
                            <label for="from">Contact</label>
                        </div>
                        <div class="col-xs-6">
                        <p class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
                                <input type="text" class="form-control" id="textinput" required name="textinput" 
                            ng-model="details.Tele_Number" ng-init="details.Tele_Number=details.Tele_Number" placeholder="Contact"> 
                        </p>
                        </div>
                    </div>
                
                    <div class="form-group row flex-v-center">
                        <div class="col-xs-2 col-sm-4">
                            <label for="from">Gender</label>
                        </div>
                        <div class="col-xs-6">
                        <p class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
                                <select class="form-control" name="textinput" ng-model="details.Gender"
                                ng-init="details.Gender=details.Gender">
                                    <option value="male">Male</option>   
                                    <option value="female">Female</option> 
                                     
                         
                                </select>
                        </p>
                        </div>
                    </div>
                
                
                    <div class="form-group row flex-v-center">
                        <div class="col-xs-2 col-sm-4">
                            <label for="from">Email</label>
                        </div>
                        <div class="col-xs-6">
                        <p class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                <input type="email" class="form-control" id="textinput" required name="textinput" 
                                ng-model="details.Email" ng-init="details.Email=details.Email"
                                placeholder="Email" required="required">             
                            </p>
                        </div> 
                    </div>
                
                    <div class="form-group row flex-v-center">
                        <div class="col-xs-2 col-sm-4">
                            <label for="from"> Address</label>
                        </div>
                        <div class="col-xs-6">
                        <p class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                <input type="text" class="form-control" id="textinput" required name="textinput" 
                                ng-model="details.Address" ng-init="details.Address=details.Address"
                                placeholder="Address" required="required">             
                            </p>
                        </div> 
                    </div>
                
                    <div class="form-group row flex-v-center">
                            <div class="col-xs-2 col-sm-4">
                                <label for="from">Variety</label>
                            </div>
                            <div class="col-xs-6">
                            <p class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                    <select class="form-control" name="textinput" ng-model="details.variety"
                                    ng-init="details.variety=details.variety">
                                        <option value="Vegetables">Vegetables </option>   
                                        <option value="Fruits">Fruits</option> 
                                        <option value="Animal">Animal products </option>   
                                        <option value="Milk">Milk based products</option> 
                             
                                    </select>             
                                </p>
                            </div> 
                        </div>
                        
                    <div class="form-group row flex-v-center">
                        <div class="col-xs-2 col-sm-4">
                            <label for="from">User Name</label>
                        </div>
                        <div class="col-xs-6">
                        <p class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                <input type="text" class="form-control" id="textinput" required name="textinput" 
                                ng-model="details.username" ng-init="details.username=details.username"
                                    placeholder="User Name" required="required">             
                            </p>
                        </div> 
                    </div>
					

                
                    <div class="form-group">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                        <button type="submit" name="registration" class="btn btn-warning login-btn btn-block" 
                        ng-click="editfarmer()">Edit Details 
                        <span class="glyphicon glyphicon-send"></span></button>
                        
                    </div>
                </div> 
            </form>




        </div>
        
        </div>

    </tr>
    </tbody>
    ';}  
    ?> 
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

      