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
        
<div class="container container-fluid"><h1> <i class="fa fa-credit-card fa-1x"></i> Hi Farm Shop</h1>

<div>
<hr>
<div class ="row">

<div class="col-lg-4"></div><div class = "col-lg-4"><a href="invoice.php" target="_blank"><button type="button" class="btn btn-success btn-sq-lg btn-block">
    <i class="fa fa-shopping-cart fa-4x"></i><br/> Point of Sale</button></a></div><div class = "col-sm-4"></div></div>
</div>

<div ng-controller="FarmShopController">
<div class ="row">
    <div class="col-lg-4"></div><div class = "col-lg-4"><button type="button" class="btn btn-warning btn-sq-lg btn-block" ng-click="viewReports()" target="_blank">
    <i class="fa fa-file fa-4x"></i><br/> Month Reports</a></div><div class = "col-sm-4"></div></div>    

</div>

</div>
<?php
require_once "layout/footer.php";
?>

