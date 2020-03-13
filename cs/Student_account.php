<?php
require_once "../includes/sessions.php";

require_once "../includes/shop.php";

$session = new Session();

$shop = new Student();

if($session->is_logged_in()) {

    if(isset($_POST['update'])) {

    $nic = $_POST['nic'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $Mobile = $_POST['mobile'];
    $Occupation = $_POST['occupation'];
    $Address = $_POST['address'];
    $email = $_POST['email'];
    $Gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $s_id = $session->user_id;

    $result = $student->student_update($s_id,$nic,$fname,$lname,$Mobile,$Gender,$Address ,$Occupation,$email ,$username,$password);

    if ($result) {
        echo "Record updated successfully";
        header("Location:Student_accountInterface.php");
        
    } else {
        echo "Error updating record.";
    }
}

}
else {
    echo "Register here";
    header("Location:MemberStudent.php");

}
?>

