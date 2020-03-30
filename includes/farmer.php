
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

        $stmt = $database->connection->prepare("INSERT INTO `registeredfarmer` (`Id`,`First_Name`,`Tele_Number`,`Gender`,`Email`,`Address`,`variety`,`username`,`password`) VALUES (?,?,?,?,?,?,?)");

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
