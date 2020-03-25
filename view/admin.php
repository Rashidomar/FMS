<?php
require_once "../includes/sessions.php";

$session = new Session();


require_once "layout/header.php";
?>
<style>
 .well {
       
    padding: 8px;
    }

 .row{
 	padding: 4px;
 }

</style>

<div ng-controller="Admincontroller">
<div class="container">
	<?php
		if($session->is_logged_in()){

			echo '<h1><i class="fa fa-user fa-2x"></i> Hi '.$session->username.'</h1>';
		
		}else{
			header("Location: adminwelcome.php");
		}
	?>
	<div class ="col-sm-10"></div>
	<div class="col-sm-2">
		<div class="btn-group">
		<button type="button" class="btn btn-warning btn-sq-lg glyphicon glyphicon-eye-open" href="RegisterCashier.php" > Register</button>
		<button type="button" class="btn btn-warning btn-sq-lg dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				
		<span class="caret"></span>
		<span class="sr-only">Toggle Dropdown</span>
		</button>
			<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuLink">
			<li><a href="admin.php">Admin</a></li>
			<li class="divider"></li>
			<li><a href="RegisterCashier.php">Employee</a></li>
			</ul>
		</div>
	</div>
	</div>

<div class="container">
	
	<div class="row">
	
	<div class="col-lg-3"><div class="well"><span class="glyphicon glyphicon-shopping-cart"></span><b><i>Farm Shop</i></b></div></div>

		<div class="col-lg-3"><a href="loadingFarmShop.php" class="btn btn-success btn-sq-lg btn-block" >
				<i class="fa fa-shopping-cart fa-4x"></i><br/>Loading Items</a></div>
		<div class="col-lg-3"><a href="viewFarmshop.php" ><button class="btn btn-success btn-sq-lg btn-block">
				<i class="fa fa-eye fa-4x"></i><br/>View Shop Details</button></a></div>
		<div class="col-lg-3"><a href="Items.php"><button type="button" class="btn btn-success btn-sq-lg btn-block">
				<i class="fa fa-edit fa-4x"></i><br/>Edit Items Details</button></a></div>
	<br/>
	</div>

	<div class="row">
	<div class="col-sm-3"><div class="well"><span class="glyphicon glyphicon-barcode"></span><b><i> Farm Stores</i></b></div></div>
		<div class="col-sm-3"><a href="loadItemsToStores.php"><button class="btn btn-success btn-sq-lg btn-block">
				<i class="fa fa-edit fa-4x"></i><br/>Loading Farm product</button></a></div>
		<div class="col-sm-3"><a href="loadItemsToStoresFromRegfarmers.php"><button class="btn btn-success btn-sq-lg btn-block">
				<i class="fa fa-registered fa-4x"></i><br/>Loading From Registered Farmers </button></a></div>
		<div class="col-sm-3"><a href="viewStores.php"><button class="btn btn-success btn-sq-lg btn-block">
				<i class="fa fa-eye fa-4x"></i><br/>View Stores Details..</button></a></div>
	</div>

	

	<div class="row">
	<div class="col-sm-3"><div class="well"><span class="glyphicon glyphicon-pawn"></span><b><i> Registered Farmers</i></b></div></div>
		<div class="col-sm-3"><a href="farmerRegister.php" ><button class="btn btn-primary btn-sq-lg btn-block"> 
			<i class="fa fa-registered fa-4x"></i><br/>Registation</button></a></div>
		<div class="col-sm-3"><a href="viewfarmers.php" ><button class="btn btn-primary btn-sq-lg btn-block" href="" >
			<i class="fa fa-eye fa-4x"></i><br/>View Registered Farmers</button></a></div>
		<div class="col-sm-3"><a href="#" ><button class="btn btn-primary btn-sq-lg btn-block">
			<i class="fa fa-shopping-cart fa-4x"></i><br/>Purchasing</button></a></div>
	</div>

	
	<div class="row">
		<div class="col-sm-3"><div class="well"><span class="glyphicon glyphicon-gift"></span><b><i> Registered Shop</i></b></div></div>
		<div class="col-sm-3"><a href="shopRegister.php" ><button class="btn btn-primary btn-sq-lg btn-block">
				<i class="fa fa-registered fa-4x"></i><br/>Registation</button></a></div>
		<div class="col-sm-3"><a href="viewRegshop.php" ><button class="btn btn-primary btn-sq-lg btn-block">
				<i class="fa fa-eye fa-4x"></i><br/>View Registered Shop</button></a></div>
		<div class="col-sm-3"><a href="viewRegShopOrders.php" ><button type="button" class="btn btn-primary btn-sq-lg btn-block">
				<i class="fa fa-cart-arrow-down fa-4x"></i><br/>Online Purchasing Details</button></a></div>
	</div>

	<div class="row">
		<div class="col-sm-3"><div class="well"><span class="glyphicon glyphicon-book"></span><b><i> Courses</i></b></div></div>
		<div class="col-sm-3"><a  href="addcources.php"><button class="btn btn-info btn-sq-lg btn-block">
				<i class="fa fa-edit fa-4x"></i><br/>Add Courses</button></a></div>
		<div class="col-sm-3"><a href="viewcources.php"><button class="btn btn-info btn-sq-lg btn-block">
				<i class="fa fa-eye fa-4x"></i><br/>Course Details</button></a></div>
	</div>

	<div class="row">
		<div class="col-sm-6"><div class="well"><span class="glyphicon glyphicon-tent"></span><b><i> Temperature / Humidity of Greenhouses </i></b></div></div>
		<div class="col-sm-2"><a href = "https://sasadaramonker.000webhostapp.com/app/index.html"type="button" target="_blank"  class="btn btn-warning btn-sq-lg btn-block"><center> A</center></a></div>
		<div class="col-sm-2"><a href = "https://sasadaramonker.000webhostapp.com/app/index.html"type="button" target="_blank"  class="btn btn-warning btn-sq-lg btn-block"><center> B</center></a></div>
		<div class="col-sm-2"><a href = "https://sasadaramonker.000webhostapp.com/app/index.html"type="button" target="_blank"  class="btn btn-warning btn-sq-lg btn-block"><center> C</center></a></div>
		<div class="col-sm-2"><a href = "https://sasadaramonker.000webhostapp.com/app/index.html"type="button" target="_blank"  class="btn btn-warning btn-sq-lg btn-block"><center> D</center></a></div>
		<div class="col-sm-2"><a href = "https://sasadaramonker.000webhostapp.com/app/index.html"type="button" target="_blank"  class="btn btn-warning btn-sq-lg btn-block"><center> E</center></a></div>
		
	</div>


	<div class="row">
		<div class="col-sm-3"><div class="well"><span class="glyphicon glyphicon glyphicon-bed"></span><b><i> Vehicle</i></b></div></div>
		<div class="col-sm-3"><a href="../map.html" target="_blank"><button type="button" class="btn btn-danger btn-sq-lg btn-block">
				<i class="fa fa-map-marker fa-4x"></i><br/>Location</button></a></div>


		

		<div class="col-sm-6">		
		 <textarea class="form-control" type="textarea" name="noti" ng-model = "noti"
            id="message" placeholder="Your Notification For Mobile App Here.........."
            maxlength="6000" rows="4"></textarea>
        </div>
		
	</div>

	<div class="row">
		<div class="col-sm-3"><div class="well"><span class="glyphicon glyphicon-folder-close"></span><b><i> Report</i></b></div></div>
		<div class="col-sm-3"><a href="analyse.php"><button type="button" 
			class="btn btn-warning btn-sq-lg btn-block">
				<i class="fa fa-file fa-4x"></i><br/>Reports</button></a></div>
		
		<div class="col-sm-1"> </div>
		

        <div class="col-sm-4"><a href="appnotification/push_notification.php "><button class="btn btn-primary btn-sq-lg">
			<i class="fa fa-bell fa-4x"></i><br/>Send Notifications</button></a></div>
	</div>
	<div class="row">
			<div class="col-sm-3"><div class="well"><span class="glyphicon glyphicon-user">
			</span><b><i> Customer</i></b></div></div>
			<div class="col-sm-3"><a href="forummessage.php"><button
				class="btn btn-success btn-sq-lg btn-block">
				<i class="fa fa-envelope fa-4x"></i><br/>Forum messages
			</button></a></div>
	</div>
			


	
</div>
</div>
</div>

<?php
require_once "layout/footer.php";
?>






