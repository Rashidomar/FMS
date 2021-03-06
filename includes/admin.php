
<?php
require_once "database.php";
//require_once "sessions.php";

class Admin{

    public function find_by_sql($sql=""){

        global $database;

        $result_set = $database->query($sql);

        return $result_set;

    }


    public function find_all(){

        $result_set = $this->find_by_sql("SELECT * FROM `admin`");

        return $result_set;

    }

    // public function find_by_id($id=0){

    //     global $database;

    //     $result_set = $this->find_by_sql("SELECT * FROM users WHERE id='$id'");

    //     $found = $database->fetch_assoc($result_set);

    //     return $found;

    // }

    public function admin_authenticate($username, $password)
    {
        global $database;

        $stmt = $database->connection->prepare("SELECT * FROM `admin` WHERE `User_Name` = ? AND `Password` = ?");

        $stmt->bind_param('ss', $username, $password);

        if($stmt->execute()){

            $result = $stmt->get_result();

            return $result;
        }

    }


    public function check_admin($user_id,$username)
    {
        global $database;

        $stmt = $database->connection->prepare("SELECT * FROM `admin` WHERE `Id` = ? AND `User_Name` = ?");

        $stmt->bind_param('ss',$user_id, $username);

        if($stmt->execute()){

            $result = $stmt->get_result();

            return $result;
        }
    }

    public function admin_register($user_id,$username, $password)
    {
         global $database;
         
         //$enc_password = md5($password);

        $stmt = $database->connection->prepare("INSERT INTO `admin` (`Id`,`User_Name`, `Password`) VALUES (?,?,?)");

        $stmt->bind_param('sss', $user_id,$username, $password);

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }

    }

    public function admin_delete($user_id)
    {
         global $database;
         
         //$enc_password = md5($password);

        $stmt = $database->connection->prepare("DELETE FROM `admin` (`Id`) VALUES (?)");

        $stmt->bind_param('s', $user_id);

        if($stmt->execute()){

            $stmt->close(); 

            return true;
            
        }

    }

    public function admin_edit($user_id,$username, $password)
    {
         global $database;
         
         //$enc_password = md5($password);
         
        $stmt = $database->connection->prepare("UPDATE admin SET User_Name = ?, Password = ? WHERE  Id=?");

        $stmt->bind_param('sss',$username, $password, $user_id);

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
