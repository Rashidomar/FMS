<?php

require_once "database.php";

class Store{

    
    public function find_by_sql($sql=""){

        global $database;

        $result_set = $database->query($sql);

        return $result_set;

    }


    public function find_all(){

        $result_set = $this->find_by_sql("SELECT * FROM `order`");

        return $result_set;

    }


    public function load_stores_item($itemcode,$amount){
        
        $query = "INSERT INTO load_stores_items(Item_Code,Load_Num,Amount) VALUES ('$itemcode',null,'$amount')";

        $result = $this->find_by_sql($query);

        return $result;

    }

    public function loading_stores_invoice($getdatee,$total,$farmernic){

        $getdatee = date("Y/m/d");
        
        $query = "INSERT INTO loading_stores_invoice(Load_No,Dateorder,Income,Reg_Farmer_Or_Farm_Id) VALUES (null,'$getdatee','$total','$farmernic')";

        $result = $this->find_by_sql($query);

        return $result;

    }

    public function view_stores($itemcode){

        global $database;
    
        $query = "SELECT load_stores_items.Load_Num,loading_stores_invoice.Dateorder,load_stores_items.Amount FROM load_stores_items INNER JOIN loading_stores_invoice ON load_stores_items.Load_Num = loading_stores_invoice.Load_No   WHERE loading_stores_invoice.Reg_Farmer_Or_Farm_Id='LabuduwaFarm' AND load_stores_items.Item_Code ='$itemcode'  ORDER BY load_stores_items.Load_Num DESC";

        $result = $this->find_by_sql($query);

        //$result_set = $database->fetch_assoc($result);

        return $result;

    }

    public function view_stores_reg($itemcode){

        global $database;
        
        $query = "SELECT load_stores_items.Load_Num,loading_stores_invoice.Dateorder,load_stores_items.Amount,loading_stores_invoice.Income FROM load_stores_items INNER JOIN loading_stores_invoice ON load_stores_items.Load_Num = loading_stores_invoice.Load_No   WHERE loading_stores_invoice.Reg_Farmer_Or_Farm_Id<>'LabuduwaFarm' AND load_stores_items.Item_Code ='$itemcode'  ORDER BY load_stores_items.Load_Num DESC";

        $result = $this->find_by_sql($query);

        //$result_set = $database->fetch_assoc($result);

        return $result;

    }


}

?>