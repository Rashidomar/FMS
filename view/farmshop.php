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
        
<div class="container container-fluid">
<?php
		if($session->is_logged_in()){

			echo '<h1> <i class="fa fa-credit-card fa-1x"></i> Hi ' .$session->username.'</h1>';
		
		}else{
            
			header("Location: farmshopwelcome.php");
		}
	?>
<div ng-controller="FarmShopController">
<hr>
<div class ="row">
    <div class="col-lg-4"></div>
    <div class = "col-lg-4">
        <a href="invoice.php"><button type="button" class="btn btn-success btn-sq-lg btn-block" target="_blank">
            <i class="fa fa-shopping-cart fa-4x"></i><br/> Point of Sale</button>
        </a>
    </div>
    <div class = "col-sm-4"></div>
</div>
</div>

<div ng-controller="FarmShopController">
<div class ="row">
    <div class="col-lg-4"></div>
    <div class = "col-lg-4">
        <a href="reports.php"><button type="button" class="btn btn-warning btn-sq-lg btn-block" target="_blank">
            <i class="fa fa-file fa-4x"></i><br/> Month Reports</button></a>
    </div>
    <div class = "col-sm-4"></div>
</div>    

</div>

</div>
<?php
require_once "layout/footer.php";
?>

