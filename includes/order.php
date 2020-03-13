<?php
require_once "database.php";

class Order{

    public function find_by_sql($sql=""){

        global $database;

        $result_set = $database->query($sql);

        return $result_set;

    }


    public function find_all(){

        $result_set = $this->find_by_sql("SELECT * FROM `order`");

        return $result_set;

    }


    public function find_by_id($id=0){

        global $database;

        $result_set = $this->find_by_sql("SELECT * FROM users WHERE id='$id'");

        $found = $database->fetch_assoc($result_set);

        return $found;

    }

    public function insert_shop_order($date,$Icode,$quentity,$Verified,$Delivered,$id){
 
        $query = "INSERT INTO regshoporder (Date, Item_Code,Amount,Verified,Delivered,Reg_Shop_Id)
        values ('$date','$Icode','$quentity','$Verified','$Delivered','$id')";

        $result = $this->find_by_sql($query);


        return $result;

    }

    public function delete_order($order_number){

        global $database;

        $query = "DELETE FROM regshoporder WHERE OrderNumber='{$order_number}'";

        $result = $this->find_by_sql($query);


        return $result;

    }

    public function delivered_order(){

        global $database;

        $query = "SELECT t1.OrderNumber,t1.Date,t2.Code,t1.Amount,t1.Reg_Shop_Id,t2.Name FROM regshoporder t1 INNER JOIN items t2 ON t1.Item_Code = t2.Code  WHERE t1.Verified=1 AND t1.Delivered=1 ORDER BY t1.OrderNumber DESC  ";

        $result = $this->find_by_sql($query);

        //$result_set = $database->fetch_assoc($result);

        return $result;


    }

    public function deliver_order($order_number){

        global $database;

        $query = "UPDATE regshoporder SET Delivered = 1 WHERE OrderNumber='{$order_number}'" ; 

        $result = $this->find_by_sql($query);

        return $result;

    }


 
    public function search_delivered_order($shopId,$code){

        global $database;

        $query = "SELECT t1.OrderNumber,t1.Date,t2.Code,t1.Amount,t1.Reg_Shop_Id,t2.Name FROM regshoporder t1 INNER JOIN items t2 ON t1.Item_Code = t2.Code  WHERE t1.Verified=1 AND t1.Delivered=1  AND t1.Reg_Shop_Id= '$shopId'  AND t2.Code= '$code'";  

        $result = $this->find_by_sql($query);

        $result_set = $database->fetch_assoc($result);

        return $result_set;

    }

    public function search_verify_order($shopId,$code){

        global $database;

        $query = "SELECT t1.OrderNumber,t1.Date,t2.Code,t1.Amount,t1.Reg_Shop_Id,t2.Name FROM regshoporder t1 INNER JOIN items t2 ON t1.Item_Code = t2.Code  WHERE t1.Verified=1 AND t1.Delivered=0  AND t1.Reg_Shop_Id= '$shopId'  AND t2.Code= '$code'   ";

        $result = $this->find_by_sql($query);

        $result_set = $database->fetch_assoc($result);

        return $result_set;

    }

    public function search_view_order($shopId,$code){

        global $database;

        $query = "SELECT t1.OrderNumber,t1.Date,t2.Code,t1.Amount,t1.Reg_Shop_Id,t2.Name FROM regshoporder t1 INNER JOIN items t2 ON t1.Item_Code = t2.Code  WHERE t1.Verified=0 AND t1.Delivered=0  AND t1.Reg_Shop_Id= '$shopId'  AND t2.Code= '$code'   ";  

        $result = $this->find_by_sql($query);

        $result_set = $database->fetch_assoc($result);

        return $result_set;

    }

    public function verify_order($order_number){

        $query = "UPDATE regshoporder SET Verified = 1 WHERE OrderNumber='{$order_number}'" ; 

        $result = $this->find_by_sql($query);

        return $result;
    }

    public function view_order(){

        global $database;

        $query = "SELECT t1.OrderNumber,t1.Date,t2.Code,t1.Amount,t1.Reg_Shop_Id,t2.Name FROM regshoporder t1 INNER JOIN items t2 ON t1.Item_Code = t2.Code  WHERE t1.Verified=0 AND t1.Delivered=0 ORDER BY t1.OrderNumber DESC  ";

        $result = $this->find_by_sql($query);

        //$result_set = $database->fetch_assoc($result);

        return $result;

    }

    public function view_verify_order(){

        global $database;

        $query = "SELECT t1.OrderNumber,t1.Date,t2.Code,t1.Amount,t1.Reg_Shop_Id,t2.Name FROM regshoporder t1 INNER JOIN items t2 ON t1.Item_Code = t2.Code  WHERE t1.Verified=1 AND t1.Delivered=0 ORDER BY t1.OrderNumber DESC  ";  

        $result = $this->find_by_sql($query);

        //$result_set = $database->fetch_assoc($result);

        return $result;

    }

    
}

?>