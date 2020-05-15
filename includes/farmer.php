
<?php
require_once "database.php";
class Farmer{

    public function find_by_sql($sql=""){

        global $database;

        $result_set = $database->query($sql);

        return $result_set;

    }


    public function find_all(){

        $result_set = $this->find_by_sql("SELECT * FROM `registeredfarmer`");

        return $result_set;

    }

    public function find_by_Id($Id){

        $result_set = $this->find_by_sql("SELECT * FROM `registeredfarmer` where nic='$Id'");

        return $result_set;

    }


    public function farmer_authenticate($username, $password)
    {
        global $database;

        $stmt = $database->connection->prepare("SELECT * FROM `registeredfarmer` WHERE `username` = ? AND `password` = ?");

        $stmt->bind_param('ss', $username, $password);

        if($stmt->execute()){

            $result = $stmt->get_result();

            return $result;
        }

    }

    public function farmer_register($Id,$First_Name,$Tele_Number,$Gender,$Email,$Address,$variety,$username,$password)
    {
         global $database;
         
         //$enc_password = md5($password);

        $stmt = $database->connection->prepare("INSERT INTO `registeredfarmer` (`Id`,`First_Name`,`Tele_Number`,`Gender`,`Email`,`Address`,`variety`,`username`,`password`) VALUES (?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param('sssssssss', $Id,$First_Name,$Tele_Number,$Gender,$Email,$Address,$variety,$username,$password);

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }

    }

    public function farmer_delete($user_id)
    {
         global $database;
         
         //$enc_password = md5($password);

        $stmt = $database->connection->prepare("INSERT INTO `registeredfarmer` (`Id`) VALUES (?)");

        $stmt->bind_param('s', $user_id);

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }

    }

    public function farmer_update($Id,$First_Name,$Tele_Number,$Gender,$Email,$Address,$variety,$username,$password)
    {
         global $database;
         
         //$enc_password = md5($password);

        $stmt = $database->connection->prepare("UPDATE registeredfarmer SET $First_Name =?,Tele_Number = ?,Gender = ?,Email = ?,Address = ?,variety = ?,username = ?,password = ? WHERE Id =?");

        $stmt->bind_param('sssssssss', $First_Name,$Tele_Number,$Gender,$Email,$Address,$variety,$username,$password, $Id) ;

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }

    }
}

$user = new Farmer();

// $session = new Session();

// // $errors = array();

// $result = $user->farmer_register("test1","testname","000000","male","test@mail.com","testaddress","vegetable","test","test");

// if($result)
// {
//     echo "Successful";
// }

// $found_user = $user->farmer_authenticate("test", "test");

// if($found_user)
// {
//     echo var_dump($found_user);
// }

?>
