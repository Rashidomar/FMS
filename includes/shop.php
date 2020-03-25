
<?php
require_once "database.php";
require_once "sessions.php";

class Shop{

    public function find_by_sql($sql=""){

        global $database;

        $result_set = $database->query($sql);

        return $result_set;

    }


    public function find_all(){

        $result_set = $this->find_by_sql("SELECT * FROM `registeredshop`");

        return $result_set;

    }

    public function find_by_Id($Id){

        $result_set = $this->find_by_sql("SELECT * FROM `registeredshop` where nic='$Id'");

        return $result_set;

    }

    public function shop_login($username, $password)
    {
        global $database;

        $stmt = $database->connection->prepare("SELECT * FROM `registeredshop` WHERE `un` = ? AND `pw` = ?");

        $stmt->bind_param('ss', $username, $password);

        if($stmt->execute()){

            $result = $stmt->get_result();

            return $result;
        }

    }


    public function shop_register($nic,$fn,$ln,$pn,$address,$email,$un,$pw)
    {
         global $database;
         
         //$enc_password = md5($password);

        $stmt = $database->connection->prepare("INSERT INTO `registeredshop` (`nic`,`fn`,`ln`,`pn`,`address`,`email`,`un`,`pw`) VALUES (?,?,?,?,?,?,?)");

        $stmt->bind_param('ssssssss', $nic,$fn,$ln,$pn,$address,$email,$un,$pw);

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }

    }

    public function shop_delete($nic)
    {
         global $database;
         
         //$enc_password = md5($password);

        $stmt = $database->connection->prepare("INSERT INTO `registeredshop` (`nic`) VALUES (?)");

        $stmt->bind_param('s', $nic);

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }

    }

    public function shop_update($s_id,$nic,$fn,$ln,$pn,$address,$email,$un,$pw)
    {
         global $database;
         
         //$enc_password = md5($password);

        $stmt = $database->connection->prepare("UPDATE registeredshop SET nic = ?,fn = ?,ln = ?,pn = ?,address = ?,email = ?, un =? ,pw = ? WHERE nic = ?");

        $stmt->bind_param('sssssssss', $nic,$fn,$ln,$pn,$address,$email,$un,$pw,$s_id) ;

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }

    }


    
    public function verify_view($shop_id){

        $query = "SELECT * FROM regshoporder  INNER JOIN items ON regshoporder.Item_Code=items.Code  
        where Reg_Shop_Id='$shop_id' and Verified=1 ";

        $result = $this->find_by_sql($query);

        return $result;
    }

    public function deliver_view($shop_id){

        $query = "SELECT * FROM regshoporder  INNER JOIN items ON regshoporder.Item_Code=items.Code  
        where Reg_Shop_Id='$shop_id' AND Delivered=1";

        $result = $this->find_by_sql($query);

        return $result;
    }

    public function pending_view($shop_id){

        $query = "SELECT * FROM regshoporder  INNER JOIN items ON regshoporder.Item_Code=items.Code  
        where  Reg_Shop_Id='$shop_id' AND Verified=0 AND Delivered=0";

        $result = $this->find_by_sql($query);

        return $result;
    }

    public function view_load_shop(){

        $query = "SELECT * FROM load_shop_items";

        $result = $this->find_by_sql($query);

        return $result;
    }

    public function getReport($itemName,$date){ 
    
        $query = "SELECT tbl_order_item.item_name,sum(tbl_order_item.order_item_quantity) AS quantity,
        sum(tbl_order_item.order_item_price) AS price,sum(tbl_order_item.order_item_actual_amount) AS total
        FROM tbl_order_item  
        LEFT JOIN tbl_order ON tbl_order_item.order_id=tbl_order.order_id WHERE tbl_order_item.item_name='$itemName' and tbl_order.order_date LIKE '%$date%'";
    
        $result = $this->find_by_sql($query);

        return $result;
        
    }

    public function load_farm_shop($itemcode,$amount){ 
    
        $getdatee=date("Y/m/d");
        
        $query = "INSERT INTO load_shop_items(Item_Code,Load_Num,Amount,Date1) VALUES ('$itemcode',null,'$amount','$getdatee')";
    
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
