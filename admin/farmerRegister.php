<?php
require_once "../includes/farmer.php";

$farmer = new Farmer();

$messages = array();

if(isset($_POST["registration"])){

	$Id = $_POST["Id"];
	$First_Name = $_POST["First_Name"];       
	$Tele_Number = $_POST["Tele_Number"];
	$Gender = $_POST["Gender"];       
	$Email = $_POST["Email"];
	$Address = $_POST["Address"];
	$variety = $_POST["variety"];
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = $farmer->farmer_register($Id,$First_Name,$Tele_Number,$Gender,$Email,$Address,$variety,$username,$password);

	if($result){

		$messages[] = "Successful";
	}else{

		$messages[] = "Error";

	}

}


require_once "../includes/layout/header.php";
?>
<div class="col-md-2"></div>
<div ng-controller="AddfarmerDetails">
	<div class="container container-fluid">
	  <div class="well">
	  <div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-4 col-lg-8"> 
		<a href="farmshopwelcome.php"><button class="btn btn-default">Back</button></a>
		<center><h2><b>New Farmer Registration</b></h2></center>
		<hr>  
	
		<form method="POST"> 
		<div class="form-group row flex-v-center">
			<div class="col-xs-2 col-sm-4">
				<label for="from">Registration ID</label>
			</div>
			<div class="col-xs-6">
			<!-- <label>First Name</label> -->
				<p class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input type="text" class="form-control" name="Id" placeholder=" Id">             
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
				<input type="text" class="form-control" name="First_Name" placeholder="Name">             
			</p>
			</div>
		</div>
	
		<div class="form-group row flex-v-center">
			<div class="col-xs-2 col-sm-4">
				<label for="from">Contact</label>
			</div>
			<div class="col-xs-6">
			<p class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
				<input type="text" class="form-control"  name="Tele_Number" placeholder="Mobile/Tel">             
			</p>
			</div>
		</div>

		<div class="form-group row flex-v-center">
			<div class="col-xs-2 col-sm-4">
				<label for="from">Male/Female</label>
			</div>
			<div class="col-xs-3">
			<p class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
					<select class="form-control" name="Gender">
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
					<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
					<input type="email" class="form-control" name="Email" placeholder="Email">             
				</p>
			</div> 
		</div>
	
	
		<div class="form-group row flex-v-center">
			<div class="col-xs-2 col-sm-4">
				<label for="from">Address</label>
			</div>
			<div class="col-xs-6">
			<p class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
					<input type="text" class="form-control" name="Address" placeholder="Address">             
				</p>
			</div> 
		</div>
	
		<div class="form-group row flexvariety-v-center">
			<div class="col-xs-2 col-sm-4">
				<label for="from">Variety </label>
			</div>
			<div class="col-xs-6">
			<p class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
					<select class="form-control" name="variety">
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
				<label for="from">username</label>
			</div>
			<div class="col-xs-6">
			<p class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input type="text" class="form-control"  name="username" placeholder="username">             
				</p>
			</div> 
		</div>
		
		<div class="form-group row flex-v-center">
			<div class="col-xs-2 col-sm-4">
				<label for="from">password</label>
			</div>
			<div class="col-xs-6">
			<p class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input type="password" class="form-control" name="password" placeholder="password">	
				</p>
			</div> 
		</div>	

		<div class="form-group">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
			<button type="submit" name="registration" class="btn btn-warning login-btn btn-block">
				Add Farmer 
			<span class="glyphicon glyphicon-send"></span></button>
			</div><div class="col-sm-4"><input type="reset" class="btn btn-danger" value="clear"></div>
		</div>
		<hr>
  		<?php
  		    if ($messages) {
  		        foreach ($messages as $message) {
  		          echo '
  		          <div class="alert alert-danger role="alert"><strong>'
  		          .$message 
  		          .'</strong></div>';
  		    }
  		}
  		?>
		</div> 
		</form>
	</div>
	</div>
	</div>

<?php
	require_once "../includes/layout/footer.php";
?>
