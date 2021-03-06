<?php
require_once "../includes/layout/header.php";
?>

<div ng-controller="FarmShopController" class="container" ng-init="displayReport()">

<a href="farmshop.php"><button class="btn btn-default">Back</button></a>


<h2>FarmShop Report <span class="glyphicon glyphicon-shopping-cart"></span></h2>    
<hr>
<form class="form-horizontal" method="post">
<div class="col-sm-2">
<select class="form-control" ng-model='year'>
  <option value="2019">2019</option>
  <option value="2018">2018</option>
  <option value="2017">2017</option>
  <option value="2016">2016</option>
  <option value="2015">2015</option>
</select>
</div>
<div class="col-sm-2">
<select class="form-control" ng-model='month'>
  <option value="01">January</option>
  <option value="02">February</option>
  <option value="03">March</option>
  <option value="04">April</option>
  <option value="05">May</option>
  <option value="06">June</option>
  <option value="07">July</option>
  <option value="08">August</option>
  <option value="09">September</option>
  <option value="10">October</option>
  <option value="11">November</option>
  <option value="12">December</option>
</select>
</div>
<button id="singlebutton" name="singlebutton" ng-click="getDate()" class="btn btn-warning">
    <i class="fa fa-filter fa-1x"></i> Filter</button>
</form>

<div class="row">
<div class="col-sm-6"></div>
<form action="reports.php" method="GET">
<div class="col-sm-2">
  <select class="form-control" name='year'>
    <option value="2019">2019</option>
    <option value="2018">2018</option>
    <option value="2017">2017</option>
    <option value="2016">2016</option>
    <option value="2015">2015</option>
  </select>
  </div>
  <div class="col-sm-2">
  <select class="form-control" name='month'>
    <option value="01">January</option>
    <option value="02">February</option>
    <option value="03">March</option>
    <option value="04">April</option>
    <option value="05">May</option>
    <option value="06">June</option>
    <option value="07">July</option>
    <option value="08">August</option>
    <option value="09">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
  </select>
</div>

<a href="reports.php" target="_blank"><button class="btn btn-primary btn-sq-lg">
<i class="fa fa-file fa-2x"></i><br/>Print Reports</button></a>
</div>
</form>

<div class = "row">
<!--<div class ="col-md-2"></div>-->
<div  class = "col-md-12" class = style="width:500px;">  
                                                  
  <br /><br />  
  <table class="table table-bordered table-striped"> 
    <thread class="thread-dark"> 
      <tr> 
        <th scope="col">Item Name</th>
        <th scope="col">Quantity</th>  
        <th scope="col">Price(Rs.)</th>
        <th scope="col">Total Amount(Rs.)</th>
    </tr>  
    </thread>
    <tbody>
      <tr ng-repeat="x in items">
        <td>{{x.item_name}}</td>
        <td>{{x.quantity}}</td>  
        <td><b>{{x.price}}</b></td> 
        <td><b>{{x.total}}</b></td>
      </tr>
    </tbody>
  </table>
  
</div>  
</div>  



</div>

<?php
require_once "../includes/layout/footer.php";
?>

