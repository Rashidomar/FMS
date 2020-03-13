<?php

require_once "database.php";

class Item{

    public function find_by_sql($sql=""){

        global $database;

        $result_set = $database->query($sql);

        return $result_set;

    }


    public function find_all(){

        $result_set = $this->find_by_sql("SELECT * FROM `item`");

        return $result_set;

    }



    public function delete_item($id){

        global $database;

        $query = "DELETE FROM items WHERE Code='$id'";
        
        $result = $this->find_by_sql($query);

        return $result;

    }

    public function select_item(){

        global $database;

        $query = "SELECT * FROM tbl_images t1 INNER JOIN items t2 ON t1.id = t2.Image  Where Type='Vegetable' || Type='Fruit'";

        $result = $this->find_by_sql($query);

        //$result_set = $database->fetch_assoc($result);

        return $result;
    }

    public function select_fruit(){

        global $database;

        $query = "SELECT * FROM tbl_images t1 INNER JOIN items t2 ON t1.id = t2.Image where Type='Fruit'";

        $result = $this->find_by_sql($query);

        //$result_set = $database->fetch_assoc($result);

        return $result;
    }

    public function select_vegetable(){

        global $database;

        $query = "SELECT * FROM tbl_images t1 INNER JOIN items t2 ON t1.id = t2.Image where Type='Vegetable'";

        $result = $this->find_by_sql($query);

        //$result_set = $database->fetch_assoc($result);

        return $result;
    }

    public function check_code($code)
    {
        global $database;

        $query ="SELECT * FROM Items WHERE Code='$code'";

        $result = $this->find_by_sql($query);

        return $result;

    }


    public function update_item($code,$name,$price,$amount,$unit,$discount,$Type){

        global $database;

        $stmt = $database->connection->prepare("UPDATE Items SET Name = ?,Price = ?, Amount = ?,Unit = ?,Discount = ?,Type = ? WHERE Code = ?;");

        $stmt->bind_param('sssssss', $name ,$price ,$amount ,$unit ,$discount ,$Type , $code );

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }
    }

    public function upload_image($filename){

        $query = "INSERT INTO tbl_images(name) VALUES ($filename)";

        $result = $this->find_by_sql($query);

        return $result;
    }

    public function get_max_id(){

        global $database;

        $query = "SELECT * FROM `tbl_images` WHERE id =(SELECT MAX(id) FROM `tbl_images`)";

        $result = $this->find_by_sql($query);

        $result_set = $database->fetch_assoc($result);

        return $result_set;
    }

    public function insert_item($code,$name,$price,$amount,$unit,$discount,$output,$Type){

        global $database;

        $stmt = $database->connection->prepare("INSERT INTO items(Code,Name,Price,Amount,Unit,Discount,Image,Type) VALUES (?,?,?,?,?,?,?,?)");

        $stmt->bind_param('ssssssss',$code,$name,$price,$amount,$unit,$discount,$output,$Type );

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }
    }
}





?>