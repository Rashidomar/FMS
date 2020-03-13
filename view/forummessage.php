<?php
require_once "layout/header.php";


require_once "../includes/item.php";
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


<div ng-controller="ForumMessageDetails" class="container" 
ng-init="displayMessages()">
<hr>
<div ng-controller="Admincontroller"> 
<button class="btn btn-default" ng-click="showAdmin()">Back</button>
</div>
    
<h2><span class="glyphicon glyphicon-envelope"></span><b> Forum Messages</b></h2>
<table class="table table-bordered table-striped"> 
<thread class="thread-dark"> 
<tr>
    <th><b>Name</b></th>
    <th><b>Email</b></th>
    <th><b>Message</b></th>
    <th></th>
    <th></th>
</tr>
</thread>
<tbody>
<tr ng-repeat="x in items">
    <td>{{x.name}}</td>
    <td>{{x.email}}</td>  
    <td>{{x.message}}</td> 
    <td><button onclick="showEdit()" ng-click="editDetails(x)" class="btn btn-warning"><span class="glyphicon glyphicon-comment"></span>
        </button></td>
    <td><button ng-click="deleteDetails(x)" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
    </button></td>  
        
    <div id="myModal" class="modal" ng-init="editDetails()">
    <!-- Modal content -->
    <div class="modal-content" ng-init="details">
        <span class="close">&times;</span>
        <form method="POST"> 
                <div class="form-group row flex-v-center">
                    <div class="col-xs-2 col-sm-4">
                        <label for="from">Name </label>
                    </div>
                    <div class="col-xs-6">
                    <!-- <label>First Name</label> -->
                        <p class="input-group">  
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control"  id="textinput" required name="textinput" 
                            readonly ng-model="details.name" ng-init='details.name=details.name' placeholder="Name">             
                        </p>
                    </div>
                </div>
            
                <div class="form-group row flex-v-center">
                    <div class="col-xs-2 col-sm-4">
                        <label for="from">Email</label>
                    </div>
                    <div class="col-xs-6">
                    <p class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="email" class="form-control" id="textinput" required name="textinput" 
                        readonly ng-model="details.email" ng-init="details.email=details.email" placeholder="Email">             
                    </p>
                    </div>
                </div>

            
                <div class="form-group row flex-v-center">
                    <div class="col-xs-2 col-sm-4">
                        <label for="from">Subject</label>
                    </div>
                    <div class="col-xs-6">
                    <p class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select class="form-control" name="textinput" ng-model="details.subject">
                                <option value="Report">Report</option>   
                                <option value="Information">Information</option> 
                                <option value="Course">Course</option> 
                                <option value="Farmers">Farmers</option> 
                        
                            </select>
                    </p>
                    </div>
                </div>
                <div class="form-group row flex-v-center">
                    <div class="col-xs-2 col-sm-4">
                        <label for="from">Reply</label>
                    </div>
                    <div class="col-xs-6">
                    <p class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                        <textarea class="form-control" id="textinput" required name="textinput" 
                        ng-model="details.reply" placeholder="Reply"> </textarea>           
                    </p>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                    <button type="submit" name="registration" class="btn btn-success login-btn btn-block" 
                    ng-click="sendMail()">
                    <i class="fa fa-leaf fa-3x"></i><br/>Reply</button>
                    
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
require_once "layout/footer.php";
?>

          