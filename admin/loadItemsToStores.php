<?php
require_once "../includes/store.php";

$shop = new Store();

 if(isset($_POST['submit'])){


  //$shopname = $_POST['shopname'];
  $farmernic = $_POST['farmernic'];
  $itemcode = $_POST['itemcode'];   
  $total = $_POST['total'];      
  $amount = $_POST['amount'];
  
  $result = $shop->load_stores($itemcode,$amount);

  if($result){
    echo "inserted";
  }else{
    echo "failed";
  }

 }

require_once "../includes/layout/header.php";
?>

<div class="container container-fluid">
<div> 
  <a href="admin.php"><button class="btn btn-default">Back</button></a>
</div>
<div class="container container-fluid"><h2><b> Load Items To The Stores
   <span class="glyphicon glyphicon-shopping-cart"> </span></b></h2>

</div>
</div>
<div ng-controller="AddItemDetails" ng-init="load()">
<form class="form-horizontal">
<fieldset>
<!-- Form Name -->
<div class ="container container-fluid">
<div class="input-group add-on">
<input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
<span class="input-group-btn">
    <button class="btn btn-default" type="button">
      <i class="fa fa-search"></i>
    </button>
</span>
</div>
</form>

<div class="row"><center><h3><b>Vegetables</b></h3></center></div>
<div class="col-md-2" ng-repeat="image in images">  
<img  ng-hide="showme" ng-src="module/Items/upload/{{image.name}}" width="150" height="150" style="padding:5px; border:1px solid #f1f1f1; margin:16px;" />
<div ng-hide="showme" class ="row well" > Code :{{image.Code}}
  <br>
  Name :{{image.Name}}
  <br>
  Amount :{{image.Amount}}{{image.Unit}}
  <br>
  Price : Rs {{image.Price}}
  <br>
  <button class="btn btn-warning btn-xs" ng-click="showme=true ; setDataPopUpWindFarm(image.Code)">Loading</button> </div>
<div>
      <!--pop up windows -->
  <div ng-show="showme">
      <div class="form-popup "   id="myForm" >
      <form  class="form-container" method="POST">
        <h2>Add Items.. </h2>

        <label for="" class="mr-sm-2"><b>Farm :</b></label>
        <input type="text" class="form-control mb-2 mr-sm-2"  name="farmernic" required>

                <label for="" class="mr-sm-2"><b>Item code :</b></label>
                <input type="text" class="form-control mb-2 mr-sm-2"  name="itemcode" required>

                <label for="psw"><b>Amount :</b></label>
                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="eg -: 20Kg" name="amount" required>

                  <label for="" class="mr-sm-2"><b>Total :</b></label>
                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Total" name="total" required>

                <button type="submit" class="btn btn-success btn-xs" name="submit" >Add </button>
            </form>
        </div>  
        <button type="button" class="btn btn-warning btn-xs"  ng-click="showme=false ; refreshpage()">Close</button>
      
        
  </div>

</div>

</div>

<br />
</div>
<div class="container container-fluid">

<div class="input-group add-on">
  <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
  <span class="input-group-btn">
      <button class="btn btn-default" type="button">
        <i class="fa fa-search"></i>
      </button>
  </span>
</div>

</form>
<div class ="row ">
<center><h3><b>Fruits</b></h3></center></div> 
<div class="col-md-2" ng-repeat="image in imagesFruit">  
<img ng-hide="showme" ng-src="module/Items/upload/{{image.name}}" width="150" height="150" style="padding:5px; border:1px solid #f1f1f1; margin:16px;" />
  <div ng-hide="showme" class ="row well" > 
  Code :{{image.Code}}
  <br>
  Name :{{image.Name}}
  <br>
  Amount :{{image.Amount}}{{image.Unit}}
  <br>
  Price : Rs {{image.Price}}
  <br>
  <button class="btn btn-warning btn-xs" ng-click="showme=true ; setDataPopUpWindFarm(image.Code)">Loading</button>
</div>

<div>
      <!--pop up windows -->
    <div ng-show="showme">
      <div class="form-popup "   id="myForm" >
      <form  class="form-container" method="POST">
        <h2>Add Items.. </h2>

        <label for="" class="mr-sm-2"><b>Farm :</b></label>
        <input type="text" class="form-control mb-2 mr-sm-2"  name="farmernic"  required>

                <label for="" class="mr-sm-2"><b>Item code :</b></label>
                <input type="text" class="form-control mb-2 mr-sm-2"  name="itemcode" required>

                <label for="psw"><b>Amount :</b></label>
                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="eg -: 20Kg" name="amount" required>

                  <label for="" class="mr-sm-2"><b>Total :</b></label>
                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Total" name="total" required>

                <button type="submit" class="btn btn-success btn-xs" name="submit">Add </button>
            </form>
        </div>  
        <button type="button" class="btn btn-warning btn-xs"  ng-click="showme=false ; refreshpage()">Close</button>
      
        
  </div>
  
</div>
</div>  
</div> 

</fieldset>
</form>

</div>  

<?php
require_once "../includes/layout/footer.php";
?>


