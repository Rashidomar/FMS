<?php
require_once "../includes/sessions.php";

require_once "../includes/shop.php";

$session = new Session();

$shop = new Shop();


if($session->is_logged_in()) {

    if(isset($_POST)) {

        $s_id = $session->user_id;
        $nic = $_POST['nic'];
        $fn = $_POST['fname'];       
        $ln = $_POST['lname'];
        $pn = $_POST['mobile'];       
        $address = $_POST['address'];
        $email = $_POST['email'];
        $un = $_POST['username'];
        $pw = $_POST['password'];

        $result = $shop->shop_update($s_id,$nic,$fn,$ln,$pn,$address,$email,$un,$pw);

        if ($result) {
            echo "Record updated successfully";
            header("location:Shop_accountInterface.php");
        } else {
            echo "Error updating record.";
        }
    }
    $mysqli->close();
}
    else{

    echo "Register here";
    header("Location:Login_Registration/RegisterFarmer.html");
    exit();

}
?>

