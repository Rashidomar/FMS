
<?php
require_once "database.php";
//require_once "sessions.php";

class Auction{

    public function find_by_sql($sql=""){

        global $database;

        $result_set = $database->query($sql);

        return $result_set;

    }


    public function find_all(){

        $result_set = $this->find_by_sql("SELECT * FROM `bid_histroy`");

        return $result_set;

    }


    public function add_bid($Bidder,$Item_code, $Amount, $Date,$confirm,$reject)
    {
         global $database;


        $stmt = $database->connection->prepare("INSERT INTO `bid_history` (`Bidder`,`Item_code`, `Amount`, `Date`,`confirm`,`reject`) VALUES (?,?,?,?,?,?)");

        $stmt->bind_param('ssssss', $Bidder,$Item_code, $Amount, $Date,$confirm,$reject);

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }

    }

    public function add_list($Item_type,$Id,$Item_name,$Item_code,$Price,$Quantity,$Date,$Location,$Description)
    {
         global $database;


        $stmt = $database->connection->prepare("INSERT INTO `auction` (`Item_type`,`Id`,`Item_name`,`Item_code`, `Price`,`Quantity`,`Date`,`Location`,`Description`) VALUES (?,?,?,?,?,?,?,?.?)");

        $stmt->bind_param('sssssssss', $Item_type,$Id,$Item_name,$Item_code,$Price,$Quantity,$Date,$Location,$Description);

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }

    }

    public function view_bid($Id){

        $query = "SELECT * FROM bid_history inner join auction on bid_history.Item_code=auction.Item_code
        where Id='$Id";

        $result = $this->find_by_sql($query);

        return $result;
    }

    public function fruit(){

        $query = "SELECT * FROM auction where Item_type='Fruits'";

        $result = $this->find_by_sql($query);

        return $result;
    }

    public function vegetable(){

        $query = "SELECT * FROM auction where Item_type='Vegetables' ";

        $result = $this->find_by_sql($query);

        return $result;
    }

    public function reject_bid($bider, $Item_code){

        $query ="UPDATE bid_history SET reject = false  WHERE Bidder='$bider' AND Item_code='$Item_code'";

        $result = $this->find_by_sql($query);

        return $result;
    }

    public function confirm_rejection($Id){

       
    $query = "SELECT * FROM bid_history inner join auction on bid_history.Item_code=auction.Item_code
    where Bidder='$Id' and confirm=True ";

        $result = $this->find_by_sql($query);

        return $result;

    }

}

// $user = new User();
// $session = new Session();

// $errors = array();

// $result = $user->user_register("omar", "rashid", "omar@mail", "123");

// if($result)
// {
//     echo var_dump($result);
// }

// $found_user = $user->user_authenticate("omar", 123);

// if($found_user)
// {
//     $user_id = "";
//     $username = "";
//     while($results = $found_user->fetch_assoc())
//     {
//         $user_id = $results["id"];
//         $username = $results["username"];
//     }

//     echo $user_id . "<br>";
    
//     echo $username;

//     $session_values = $session->create_session($user_id, $username);

//     if($session_values['id'] && $session_values['username']){
         
//         header('Location: ../index.php');	
//     }else{

//         $errors[] = "wrong username and password";
//     }

// }

?>
