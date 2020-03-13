<?php

require_once "../includes/sessions.php";

require_once "../includes/shop.php";

$session = new Session();

$farmer = new Farmer();


session_start();
if($session->is_logged_in()) {

    if(isset($_POST)) {

        $Id = $_POST["nic"];
        $First_Name = $_POST["fname"];       
        $Tele_Number = $_POST["mobile"];
        $Gender = $_POST["gender"];       
        $Email = $_POST["email"];
        $Address = $_POST["address"];
        $variety = $_POST["variety"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = $farmer->farmer_update($Id,$First_Name,$Tele_Number,$Gender,$Email,$Address,$variety,$username,$password);

        if ($result) {
            echo "Record updated successfully";
            header("Location:Farmer_accountInterface.php");
        } else {
            echo "Error updating record: ";
        }
    }

}
else {
    echo "Register here";
    header("Location:RegisterFarmer.html");
}
?>

