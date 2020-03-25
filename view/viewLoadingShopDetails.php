<?php
 require_once "../includes/shop.php";

 $shop = new Shop();

require_once "layout/header.php";
?>

<div><a href="admin.php" > 
    <button class="btn btn-default"">Back</button></a>
</div>
    
<br /><br />
<div ng-controller="Admincontroller">
  <div class="container" ng-controller="AddItemDetails" ng-init = viewOrder() ><center>
<style>
                * {
                  box-sizing: border-box;
                }

                #myInput {
                  background-image: url('/css/searchicon.png');
                  background-position: 10px 10px;
                  background-repeat: no-repeat;
                  width: 100%;
                  font-size: 16px;
                  padding: 12px 20px 12px 40px;
                  border: 1px solid #ddd;
                  margin-bottom: 12px;
                }

                #myTable {
                  border-collapse: collapse;
                  width: 100%;
                  border: 1px solid #ddd;
                  font-size: 18px;
                }

                #myTable th, #myTable td {
                  text-align: left;
                  padding: 12px;
                }

                #myTable tr {
                  border-bottom: 1px solid #ddd;
                }

                #myTable tr.header, #myTable tr:hover {
                  background-color: #f1f1f1;
                }
</style>

<h2>Loading For Farm Shop.....</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Item Code......." title="Type in a name">
<table id="myTable">
      <tr class="header">                       
            <th><b>Item Code</b></th>
            <th><b>Load Number</b></th>
            <th><b>Amount</b></th>
            <th><b>Date</b></th>
       </tr>
       <?php
        $result = $shop->view_load_shop();

        while($row = $result->fetch_assoc())

       echo '
        <tr ng-repeat="x in loadorders ">
            <td>'.$row['Item_Code'].'</td>
            <td>'.$row['Load_Num'].'</td>
            <td>'.$row['Amount'].'</td>
            <td>'.$getdatee=date("Y/m/d").'</td>
       </tr>
       ';
       ?>
  </table>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</div>
</center>
</div>

<?php
require_once "layout/footer.php";
?>

