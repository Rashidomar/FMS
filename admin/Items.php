<?php
require_once "../includes/item.php";

$item = new Item();

$messages = array();
$types = array("Fruit","Vegetable");
$units = array("g","kg","mg","1 packet","l","ml");

$max = '';

if(isset($_POST['submit'])){

  $code = $_POST['code'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $amount = $_POST['amount'];
  $unit = $_POST['unit'];
  $discount = $_POST['discount'];
  $type = $_POST['type'];

  $image_name = $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];

  $found = $item->check_code($code);

  if(!$found->num_rows === 0){

    if(in_array($type, $types)){

      if(in_array($unit, $units)){

        if($price > 0 && $amount > 0){

        $result = $item->get_max_id();

        while ($row = $result->fetch_assoc()){

            $max = $row['id'];
        } 
        
          $max = $max + 1;

          $result = $item->insert_item($code,$name,$price,$amount,$unit,$discount,$max,$Type);

          if($result){

            $path = 'upload/' . $image_name; 

            if(move_uploaded_file($tmp_name, $path))  
            {  
              $result = $item->upload_image($image_name);
                if($result)  
                { 
                    $messages[]='File Uploaded';  
            
                }else{  
                    $messages[]='Error';  
                } 
           }
          }

        }else{

          $messages[] = "Error with price and amount..";
        }

      }else{

        $messages[] = "Error with unit";
      }

    }else{

      $messages[] = "Error with type";
    }

  }else{
    $messages[] = "Code_id already exist";
  }



}




require_once "../includes/layout/header.php";

?>

<div class="container container-fluid">
<div><a href="admin.php" > 
    <button class="btn btn-default"">Back</button></a>
</div>
<h2><b>Add Item Details</b> <span class="glyphicon glyphicon-shopping-cart"> </h2>
<div ng-controller="AddItemDetails" ng-init="load()">
<form class="form-horizontal" method="post" enctype='multipart/form-data'>

<hr>
<!-- Form Name -->



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Item's Code</label>  
  <div class="col-md-4">
  <input type="text" placeholder="item code" name="code" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Item</label>  
  <div class="col-md-4">
  <input type="text" placeholder="item name" name="name" class="form-control input-md">
    
  </div>
</div>


<!-- Button Drop Down -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Unit">Type</label>
  <div class="col-md-4">
    <div class="input-group">
      <input  class="form-control" placeholder="type" name="type" type="text">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
          Select
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
 
          <li><button ng-click="SetType('Fruit')">Fruits</a></li>
          <li><button ng-click="SetType('Vegetable')">Vegetable</a></li>
         
        </ul>
      </div>
    </div>
  </div>
</div>


<!-- Button Drop Down -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Unit">Unit</label>
  <div class="col-md-4">
    <div class="input-group">
      <input  name="unit" class="form-control" placeholder="unit" type="text">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
          unit
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          <li><button ng-click="SetUnit('kg')">kg</button></li>
          <li><button ng-click="SetUnit('g')">g</a></li>
          <li><button ng-click="SetUnit('mg')">mg</a></li>
          <li><button ng-click="SetUnit('1 packet')">1 packet</a></li>
          <li><button ng-click="SetUnit('l')">l</a></li>
          <li><button ng-click="SetUnit('ml')">ml</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Amount</label>  
  <div class="col-md-4">
  <input type="text" name="amount" placeholder="amount" class="form-control input-md">
    
  </div>
</div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-4 control-label" for="prependedtext">Price</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Rs</span>
      <input  class="form-control" name="price" placeholder="price" type="text">
    </div>
    
  </div>
</div>

<!-- Appended Input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="appendedtext">Discount</label>
  <div class="col-md-4">
    <div class="input-group">
      <input name="discount" class="form-control" placeholder="discount" type="text">
      <span class="input-group-addon">%</span>
    </div>
    <input type="checkbox" ng-model="all">
  </div>
</div>
<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="Add Image">Add Image</label>
  <div class="col-md-4">
    <input name="image" class="input-file" type="file">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button name="submit" class="btn btn-primary btn-sq-lg" type="submit">
        <i class="fa fa-leaf fa-2x"></i><br/>Submit</button>
  </div>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-warning" ng-click="updateItemsData()" >
        <i class="fa fa-shopping-cart fa-2x"></i><br/>Update</button>
  </div>
</div>



</form>
<hr>

<div class ="container container-fluid">


<div class="row"><center><h2><b>Vegetables</b></h2></center></div>
<?php

  $result  = $item->select_vegetable();

  while ($row = $result->fetch_assoc()){
    echo '
    <div class="col-md-2" ng-repeat="image in imagesFruit">  
    <img src="../module/Items/upload/'.$row['name'].'" width="150" height="150" style="padding:5px; border:1px solid #f1f1f1; margin:16px;" />
    <div class ="row well"> 
      Code :'.$row['Code'].'
      <br> 
      Name :'.$row['Name'].'
      <br>
      Amount :'.$row['Amount'], $row['Unit'].' 
      <br> 
      Price : Rs '.$row['Price'].'
      <br>

    <br><button class="btn btn-warning btn-xs" ng-click="updateItems(image.Code, image.Name, image.Unit,image.Amount,image.Price,image.Discount,image.Type)">Update</button>
    <button class="btn btn-danger btn-xs" ng-click="deleteItems(image.Code )">Delete</button>
  </div>
</div>
';
}
?> 
</div>

<div class="container container-fluid">
<div class ="row ">
  <center><h2><b>Fruits</b></h2></center>
</div>
<?php

  $result  = $item->select_fruit();

  while ($row = $result->fetch_assoc()){
    echo '
    <div class="col-md-2" ng-repeat="image in imagesFruit">  
    <img src="../module/Items/upload/'.$row['name'].'" width="150" height="150" style="padding:5px; border:1px solid #f1f1f1; margin:16px;" />
    <div class ="row well"> 
      Code :'.$row['Code'].'
      <br> 
      Name :'.$row['Name'].'
      <br>
      Amount :'.$row['Amount'], $row['Unit'].' 
      <br> 
      Price : Rs '.$row['Price'].'
      <br>
      <button class="btn btn-warning btn-xs" ng-click="updateItems(image.Code, image.Name, image.Unit,image.Amount,image.Price,image.Discount,image.Type)">Update</button>
      <button class="btn btn-danger btn-xs" ng-click="deleteItems(image.Code )">Delete</button>
    </div>
  </div> 
    ';
  }
?>  
</div> 

</div>

<?php
require_once "layout/footer.php";
?>

