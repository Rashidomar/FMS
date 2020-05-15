<?php
require_once "../includes/layout/header.php";
?> 

<style>

  .blog .carousel-indicators {
    left: 0;
    top: auto;
    bottom: -40px;

  }

/* The colour of the indicators */
.blog .carousel-indicators li {
    background: #a3a3a3;
    border-radius: 50%;
    width: 8px;
    height: 8px;
}

.blog .carousel-indicators .active {
background: #707070;
}


    .abc-cc {
        background-color: black;
        padding: 16px;
        text-align: center;
    }
    .abc-ccc {
        background-color: #f0f0f0;
        padding: 1px;
        text-align: center;
    }
    .abc-c {
        
        text-shadow: 1px 1px #ccc;
    }
    .footer {
  background: rgb(0,0,0);
  padding: 10px 0;
}
.footer a {
  color: #70726F;
  font-size: 20px;
  padding: 10px;
  border-right: 1px solid #70726F;
  transition: all .5s ease;
}
.footer a:first-child {
  border-left: 1px solid #70726F;
}
.footer a:hover {
  color: white;
}
</style>
<!-- navbar -->
<?php
require_once "../includes/layout/admin_navbar.php";
?>
<!-- SlideShoe -->
<?php
require_once "../includes/layout/slideshow.php";
?>
<div class="container container-fluid">
<?php
$con=mysqli_connect("localhost","root","","fmsmy");
$query="SELECT * FROM pricelist";
$result= mysqli_query($con,$query);
$data=array();
$i=0;

?>
<?php
$i=0;
while($row = mysqli_fetch_array($result)){
	$dataPoints[$i] =array("label"=>$row["productName"], "y"=>$row["price"]);
	$i++;
}
	
?>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Price Comparison"
	},
	axisY: {
		title: "Price of a Unit(Rs.)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## tonnes",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<!-- <footer> -->
<?php
require_once "../includes/layout/footer.php";
?>


  
