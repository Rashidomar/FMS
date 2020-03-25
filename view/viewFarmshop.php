<?php

require_once "../includes/item.php";

$item = new Item();


require_once "layout/header.php";
?>
<div><a href="admin.php" > 
    <button class="btn btn-default"">Back</button></a>
</div>
    
<div class="container container-fluid"><h2> Load Items To The Farm Shop <span class="glyphicon glyphicon-shopping-cart"> </h2>

</div>
<div ng-controller="AddItemDetails" ng-init="load()">
<form class="form-horizontal">
<fieldset>
<!-- Form Name -->
 <div class ="container container-fluid">
               <form class="navbar-form" role="search"><center>
                <button class="btn btn-default" ng-click="sasadara()" >View Ordersv</button>
                <div class="input-group add-on">
                  <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
                  <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </div></center>
                 </form>

               <div class="row"><center><b>Vegetabless</b></center></div>
               <?php         
              $result  = $item->select_vegetable();
              while ($row = $result->fetch_assoc()){
                echo '
                  <div class="col-md-2" ng-repeat="image in images">
                     <img src="../module/Items/upload/'.$row['name'].'" width="150" height="150" style="padding:5px; border:1px solid #f1f1f1; margin:16px;" />
                     <div ng-hide="showme" class ="row well" > 
                       Code : '.$row['Code'].'
                       <br>
                       Name : '.$row['Name'].'
                       <br>
                       <h1>'.$row['Amount'].'Kg</h1>
                       <br>
                    </div>
                </div>
                ';
              }
              ?>    
                <br />
              </div>
              <div class="container container-fluid">
                <form class="navbar-form" role="search"><center>
                <div class="input-group add-on">
                  <input class="form-control" placeholder="Search" name="srch-term"  type="text">
                  <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </div></center>
                 </form>
                <div class ="row ">
                  <center><b>Fruits</b></center></div>
                  <?php         
                  $result  = $item->select_Fruit();
                  while ($row = $result->fetch_assoc()){
                    echo '
                      <div class="col-md-2" ng-repeat="image in images">
                         <img src="../module/Items/upload/'.$row['name'].'" width="150" height="150" style="padding:5px; border:1px solid #f1f1f1; margin:16px;" />
                         <div ng-hide="showme" class ="row well" > 
                           Code : '.$row['Code'].'
                           <br>
                           Name : '.$row['Name'].'
                           <br>
                           <h1>'.$row['Amount'].'Kg</h1>
                           <br>
                        </div>
                    </div>
                    ';
                  }
                  ?>  
              </div>

</fieldset>
</form>

</div>

<?php
require_once "layout/footer.php";
?>
