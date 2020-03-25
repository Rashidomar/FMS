<?php

require_once "../includes/order.php";

$order = new Order();

require_once "layout/header.php";
?>

<br /><br />
<div><a href="admin.php" > 
    <button class="btn btn-default"">Back</button></a>
</div>
    
<div  ng-controller="RegShopOrderController" ng-init="ViewOrdersDisplay()" ><center>

<div class="container" >
<button id="singlebutton" name="singlebutton" ng-click=viewShop() class="btn btn-success">View Items</button>
<button id="singlebutton" name="singlebutton" ng-click=Orders() class="btn btn-warning">Orders</button>
<button id="singlebutton" name="singlebutton" ng-click=VerifiedOrders() class="btn btn-warning">Verified Orders</button>
<button id="singlebutton" name="singlebutton" ng-click=DeliveredOrders() class="btn btn-warning">Delivered Orders</button>
<div   style="width:500px;">



    <br />
            <h2>Registered Shop's Orders</h2>
    <br />
          <form class="navbar-form" role="search">
                <div class="input-group add-on">
                  <input class="form-control" placeholder="RegisterdShopId" name="srch-term" ng-model="shopId" id="srch-term" type="text">
                  <div class="input-group-btn">

                  </div>

                  <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" ng-model="date" type="date">
                  <div class="input-group-btn">

                  </div>

                  <input class="form-control" placeholder="Item Code" name="srch-term" id="srch-term" ng-model="code" type="text">
                  <div class="input-group-btn">
                    <button class="btn btn-default" ng-click="ViewOrdersDisplay2()" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </div>

                </div>
          </form>

  </div>

                     <table class="table table-hover">
                          <tr>
                               <th><b>Registerd Shop Id</b></th>
                               <th><b>Order Number</b></th>
                               <th><b>Item Code</b></th>
                               <th><b>Item Name</b></th>
                               <th><b>Amount</b></th>
                               <th><b>Accepting Date</b></th>
                               <th><b>Verify</b></th>
                               <th><b>Delete</b></th>
                               <th><b>Massage</b></th>
                          </tr>

                          <?php  
                           $result = $order->view_order();

                           while($row = $result->fetch_assoc()){
                             echo '
                          <tr ng-repeat="x in namess ">

                             <td><a href="#"><font color="blue"><u>'.$row['Reg_Shop_Id'].'</u></font></a></td>
                               <td>'.$row['OrderNumber'].'</td>
                               <td><a href="#"><font color="blue"><u>'.$row['Code'].'</u></font></a></td>
                               <td>'.$row['Name'].'</td>
                               <td>'.$row['Amount'].'</td>
                               <td>'.$row['Date'].'</td>
                               <td><button ng-click="Verify(x.Reg_Shop_Id,x.OrderNumber,x.Code,x.Name,x.Amount,x.Date)" class="btn btn-success btn-xs">Verify</button></td>
                               <td><button ng-click="Delete(x.OrderNumber )" class="btn btn-danger btn-xs">Delete</button></td>
                               <td><center><button ng-click="msg(x.Reg_Shop_Id,x.OrderNumber,x.Code,x.Name,x.Amount,x.Date)" class="btn btn-info btn-xs glyphicon glyphicon-send"></button></center></td>
                          </tr>
                          ';
                        }
                       ?>                          
                     </table>
                </div>
              </center>

           </div>

<?php
require_once "layout/footer.php";
?>           