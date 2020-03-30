
<?php
require_once "database.php";
require_once "sessions.php";

class Employee{

    public function find_by_sql($sql=""){

        global $database;

        $result_set = $database->query($sql);

        return $result_set;

    }


    public function find_all(){

        $result_set = $this->find_by_sql("SELECT * FROM `farmshopemployee`");

        return $result_set;

    }

    public function check_employee($Id,$Username)
    {
        global $database;

        $stmt = $database->connection->prepare("SELECT * FROM `farmshopemployee` WHERE `Id` = ? AND `Username` = ?");

        $stmt->bind_param('ss',$Id, $Username);

        if($stmt->execute()){

            $result = $stmt->get_result();

            return $result;
        }
    }


    public function employee_register($Id,$First_Name,$Last_Name,$Tele_Number,$Email,$Address,$Salary,$Username,$Password)
    {
         global $database;

        $stmt = $database->connection->prepare("INSERT INTO `farmshopemployee` (`Id`,`First_Name`,`Last_Name`,`Tele_Number`,`Email`,`Address`,`Salary`,`Username`,`Password`) VALUES (?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param('sssssssss', $Id,$First_Name,$Last_Name,$Tele_Number,$Email,$Address,$Salary,$Username,$Password);

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }

    }

    public function employee_delete($user_id)
    {
         global $database;
         
         //$enc_password = md5($password);

        $stmt = $database->connection->prepare("INSERT INTO `farmshopemployee` (`Id`) VALUES (?)");

        $stmt->bind_param('s', $user_id);

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }

    }

    public function employee_edit($Id,$First_Name,$Last_Name,$Tele_Number,$Email,$Address,$Salary,$Username,$Password)
    {
         global $database;
         
         //$enc_password = md5($password);
        $stmt = $database->connection->prepare("UPDATE farmshopemployee SET First_Name = ?,Last_Name = ?,Tele_Number = ?,Email = ?,Address = ?,Salary = ?,Username = ?,Password = ? WHERE Id = ?");

        $stmt->bind_param('sssssssss',$First_Name,$Last_Name,$Tele_Number,$Email,$Address,$Salary,$Username,$Password,$Id);

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
