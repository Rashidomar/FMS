<?php
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
	<h1><i class="fa fa-user fa-2x"></i> Hi admin</h1>
	<div class ="col-sm-10"></div>
	<div class="col-sm-2">
		<div class="btn-group">
		<button type="button" class="btn btn-warning btn-sq-lg glyphicon glyphicon-eye-open" ng-click="cashierReg()"> Register</button>
		<button type="button" class="btn btn-warning btn-sq-lg dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				
		<span class="caret"></span>
		<span class="sr-only">Toggle Dropdown</span>
			</button>
			<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuLink">
			<li><a ng-click="adminReg()">Admin</a></li>
			<li class="divider"></li>
			<li><a ng-click="cashierReg()">Employee</a></li>
			</ul>
		</div>
	</div>
	</div>

<div class="container">
	
	<div class="row">
	
	<div class="col-lg-3"><div class="well"><span class="glyphicon glyphicon-shopping-cart"></span><b><i>Farm Shop</i></b></div></div>

		<div class="col-lg-3"><button type="button" class="btn btn-success btn-sq-lg btn-block" >
				<i class="fa fa-shopping-cart fa-4x"></i><br/>Loading Items</button></div>
		<div class="col-lg-3"><button type="button" class="btn btn-success btn-sq-lg btn-block" ng-click="viewShop()" >
				<i class="fa fa-eye fa-4x"></i><br/>View Shop Details</button></div>
		<div class="col-lg-3"><button type="button" class="btn btn-success btn-sq-lg btn-block" ng-click = "addItems()">
				<i class="fa fa-edit fa-4x"></i><br/>Edit Items Details</button></div>
	<br/>
	</div>

	<div class="row">
	<div class="col-sm-3"><div class="well"><span class="glyphicon glyphicon-barcode"></span><b><i> Farm Stores</i></b></div></div>
		<div class="col-sm-3"><button type="button" class="btn btn-success btn-sq-lg btn-block" ng-click="load()" >
				<i class="fa fa-edit fa-4x"></i><br/>Loading Farm product</button></div>
		<div class="col-sm-3"><button type="button" class="btn btn-success btn-sq-lg btn-block" ng-click="loadRegFarmers()" >
				<i class="fa fa-registered fa-4x"></i><br/>Loading From Registered Farmers </button></div>
		<div class="col-sm-3"><button type="button" class="btn btn-success btn-sq-lg btn-block" ng-click="storesView()" >
				<i class="fa fa-eye fa-4x"></i><br/>View Stores Details..</button></div>
	</div>

	

	<div class="row">
	<div class="col-sm-3"><div class="well"><span class="glyphicon glyphicon-pawn"></span><b><i> Registered Farmers</i></b></div></div>
		<div class="col-sm-3"><button type="button" class="btn btn-primary btn-sq-lg btn-block" ng-click="getFarmerReg()"> 
			<i class="fa fa-registered fa-4x"></i><br/>Registation</button></div>
		<div class="col-sm-3"><button type="button" class="btn btn-primary btn-sq-lg btn-block" ng-click="getFarmerview()">
			<i class="fa fa-eye fa-4x"></i><br/>View Registered Farmers</button></div>
		<div class="col-sm-3"><button type="button" class="btn btn-primary btn-sq-lg btn-block">
			<i class="fa fa-shopping-cart fa-4x"></i><br/>Purchasing</button></div>
	</div>

	
	<div class="row">
		<div class="col-sm-3"><div class="well"><span class="glyphicon glyphicon-gift"></span><b><i> Registered Shop</i></b></div></div>
		<div class="col-sm-3"><button type="button" class="btn btn-primary btn-sq-lg btn-block" ng-click="getShopReg()">
				<i class="fa fa-registered fa-4x"></i><br/>Registation</button></div>
		<div class="col-sm-3"><button type="button" class="btn btn-primary btn-sq-lg btn-block"  ng-click="getShopview()">
				<i class="fa fa-eye fa-4x"></i><br/>View Registered Shop</button></div>
		<div class="col-sm-3"><button type="button" class="btn btn-primary btn-sq-lg btn-block"  ng-click ="ViewOrder()">
				<i class="fa fa-cart-arrow-down fa-4x"></i><br/>Online Purchasing Details</button></div>
	</div>

	<div class="row">
		<div class="col-sm-3"><div class="well"><span class="glyphicon glyphicon-book"></span><b><i> Courses</i></b></div></div>
		<div class="col-sm-3"><button type="button" class="btn btn-info btn-sq-lg btn-block" ng-click="getAddCoursePage()">
				<i class="fa fa-edit fa-4x"></i><br/>Add Courses</button></div>
		<div class="col-sm-3"><button type="button" class="btn btn-info btn-sq-lg btn-block" ng-click="viewCoursePage()">
				<i class="fa fa-eye fa-4x"></i><br/>Course Details</button></div>
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
		<div class="col-sm-3"><a href="map.html" target="_blank"><button type="button" class="btn btn-danger btn-sq-lg btn-block">
				<i class="fa fa-map-marker fa-4x"></i><br/>Location</button></a></div>


		

		<div class="col-sm-6">		
		 <textarea class="form-control" type="textarea" name="noti" ng-model = "noti"
            id="message" placeholder="Your Notification For Mobile App Here.........."
            maxlength="6000" rows="4"></textarea>
        </div>
		
	</div>

	<div class="row">
		<div class="col-sm-3"><div class="well"><span class="glyphicon glyphicon-folder-close"></span><b><i> Report</i></b></div></div>
		<div class="col-sm-3"><button type="button" ng-click="analyseView()" 
			class="btn btn-warning btn-sq-lg btn-block">
				<i class="fa fa-file fa-4x"></i><br/>Reports</button></div>
		
		<div class="col-sm-1"> </div>
		

        <div class="col-sm-4"><button type="button" ng-click="Notification()" class="btn btn-primary btn-sq-lg">
			<i class="fa fa-bell fa-4x"></i><br/>Send Notifications</button></div>
	</div>
	<div class="row">
			<div class="col-sm-3"><div class="well"><span class="glyphicon glyphicon-user">
			</span><b><i> Customer</i></b></div></div>
			<div class="col-sm-3"><button type="button" ng-click="getEmail()" 
				class="btn btn-success btn-sq-lg btn-block">
				<i class="fa fa-envelope fa-4x"></i><br/>Forum messages
			</button></div>
	</div>
			


	
</div>
</div>
</div>

<?php
require_once "layout/footer.php";
?>






