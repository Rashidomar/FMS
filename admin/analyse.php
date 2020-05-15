<?php
require_once "../includes/layout/header.php";
?>
<div class="container container-fluid">

<div><a href="admin.php" > 
    <button class="btn btn-default"">Back</button></a>
</div>

<center>
<h2><b>Reports Analysis</b></h2>
</center>
<hr>
<div class="col-sm-4"></div>
<a href="storeanalyse.php" target="_blank">
<button class="btn btn-primary btn-sq-lg">
    <i class="fa fa-credit-card fa-4x"></i><br>Analyse Shop Stores
</button>
</a>

<a href="totalamount.php" target="_blank">
<button class="btn btn-warning btn-sq-lg">
    <i class="fa fa-usd fa-4x"></i><br>Comparison item prices
</button>
</a>


</div>
<?php
require_once "../includes/layout/footer.php";
?>